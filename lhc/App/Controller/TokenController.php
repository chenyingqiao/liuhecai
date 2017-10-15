<?php 

namespace App\Controller;

use App\Logic\User\TokenLogic;
use App\Resource\OAuth\AccessTokenRepository;
use App\Resource\OAuth\ClientRepository;
use App\Resource\OAuth\Entity\Db\PftUserAccessToken;
use App\Resource\OAuth\RefreshTokenRepository;
use App\Resource\OAuth\ScopeRepository;
use App\Resource\OAuth\UserRepository;
use App\System\Tool;
use League\OAuth2\Server\CryptKey;
use League\OAuth2\Server\Grant\RefreshTokenGrant;
use Lib\Zan\YZGetTokenClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

/**
 * @Author: Administrator
 * @Date:   2017-08-10 10:57:42
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-15 09:36:25
 */
class TokenController
{
	/**
	 * 获取有赞token
	 * @Author   Lerko
	 * @DateTime 2017-08-15T09:36:14+0800
	 * @param    ServerRequestInterface   $request  [description]
	 * @param    ResponseInterface        $response [description]
	 * @return   [type]                             [description]
	 */
	public function getToken(ServerRequestInterface  $request,ResponseInterface $response)
	{
		$token=Tool::getZanPlantformAT();
		$data=[
			"token"=>$token
		];
		return new JsonResponse($data);
	}

	/**
	 * 获取access_token
	 * @Author   Lerko
	 * @DateTime 2017-08-14T16:36:48+0800
	 * @param    ServerRequestInterface   $request  [description]
	 * @param    ResponseInterface        $response [description]
	 * @return   [type]                             [description]
	 */
	public function getAccessToken(ServerRequestInterface  $request,ResponseInterface $response){
		$server=$this->getServer();
		$server->enableGrantType(
				$this->getPasswordGrade(), 
				new \DateInterval('P6D')//用户登录时间为6天
			);
		return $server->respondToAccessTokenRequest($request, $response);
	}

	/**
	 * 让AccessToken失效
	 * @Author   Lerko
	 * @DateTime 2017-08-14T16:39:57+0800
	 * @return   [type]                   [description]
	 */
	public function revokeAccessToken(ServerRequestInterface  $request,ResponseInterface $response){
		$token=$request->getAttribute("oauth_access_token_id");
		$result=(new TokenLogic)->revokeToken($token);
		return new JsonResponse($result);
	}

	/**
	 * 刷新access_token
	 * @Author   Lerko
	 * @DateTime 2017-08-14T16:36:56+0800
	 * @param    ServerRequestInterface   $request  [description]
	 * @param    ResponseInterface        $response [description]
	 * @return   [type]                             [description]
	 */
	public function refreshToken(ServerRequestInterface  $request,ResponseInterface $response){
		$server=$this->getServer();
		$server->enableGrantType(
		    $grant,
		    new \DateInterval('PT1H')
		);
		return $server->respondToAccessTokenRequest($request, $response);
	}

	/**
	 * 取得oauth服务器
	 * @Author   Lerko
	 * @DateTime 2017-08-14T16:37:25+0800
	 * @return   [type]                   [description]
	 */
	private function getServer(){
		$clientRepository = new ClientRepository();
		$scopeRepository = new ScopeRepository();
		$accessTokenRepository = new AccessTokenRepository();
		$userRepository = new UserRepository();
		$refreshTokenRepository = new RefreshTokenRepository();

		$privateKey=WEB_APP_PATH."/Resource/OAuth/key/private.key";
		$encryptionKey = '8IhUOjl7hwXv4QvcG+uXLH/uXeKZtYWjEjPNNv+lNIM=';

		$server = new \League\OAuth2\Server\AuthorizationServer(
		    $clientRepository,
		    $accessTokenRepository,
		    $scopeRepository,
		    new CryptKey($privateKey,null,false),//不对秘钥文件进行权限判断
		    $encryptionKey
		);

		$server->getEmitter()->addListener(
		    'client.authentication.failed',
		    function (\League\OAuth2\Server\RequestEvent $event) {
		    }
		);

		return $server;
	}

	public function getPasswordGrade()
	{
		$userRepository = new UserRepository();
		$refreshTokenRepository = new RefreshTokenRepository();

		$grant = new \League\OAuth2\Server\Grant\PasswordGrant(
		     $userRepository,
		     $refreshTokenRepository
		);

		$grant->setRefreshTokenTTL(new \DateInterval('P1M'));
		return $grant;
	}

	public function getRefreshGrade(){
		$refreshTokenRepository = new RefreshTokenRepository();
		$grant = new RefreshTokenGrant($refreshTokenRepository);
		$grant->setRefreshTokenTTL(new \DateInterval('P1M'));
		return $grant;
	}
}