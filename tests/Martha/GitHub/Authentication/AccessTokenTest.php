<?php

namespace MarthaTest\GitHub\Authentication;

use Guzzle\Http\Message\Request;
use Martha\GitHub\Authentication\AccessToken;

/**
 * Class AccessTokenTest
 * @package MarthaTest\GitHub\Authentication
 */
class AccessTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testRequest()
    {
        $request = new Request('GET', 'http://foo.com');

        $accessToken = new AccessToken('foobar');

        $accessToken->authenticate($request);

        $this->assertEquals('token foobar', $request->getHeader('Authorization'));
    }
}
