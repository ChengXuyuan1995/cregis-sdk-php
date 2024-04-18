<?php
namespace Cregis\Dispatch;
use Hanson\Foundation\AbstractAPI;
class Api extends AbstractAPI
{
    //项目编号
    protected $project_no;   
    //apikey      
    protected $api_key;  
    //节点地址           
    protected $endpoint;
    //回调地址     
    protected $callUrl;             
    public function __construct( $project_no, string $api_key,string $endpoint, string $callUrl)
    {
        $this->project_no = $project_no;
        $this->api_key = $api_key;
        $this->endpoint = $endpoint;
        $this->callUrl = $callUrl;
    }


    /**
     * @param string $method
     * @param array $body
     * @return result
     * @throws CregisDispatchException
     */
    public function request(string $method, array $body)
    {
        $body['nonce']=$this->generateRandomCode();
        $body['timestamp']=$this->getMillisecondTimestamp();
        $body['sign']=$this->generateSign($this->api_key,$body);
        $http = $this->getHttp();
        $response = $http->json($this->endpoint. $method, $body); 
        $result = json_decode(strval($response->getBody()), true);
        // echo "结果：".json_encode($result);
        $this->checkErrorAndThrow($result);
        return $result;
    }

 

    /**
     * 签名生成
     */
    public function generateSign($apiKey, $params) {
        // 1. 按字典序对参数进行排序
        ksort($params);
        // 2. 拼接参数
        $paramStr = '';
        foreach ($params as $key => $value) {
            if ($this->isNotEmpty($value) && $key!="sign") {
                $paramStr .= $key . $value;
            }
        }
        // 3. 将API Key拼接到参数字符串最前面
        $paramStr = $apiKey . $paramStr;
        // 4. 计算MD5并转为小写作为签名
        $sign = md5($paramStr);
        // echo "加密后:".$sign;
        // echo "<br/>------sign-------<br/>";
        return $sign;
    }
    public function isNotEmpty($var) {
        return isset($var) && $var !== '' && $var !== null;
    }
    /**
     *6位随机数生成 
     */
    public function generateRandomCode() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        $length = strlen($characters);
        $randomBytes = random_bytes(6);
        for ($i = 0; $i < 6; $i++) {
            $index = ord($randomBytes[$i]) % $length;
            $code .= $characters[$index];
        }

        return $code;
    }
    /*
        获取毫秒时间戳
    */
    public function getMillisecondTimestamp() {
        $timestamp = microtime(true); // 获取当前时间戳，包含微秒
        // 将微秒转换为毫秒
        return round($timestamp * 1000);
    }

    /**
     * @param $result
     * @throws UdunDispatchException
     * @throws CregisDispatchException
     */
    public function checkErrorAndThrow($result)
    {
        if (!$result || $result['code'] != '00000') {
            throw new CregisDispatchException($result['msg'], $result['code']);
        }
    }
}

