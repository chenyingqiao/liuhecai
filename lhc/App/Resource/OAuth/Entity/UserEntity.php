<?php 
namespace App\Resource\OAuth\Entity;

use League\OAuth2\Server\Entities\UserEntityInterface;
/**
 * @Author: lerko
 * @Date:   2017-08-13 12:04:28
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:23:10
 */
class UserEntity implements UserEntityInterface
{

	/**
     * Return the user's identifier.
     *
     * @return mixed
     */
	public function getIdentifier()
	{
		return 1;
	}
}