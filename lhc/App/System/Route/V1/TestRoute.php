<?php 

namespace App\System\Route\V1;

use App\Controller\TokenController;
use App\System\Interfaces\RouteComponentInterface;
use App\System\Tool;
use League\Route\Strategy\JsonStrategy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
/**
 * @Author: Administrator
 * @Date:   2017-08-11 11:54:22
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-11 14:26:09
 */
class TestRoute implements RouteComponentInterface
{
	public function register(&$route)
	{
		$route->map(['GET',"POST"],"/",function (ServerRequestInterface $request, ResponseInterface $response) {
		 	return new JsonResponse(["msg"=>"Hello World!"]);
		})->setStrategy(new JsonStrategy)
			->middleware(Tool::getCorsMiddleware());

		$route->get("/info",function(ServerRequestInterface $request,ResponseInterface $response){
			ob_start();
			phpinfo();
			$output=ob_get_contents();
			ob_end_clean();
			return new HtmlResponse($output);
		});

		$route->group("/test",function($route){
			$route->map(['GET'],"/token",[new TokenController,"getToken"]);
			$route->map(['POST'],"/access_token",[new TokenController,"getAccessToken"]);
		});

		$route->group('/validate',function($route){
			$route->map(['GET'],"/hello",function (ServerRequestInterface $request, ResponseInterface $response) {
			 	return new JsonResponse(["msg"=>"Hello World in Sercurity!"]);
			});
		})->setStrategy(new JsonStrategy)
			->middleware(Tool::getResourceServerMiddleware())
			->middleware(Tool::getCorsMiddleware());
	}
}