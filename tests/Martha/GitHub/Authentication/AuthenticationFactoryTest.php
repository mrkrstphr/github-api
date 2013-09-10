<?php

namespace MarthaTest\GitHub\Authentication;

use Martha\GitHub\Authentication\AuthenticationFactory;

/**
 * Class AuthenticationFactoryTest
 * @package MarthaTest\GitHub\Authentication
 */
class AuthenticationFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test access_token authentication.
     */
    public function testAccessToken()
    {
        $factory = new AuthenticationFactory();
        $class = $factory->createAuthentication(array('access_token' => 'foo'));

        $this->assertInstanceOf('\\Martha\\GitHub\\Authentication\\AccessToken', $class);
    }

    /**
     * Test that false is returned from the factory when no authentication info is given.
     */
    public function testNoAuthentication()
    {
        $factory = new AuthenticationFactory();
        $class = $factory->createAuthentication(array());

        $this->assertFalse($class);
    }
}
