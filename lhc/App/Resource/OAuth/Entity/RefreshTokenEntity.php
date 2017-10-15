<?php 

namespace App\Resource\OAuth\Entity;

use App\Resource\OAuth\Entity\Db\PftUserAccessToken;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\RefreshTokenTrait;
/*
CREATE TABLE `pft_user_refresh_token` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `access_token` VARCHAR(225) NULL,
  `expiry_time` DATETIME NULL,
  PRIMARY KEY (`id`));
 */


/**
 * @Author: lerko
 * @Date:   2017-08-13 11:58:42
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:24:09
 */
class RefreshTokenEntity implements RefreshTokenEntityInterface
{
	use RefreshTokenTrait;
	use EntityTrait;
}