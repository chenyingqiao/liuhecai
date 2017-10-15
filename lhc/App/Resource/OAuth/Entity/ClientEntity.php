<?php 
namespace App\Resource\OAuth\Entity;

use App\Resource\OAuth\Entity\Db\PftUserClient;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\ClientTrait;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
/*
CREATE TABLE `pft_user_client` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `redirect_url` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
 */

/**
 * @Author: lerko
 * @Date:   2017-08-13 11:54:08
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:22:51
 */
class ClientEntity implements ClientEntityInterface
{
	use ClientTrait;
	use EntityTrait;

	public function __construct($id){
		$this->setIdentifier($id);
		$data=PftUserClient::Inc(['id'=>$id])->find();
		if(!empty($data)){
			$this->name=$data["name"];
			$this->redirectUri=$data["redirectUri"];
		}
	}
}
