<?php 

namespace App\System;

use App\Resource\OAuth\AccessTokenRepository;
use League\OAuth2\Server\CryptKey;
use League\OAuth2\Server\Middleware\ResourceServerMiddleware;
use Lib\Zan\YZGetTokenClient;
use Tuupola\Middleware\Cors;
/**
 * @Author: Administrator
 * @Date:   2017-08-10 11:41:13
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-10 15:41:40
 */
class Tool
{
	public static function getZanPlantformAT()
	{
		$client_id=Config::get("client_id");
		$client_secret=Config::get("client_secret");
		$token=new YZGetTokenClient($client_id,$client_secret);
		$type='platform_init';
		return $token->get_token($type);
	}

	public static function getZanStoreAt($kdt_id){
		$client_id=Config::get("client_id");
		$client_secret=Config::get("client_secret");
		$token=new YZGetTokenClient($client_id,$client_secret);
		$type='platform';
		$keys['kdt_id'] = $kdt_id;
		return $token->get_token($type);
	}

	/**
	 * 获取验证中间件
	 * @Author   Lerko
	 * @DateTime 2017-08-14T15:30:10+0800
	 * @return   [type]                   [description]
	 */
	public static function getResourceServerMiddleware(){
		// Init our repositories
		$accessTokenRepository = new AccessTokenRepository(); // instance of AccessTokenRepositoryInterface
		// Path to authorization server's public key
		$publicKeyPath = WEB_APP_PATH."/Resource/OAuth/key/public.key";
		// Setup the authorization server
		$server = new \League\OAuth2\Server\ResourceServer(
		    $accessTokenRepository,
		    new CryptKey($publicKeyPath,null,false)
		);
		return new ResourceServerMiddleware($server);
	}


	public static function getCorsMiddleware(){
    	$corsSetting=[
		    "origin" => ["*"],
		    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE","OPTIONS"],
		    "headers.allow" => ["content-type","authorization"],
		    "headers.expose" => [],
		    "credentials" => true,
		    "cache" => 0,
		];
		return new Cors($corsSetting);
	}
}