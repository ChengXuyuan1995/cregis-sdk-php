<?php
namespace Cregis\Dispatch;
class Clients extends Api
{	
	/**
	 * 获取项目支持的币种列表
	 * project_no 项目编号
	 * 
	 * */ 
	public 	function coinslist($project_no){
		$body = array(
            'pid' => $project_no,//项目编号
        );
        return $this->request('/api/v1/coins', $body);
	}
	/**
	 * 创建地址
	 * project_no 项目编号
	 * chain_id 链id
	 * alias 别名
	 * callback_url 回调地址
	 * 
	 */
	public 	function createAddress($project_no,$chain_id,$alias,$callback_url){
		$body = array(
            'pid' => $project_no,//项目编号
            'chain_id'=>$chain_id,
            'alias'=>$alias,
            'callback_url'=>$callback_url
        );
        return $this->request('/api/v1/address/create', $body);
	}
	/**
	 * 查询地址是否存在
	 * project_no 项目编号
	 * chain_id 链id
	 * address 需要查询的地址
	 */
	public 	function addressInner($project_no,$chain_id,$address){
		$body = array(
            'pid' => $project_no,//项目编号
            'chain_id'=>$chain_id,
            'address'=>$address
        );
        return $this->request('/api/v1/address/inner', $body);
	}


	/**
	 * 查询地址合法性
	 * project_no 项目编号
	 * chain_id 链id
	 * address 需要查询的地址
	 */
	public 	function addressLegal($project_no,$chain_id,$address){
		$body = array(
            'pid' => $project_no,//项目编号
            'chain_id'=>$chain_id,
            'address'=>$address
        );
        return $this->request('/api/v1/address/legal', $body);
	}

	/**
	 * 发起提币
	 * project_no 项目编号
	 * currency 币种标识, 可以使用币种编号或者币种名称,例如 USDT-ERC20 或 60@0xdac17f958d2ee523a2206206994597c13d831ec7
	 * address 地址
	 * amount 金额
	 * callback_url 回调地址
	 * third_party_id 调用方业务编号
	 * remark 备注
	 */ 
	public function payout($project_no,$currency,$address,$amount,$callback_url,$third_party_id,$remark){
		$body = array(
            'pid' => $project_no,//项目编号
            'currency'=>$currency,//币种标识, 可以使用币种编号或者币种名称,例如 USDT-ERC20 或 60@0xdac17f958d2ee523a2206206994597c13d831ec7
            'address'=>$address,
            'amount'=>$amount,
            'callback_url'=>$callback_url,
            'third_party_id'=>$third_party_id,
            'remark'=>$remark
        );
        return $this->request('/api/v1/payout', $body);	
	}

	/**
	 * 提币查询
	 * project_no 项目编号
	 * cid 订单编号,
	 * 
	 * */
	public function payoutQuery($project_no,$cid){
		$body = array(
            'pid' => $project_no,//项目编号
            'cid'=>$cid 
        );
        return $this->request('/api/v1/payout/query', $body);	
	}


	/**
	 * 充值回调
	 * 
	 * 参数示例
	{
	    "pid": 1382528827416576,
	    "chain_id":"195",
	    "token_id":"195",
	    "currency": "TRX",
	    "amount": "1.2",
	    "address":"TXsmKpEuW7qWnXzJLGP9eDLvWPR2GRn1FS",
	    "status": 1,
	    "txid": "6dd05b0972075542219a3fcc116c58feaf9480f1f698cc46c4367ded83955cfd",
	    "block_height": "34527604",
	    "block_time": 1686814482000,
	    "nonce": "ubqso3",
	    "timestamp": 1687850657960,
	    "sign": "f5be13fdd8c6f63951ca4427359457cb"
	}  
	 * */
	public function changeBackUrl(){
		$data = file_get_contents('php://input');
		$params = json_decode($data, true);
		$getSign = $params['sign'];
		$sgin = $this->generateSign($apiKey, $params);
		if($getSign!=$sgin){
			$this->checkErrorAndThrow(['code'=>'-1','msg'=>'签名错误']);
			return ;
		}
		if($params['status']==1){
			//充值成功业务
			return "success";
		}else if($params['status']==2){
			//充值失败业务
			return "success";
		} 

	}

	/**
	 * 提币回调
	 * 参数示例
	 * 
		{
		  "pid": 1382528827416576,
		  "address": "TXsmKpEuW7qWnXzJLGP9eDLvWPR2GRn1FS",
		  "chain_id": "195",
		  "token_id": "195",
		  "currency": "TRX",
		  "amount": "1.1",
		  "third_party_id": "1e0fb3a0a9454ad8928d26b592e8b3c7",
		  "remark": "payout",
		  "status": 0,
		  "txid": "6dd05b0972075542219a3fcc116c58feaf9480f1f698cc46c4367ded83955cfd",
		  "block_height": "34527604",
		  "block_time": 1686814482000,
		  "nonce": "ubqso3",
		  "timestamp": 1687850657960,
		  "sign": "f5be13fdd8c6f63951ca4427359457cb"
		}
	 * 
	 * */
	public function withdrawalBackUrl(){
		$data = file_get_contents('php://input');
		echo $data;
		echo '<br/>---------<br/>';
		$params = json_decode($data, true);
		$getSign = $params['sign'];
		$sgin = $this->generateSign($apiKey, $params);
		echo "getSign:".$getSign;
		echo "<br>";
		echo "sgin:".$sgin;
		if($getSign!=$sgin){
			$this->checkErrorAndThrow(['code'=>'-1','msg'=>'签名错误']);
			return ;
		}
		if($params['status']==0){
			// 提币成功业务
			return "success";
		}else if($params['status']==2){
			//签名驳回
			return "success";
		}else if($params['status']==4){
			//审批驳回
			return "success";
		}else if($params['status']==6){
			//交易成功
			return "success";
		}else if($params['status']==7){
			//交易失败
			return "success";
		}    

	}

}