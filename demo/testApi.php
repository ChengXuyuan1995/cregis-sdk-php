<?php
require_once __DIR__.'/../vendor/autoload.php';
$project_no = 1389058148376576; //项目编号
$api_key= '793efc5a96ec47ee8e6f1f3bb08cc91b';// apikey
$endpoint= 'https://ovhemmfm.cregis.io'; //网关节点
$callUrl = "https://localhost/callUrl"; //回调地址

$result = new \Cregis\Dispatch\CregisDispatch([
            'project_no' => $project_no,
            'api_key' => $api_key,
            'endpoint'=>$endpoint,
            'callUrl'=>$callUrl
        ]);



//测试签名  sign==c9bae061ae3f5f8d3bfde817f6966c36
// $sigeData='{
//   "pid": 1382528827416576,
//   "currency": "195@195",
//   "address": "TXsmKpEuW7qWnXzJLGP9eDLvWPR2GRn1FS",
//   "amount": "1.1",
//   "remark": "payout",
//   "third_party_id": "c9231e604da54469a735af3f449c880f",
//   "callback_url": "http://192.168.2.29:9099/callback",
//   "nonce": "hwlkk6",
//   "timestamp": 1688004243314
// }';

// var_dump( $result->generateSign('f502a9ac9ca54327986f29c03b271491',json_decode($sigeData,true))); 

/*------------------------------------------------------*/

// $coinslist=$result->coinslist($project_no);
// echo "<br/>-----项目支持的币种-----<br/>";
// echo json_encode($coinslist);
// echo "<br/><br/>";
//打印结果： {"code":"00000","msg":"ok","data":{"payout_coins":[{"coin_name":"TRON","chain_id":"195","token_id":"195"},{"coin_name":"USDT-TRC20","chain_id":"195","token_id":"TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t"},{"coin_name":"Ethereum","chain_id":"60","token_id":"60"}],"address_coins":[{"coin_name":"TRON","chain_id":"195","token_id":"195"},{"coin_name":"USDT-TRC20","chain_id":"195","token_id":"TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t"},{"coin_name":"Ethereum","chain_id":"60","token_id":"60"}],"order_coins":null},"ok":true}

/*------------------------------------------------------*/

// $createAdress= $result->createAddress($project_no,60,'test01',$callUrl);
// echo "<br/>-----创建地址-----<br/>";
// echo json_encode($createAdress);
// echo "<br/><br/>";
// echo "<br/>-----------------------<br/>";
//打印结果：{"code":"00000","msg":"ok","data":{"address":"0x8fabec737e3e724f1fc4537da44f84029c7879b9"},"ok":true}

/*------------------------------------------------------*/


// $addressInner= $result->addressInner($project_no,60,'0x8fabec737e3e724f1fc4537da44f84029c7879b9');
// echo "<br/>-----检查地址是否存在-----<br/>";
// echo json_encode($addressInner);
// echo "<br/><br/>";
// echo "<br/>-----------------------<br/>";
//打印结果：  {"code":"00000","msg":"ok","data":{"result":true},"ok":true}

/*------------------------------------------------------*/

// $addressLegal= $result->addressLegal($project_no,60,'0x8fabec737e3e724f1fc4537da44f84029c7879b9');
// echo "<br/>-----检查地址合法性-----<br/>";
// echo json_encode($addressLegal);
// echo "<br/><br/>";
// echo "<br/>-----------------------<br/>";
//打印结果：  {"code":"00000","msg":"ok","data":{"result":true},"ok":true}

/*------------------------------------------------------*/

// $payout= $result->payout($project_no,'60@60','0x8fabec737e3e724f1fc4537da44f84029c7879b9',0.05,$callUrl,"OR".time(),'备注');
// echo "<br/>-----发起提币申请-----<br/>";
// echo json_encode($payout);
// echo "<br/><br/>";
// echo "<br/>-----------------------<br/>";
//打印结果： {"code":"00000","msg":"ok","data":{"cid":1390260293664768},"ok":true}

/*------------------------------------------------------*/

// 1390261899567104

// $payoutQuery= $result->payoutQuery($project_no,1390260293664768);
// echo "<br/>-----提币查询-----<br/>";
// echo json_encode($payoutQuery);
// echo "<br/><br/>";
// echo "<br/>-----------------------<br/>";
//打印结果： {"code":"00000","msg":"ok","data":{"pid":1389058148376576,"address":"0x8fabec737e3e724f1fc4537da44f84029c7879b9","chain_id":"60","token_id":"60","currency":"60@60","amount":"0.05","third_party_id":"OR1697097042","remark":"\u5907\u6ce8","txid":null,"block_time":null,"block_height":null,"status":5},"ok":true}

/*------------------------------------------------------*/


 