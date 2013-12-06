<?php

namespace Martha\GitHub\Request\Login;

use Martha\GitHub\Client;
use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Oauth
 *
 * @see http://developer.github.com/v3/oauth/#web-application-flow
 * @package Martha\GitHub\Request\Login
 */
class Oauth extends AbstractRequest
{
    /**
     * Provide the ability to get an access token from an oauth code.
     *
     * @see http://developer.github.com/v3/oauth/#web-application-flow
     * @param array $parameters
     * @return array
     */
    public function accessToken(array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->post('/login/oauth/access_token', $parameters, Client::GITHUB_URL);
        parse_str($response, $result);

        return $result;
    }
}
