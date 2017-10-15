<?php 
namespace App\Resource\OAuth\Entity;

use League\OAuth2\Server\Entities\ScopeEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
/**
 * @Author: lerko
 * @Date:   2017-08-13 12:00:45
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:24:04
 */
class ScopeEntity implements ScopeEntityInterface
{
	use EntityTrait;

	public function jsonSerialize()
    {
        return $this->getIdentifier();
    }

}