<?php
namespace App\Resource\OAuth\Entity\Db;

/**
 * @Table [name=pft_user_client]
 */
class PftUserClient extends \Phero\Database\DbUnit
{

    /**
     * @Field [name=id,type=int]
     * @Primary
     */
    public $id = null;

    /**
     * @Field [name=name,type=string]
     */
    public $name = null;

    /**
     * @Field
     * [name=redirect_url,type=string]
     */
    public $redirect_url = null;


}
