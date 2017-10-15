<?php 

namespace App\Resource\OAuth\Entity;
/**
 * @Author: lerko
 * @Date:   2017-08-13 12:03:05
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:22:46
 */
class AuthCodeEntity implements League\OAuth2\Server\Entities\AuthCodeEntityInterface
{
	use League\OAuth2\Server\Entities\Traits\EntityTrait;
	use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;
	use League\OAuth2\Server\Entities\Traits\AuthCodeTrait;
}