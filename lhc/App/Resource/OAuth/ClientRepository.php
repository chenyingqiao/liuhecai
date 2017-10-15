<?php 
namespace App\Resource\OAuth;

use App\Resource\OAuth\Entity\ClientEntity;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
/**
 * @Author: lerko
 * @Date:   2017-08-13 17:44:59
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-08-14 09:23:35
 */
class ClientRepository implements ClientRepositoryInterface
{

	/**
     * Get a client.
     *
     * @param string      $clientIdentifier   The client's identifier
     * @param string      $grantType          The grant type used
     * @param null|string $clientSecret       The client's secret (if sent)
     * @param bool        $mustValidateSecret If true the client must attempt to validate the secret if the client
     *                                        is confidential
     *
     * @return ClientEntityInterface
     */
	public function getClientEntity($clientIdentifier, $grantType, $clientSecret = null, $mustValidateSecret = true)
	{
		return new ClientEntity($clientIdentifier);
	}
}