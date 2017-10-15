<?php 

namespace App\System\Message;

use App\System\Config;
class StatusMessage implements \JsonSerializable
{
	private $status,$msg,$debug;
	function __construct($status,$msg,$debug="")
	{
		$this->status=$status;
		$this->msg=$msg;
		$this->debug=$debug;
	}

	public function jsonSerialize(){
		if(Config::get("debug")){
			$this->msg.="|".$this->debug;
		}
		return ["status"=>$this->status,"msg"=>$this->msg];
	}
}