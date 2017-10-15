<?php 
namespace App;

use App\Controller\ZanTokenController;
use App\System\Route\RouteCollectionVersion;
use App\System\Route\V1\TestRoute;
use League\Route\RouteCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
/**
 * @Author: Lerko
 * @Date:   2017-08-10 10:21:32
 * @Last Modified by:   lerko
 * @Last Modified time: 2017-10-14 22:32:57
 */
class Route
{
	private $route;

	public function __construct()
	{
		$this->route=new RouteCollectionVersion("Normal");//版本号V1
	}

	public function routing()
	{	
		$this->route->addRouter([
				"Liuhecai"
				// "TestRoute",
				// "SercurityRoute"
			])->routing();
		return $this;
	}
	public function dispatch(){
		$response = $this->route->dispatch(ServerRequestFactory::fromGlobals(
		        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
		    ), new Response);
		(new SapiEmitter)->emit($response);
	}
}