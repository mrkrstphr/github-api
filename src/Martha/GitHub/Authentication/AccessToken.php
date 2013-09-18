<?php

namespace Martha\GitHub\Authentication;

use Buzz\Message\Request;
use Guzzle\Http\Message\RequestInterface;

/**
 * Class AccessToken
 * @package Martha\GitHub\Authentication
 */
class AccessToken extends AbstractAuthentication
{
    /**
     * The access token for the authenticated user.
     * @var string
     */
    protected $accessToken;

    /**
     * Stores the access token later use.
     *
     * @param string $accessToken
     */
    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Modifies the request to provide the access token via headers.
     *
     * @param RequestInterface $request
     */
    public function authenticate(Request $request)
    {
        $request->addHeader('Authorization: token ' . $this->accessToken);
    }
}
