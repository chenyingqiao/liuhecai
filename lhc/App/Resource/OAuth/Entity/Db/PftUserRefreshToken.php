<?php
namespace App\Resource\OAuth\Entity\Db;

/**
 * @Table [name=pft_user_refresh_token]
 */
class PftUserRefreshToken extends \Phero\Database\DbUnit
{

    /**
     * @Field [name=id,type=int]
     * @Primary
     */
    public $id = null;

    /**
     * @Field[name=token,type=string]
     * @var null
     */
    public $token=null;

    /**
     * @Field
     * [name=access_token,type=string]
     */
    public $access_token = null;

    /**
     * @Field
     * [name=expiry_time,type=string]
     */
    public $expiry_time = null;

    /**
     * @Field[name=is_enable,type=int]
     * @var null
     */
    public $is_enable=null;

}
