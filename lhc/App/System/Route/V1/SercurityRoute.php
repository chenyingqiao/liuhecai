<?php

namespace App\System\Route\V1;

use App\Controller\TokenController;
use App\System\Interfaces\RouteComponentInterface;
use App\System\Tool;
use League\Route\Strategy\JsonStrategy;

class SercurityRoute implements RouteComponentInterface
{
	public function register(&$route)
	{
		$route->group('/auth',function($route){
			$route->post("/access_token",[new TokenController,"getAccessToken"]);//获取access_token
			$route->post("/revoke_token",[new TokenController,"revokeAccessToken"])->middleware(Tool::getResourceServerMiddleware());//注销access_token
		})->setStrategy(new JsonStrategy)
			->middleware(Tool::getCorsMiddleware());
	}
}