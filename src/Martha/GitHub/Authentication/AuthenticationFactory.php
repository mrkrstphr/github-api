<?php

namespace Martha\GitHub\Authentication;

/**
 * Class AuthenticationFactory
 * @package Martha\GitHub\Authentication
 */
class AuthenticationFactory
{
    /**
     * Analyzes the passed config and builds an authentication class for the request authentication method.
     *
     * @param array $config
     * @return bool|AbstractAuthentication
     */
    public function createAuthentication(array $config)
    {
        if (isset($config['access_token'])) {
            return new AccessToken($config['access_token']);
        }

        return false;
    }
}
