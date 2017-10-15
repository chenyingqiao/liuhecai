<?php 
namespace App\Resource\OAuth;

use App\Resource\OAuth\Entity\Db\PftUserRefreshToken;
use App\Resource\OAuth\Entity\RefreshTokenEntity;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;

/**
 * @Author: lerko
 * @Date:   2017-08-13 17:46:01
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:23:41
 */
class RefreshTokenRepository implements RefreshTokenRepositoryInterface
{

	/**
     * Creates a new refresh token
     *
     * @return RefreshTokenEntityInterface
     */
	public function getNewRefreshToken()
	{
		return new RefreshTokenEntity();
	}

	/**
     * Create a new refresh token_name.
     *
     * @param RefreshTokenEntityInterface $refreshTokenEntity
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
	public function persistNewRefreshToken(RefreshTokenEntityInterface $refreshTokenEntity)
	{
		$result=PftUserRefreshToken::Inc([
                    "token"=>$refreshTokenEntity->getIdentifier(),
                    "access_token"=>$refreshTokenEntity->getAccessToken()->getIdentifier(),
                    "expiry_time"=>$refreshTokenEntity->getExpiryDateTime()->format("Y-m-d H:i:s")
               ])->insert();
          if(!$result){
               throw new \Exception("创建refresh_token失败".PftUserRefreshToken::lastInc()->error(), 1);
          }
	}

	/**
     * Revoke the refresh token.
     *
     * @param string $tokenId
     */
	public function revokeRefreshToken($tokenId)
	{
          $result=PftUserRefreshToken::Inc(["is_enable"=>false])->whereEq("token",$tokenId)->update();
          if(!$result){
               throw new \Exception("禁用access_token失败".PftUserRefreshToken::lastInc()->error(), 1);
               
          }
	}

	/**
     * Check if the refresh token has been revoked.
     *
     * @param string $tokenId
     *
     * @return bool Return true if this token has been revoked
     */
	public function isRefreshTokenRevoked($tokenId)
	{
          $result=PftUserRefreshToken::Inc()->whereEq("token",$tokenId)->find();
          if(!$result){
               return true;
          }
          return false;
	}
}