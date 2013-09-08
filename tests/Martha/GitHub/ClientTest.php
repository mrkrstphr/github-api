<?php

namespace MarthaTest\GitHub;

use Martha\GitHub\Client;

/**
 * Class ClientTest
 * @package MarthaTest\GitHub
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensure that we can instantiate an object without error.
     */
    public function testConstruct()
    {
        $client = new Client();
        $this->assertInstanceOf('\\Martha\\GitHub\\Client', $client);
    }

    /**
     * Ensure that the configuration is stored.
     */
    public function testGetConfig()
    {
        $config = array('foo' => 'bar');

        $client = new Client($config);

        $this->assertEquals($config, $client->getConfig());
    }

    /**
     * Ensure an Http Client is configured.
     */
    public function testGetHttpClient()
    {
        $client = new Client();

        $this->assertInstanceOf('\\Guzzle\\Http\\Client', $client->getHttpClient());
    }

    /**
     * Test passing in our own HttpClient
     */
    public function testHttpClientOverride()
    {
        $httpClient = $this->getMock('\\Guzzle\\Http\\Client');
        $client = new Client(array(), $httpClient);

        $this->assertEquals($httpClient, $client->getHttpClient());
    }

    /**
     * Test that a generic get() call properly builds and sends a request, and receives and parses a response.
     */
    public function testGenericGet()
    {
        $expectedResponse = array('test' => 'value');

        $response = $this->getMock('\\Guzzle\\Http\\Response', array('json'));
        $response->expects($this->once())
            ->method('json')
            ->will($this->returnValue($expectedResponse));

        $request = $this->getMock('\\Guzzle\\Http\\Request', array('send'));
        $request->expects($this->once())
            ->method('send')
            ->will($this->returnValue($response));

        $httpClient = $this->getMock('\\Guzzle\\Http\\Client', array('get'));
        $httpClient->expects($this->once())
            ->method('get')
            ->with('https://api.github.com/test', null, array())
            ->will($this->returnValue($request));

        $client = new Client(array(), $httpClient);
        $returnedValue = $client->get('/test', array());

        $this->assertEquals($expectedResponse, $returnedValue);
    }

    /**
     * Test repositories() functions properly.
     */
    public function testRepositories()
    {
        $client = new Client();
        $repositories = $client->repositories();

        $this->assertInstanceOf('\\Martha\\GitHub\\Request\\Repositories', $repositories);
        $this->assertInstanceOf('\\Martha\\GitHub\\Client', $repositories->getClient());

    }
}
