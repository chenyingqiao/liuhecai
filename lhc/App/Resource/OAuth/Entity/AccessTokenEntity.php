<?php 

namespace App\Resource\OAuth\Entity;

use App\Resource\OAuth\Entity\UserEntity;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\TokenEntityTrait;

/*
这个创建表和Auth是同一个只是auth多了一个跳转路径
CREATE TABLE `pft_user_access_token` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `scopes` VARCHAR(45) NULL,
  `expiry_time` DATETIME NULL,
  `user_id` VARCHAR(45) NULL,
  `client_id` VARCHAR(45) NULL,
  `redirect_url` TEXT NULL,
  PRIMARY KEY (`id`));
 */

/**
 * @Author: lerko
 * @Date:   2017-08-13 11:50:05
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:22:38
 */
class AccessTokenEntity implements AccessTokenEntityInterface
{
	use AccessTokenTrait;
	use EntityTrait;
	use TokenEntityTrait;
}