<?php 
namespace App\Resource\OAuth;

use App\Resource\OAuth\Entity\AccessTokenEntity;
use App\Resource\OAuth\Entity\Db\PftUserAccessToken;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

/**
 * @Author: lerko
 * @Date:   2017-08-13 17:41:42
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:23:25
 */
class AccessTokenRepository implements AccessTokenRepositoryInterface
{


	/**
     * Create a new access token
     *
     * @param ClientEntityInterface  $clientEntity
     * @param ScopeEntityInterface[] $scopes
     * @param mixed                  $userIdentifier
     *
     * @return AccessTokenEntityInterface
     */
	public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
	{
	    $accessTokenEntity=new AccessTokenEntity();
         $accessTokenEntity->setExpiryDateTime(new \DateTime());
         $accessTokenEntity->setUserIdentifier($userIdentifier);
         // $accessTokenEntity->setClient($clientEntity);
         foreach ($scopes as $key => $value) {
               $scope=new ScopeEntity();
               $scope->setIdentifier($value);
              $accessTokenEntity->addScope($scope);
         }
         return $accessTokenEntity;
	}

	/**
     * Persists a new access token to permanent storage.
     *
     * @param AccessTokenEntityInterface $accessTokenEntity
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
	public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
	{
          $scopes=$accessTokenEntity->getScopes();
          $scope_str="";
          foreach ($scopes as $key => $value) {
               $scope_str.=$key.",";
          }
          $pft_access_token=PftUserAccessToken::Inc([
                    "token"=>$accessTokenEntity->getIdentifier(),
                    "scopes"=>$scope_str,
                    "expiry_time"=>$accessTokenEntity->getExpiryDateTime()->format("Y-m-d H:i:s"),
                    "user_id"=>$accessTokenEntity->getUserIdentifier(),
                    "client_id"=>$accessTokenEntity->getClient()->getIdentifier()
               ]);
          $result=$pft_access_token->insert();
          if(empty($result)){
               throw new \Exception("存储token错误".$pft_access_token->error(), 1);
          }
	}

	/**
     * Revoke an access token.
     *
     * @param string $tokenId
     */
	public function revokeAccessToken($tokenId)
	{
          $result=PftUserAccessToken::Inc(["is_enable"=>false])->whereEq("token",$tokenId)->update();
          if(!$result){
               throw new \Exception("禁用access_token失败".PftUserAccessToken::lastInc()->error(), 1);
               
          }
	}

	/**
     * Check if the access token has been revoked.
     *
     * @param string $tokenId
     *
     * @return bool Return true if this token has been revoked
     */
	public function isAccessTokenRevoked($tokenId)
	{
		$result=PftUserAccessToken::Inc()->whereEq("token",$tokenId)->find();
      if(!$result){
           return true;
      }
      return false;
	}
}