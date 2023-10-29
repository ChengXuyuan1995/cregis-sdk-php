<?php
namespace Cregis\Dispatch;
class CregisDispatchException extends \Exception
{
	public function __construct($code,$msg){
		var_dump("code:".$code);
		var_dump("msg:".$msg);
	}

}