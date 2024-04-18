<?php
namespace Cregis\Dispatch;

use Exception;

class CregisDispatchException extends Exception
{
    /**
     * @param $msg
     * @param $code
     * @param Exception $exception
     */
	public function __construct($msg, $code, Exception $exception){
        parent::__construct($msg, $code, $exception);
	}

    /**
     * @return string
     */
    public function __toString()
    {
        return __CLASS__.":[{$this->code}]:[$this->message]\n";
    }

}