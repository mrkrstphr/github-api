<?php

namespace Martha\GitHub\Request;

/**
 * Class Login
 *
 * @see http://developer.github.com/v3/oauth/#web-application-flow
 * @package Martha\GitHub\Request
 */
class Login extends AbstractRequest
{
    /**
     * Provide access to the Oauth endpoint.
     * 
     * @return array
     */
    public function oauth()
    {
        return new Login\Oauth($this->getClient());
    }
}
