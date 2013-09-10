<?php

namespace Martha\GitHub\Authentication;

use Guzzle\Http\Message\RequestInterface;

/**
 * Class AbstractAuthentication
 * @package Martha\GitHub\Authentication
 */
abstract class AbstractAuthentication
{
    /**
     * Modifies the request to provide the necessary authentication information.
     *
     * @param RequestInterface $request
     * @return mixed
     */
    abstract public function authenticate(RequestInterface $request);
}
