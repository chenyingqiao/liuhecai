<?php 
namespace App\Resource\OAuth;

use App\Resource\OAuth\Entity\UserEntity;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

/**
 * @Author: lerko
 * @Date:   2017-08-13 17:47:34
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:24:01
 */
class UserRepository implements UserRepositoryInterface
{

	/**
     * Get a user entity.
     *
     * @param string                $username
     * @param string                $password
     * @param string                $grantType    The grant type used
     * @param ClientEntityInterface $clientEntity
     *
     * @return UserEntityInterface
     */
	public function getUserEntityByUserCredentials(
        $username,
        $password,
        $grantType,
        ClientEntityInterface $clientEntity
    )
	{
		return new UserEntity();
	}
}