<?php

namespace Martha\GitHub\Authentication;

use Buzz\Message\Request;
/**
 * Class AbstractAuthentication
 * @package Martha\GitHub\Authentication
 */
abstract class AbstractAuthentication
{
    /**
     * Modifies the request to provide the necessary authentication information.
     *
     * @param Request $request
     * @return mixed
     */
    abstract public function authenticate(Request $request);
}
