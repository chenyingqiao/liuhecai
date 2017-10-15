<?php 
namespace App\Resource\OAuth;

use App\Resource\OAuth\Entity\AuthCodeEntity;
use League\OAuth2\Server\Repositories\AuthCodeRepositoryInterface;
/**
 * @Author: lerko
 * @Date:   2017-08-13 17:43:33
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:23:31
 */
class AuthCodeRepository implements AuthCodeRepositoryInterface
{
	

	/**
     * Creates a new AuthCode
     *
     * @return AuthCodeEntityInterface
     */
	public function getNewAuthCode()
	{
		$authcode= new AuthCodeEntity();
		return $authcode;
	}

	/**
     * Persists a new auth code to permanent storage.
     *
     * @param AuthCodeEntityInterface $authCodeEntity
     *
     * @throws UniqueTokenIdentifierConstraintViolationException
     */
	public function persistNewAuthCode(AuthCodeEntityInterface $authCodeEntity)
	{
		$authcode= new AuthCodeEntity();
		return $authcode;
	}

	/**
     * Revoke an auth code.
     *
     * @param string $codeId
     */
	public function revokeAuthCode($codeId)
	{
		$authcode= new AuthCodeEntity();
		return $authcode;
	}

	/**
     * Check if the auth code has been revoked.
     *
     * @param string $codeId
     *
     * @return bool Return true if this code has been revoked
     */
	public function isAuthCodeRevoked($codeId)
	{
		$authcode= new AuthCodeEntity();
		return $authcode;
	}
}