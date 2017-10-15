<?php
namespace App\Resource\OAuth\Entity\Db;

/**
 * @Table[name=pft_user_access_token]
 */
class PftUserAccessToken extends \Phero\Database\DbUnit
{

    /**
     * @Field [name=id,type=int]
     * @Primary
     */
    public $id = null;

    /**
     * @Field [name=token,type=string]
     * @var null
     */
    public $token=null;

    /**
     * @Field [name=scopes,type=string]
     */
    public $scopes = null;

    /**
     * @Field
     * [name=expiry_time,type=string]
     */
    public $expiry_time = null;

    /**
     * @Field [name=user_id,type=int]
     */
    public $user_id = null;

    /**
     * @Field
     * [name=client_id,type=int]
     */
    public $client_id = null;

    /**
     * @Field
     * [name=redirect_url,type=string]
     */
    public $redirect_url = null;

    /**
     * @Field[name=is_enable,type=int]
     * @var null
     */
    public $is_enable=null;

}
