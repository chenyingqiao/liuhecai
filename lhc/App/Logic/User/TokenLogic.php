<?php 

namespace App\Logic\User;

use App\Resource\OAuth\Entity\Db\PftUserAccessToken;
use App\System\Message\StatusMessage;

class TokenLogic
{
	public function revokeToken($access_token_id){
		$result=PftUserAccessToken::Inc([
				"is_enable"=>0
			])
			->whereEq("token",$access_token_id)
			->update();
		if(empty($result)){
			return new StatusMessage(false,"退出登录失败",PftUserAccessToken::lastInc()->error()."</br>".PftUserAccessToken::lastInc()->sql());
		}
		return new StatusMessage(true,"退出登录成功");
	}
}