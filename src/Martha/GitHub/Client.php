<?php

namespace Martha\GitHub;

use \Guzzle\Http\Client AS HttpClient;

/**
 * Class Client
 * @package Martha\GitHub
 */
class Client
{
    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;

    /**
     * Configuration passed to the constructor.
     * @var array
     */
    protected $config;

    /**
     *
     */
    public function __construct($config = array(), HttpClient $httpClient = null)
    {
        if (!$httpClient) {
            $httpClient = new HttpClient();
        }

        $this->client = $httpClient;
        $this->config = $config;
    }

    /**
     * Get the passed configuration.
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get the HTTP Client used to make the API requests.
     *
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    public function repositories()
    {
        $repositories = new Request\Repositories($this);
        return $repositories;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function get($path, array $parameters = array())
    {
        $request = $this->client->get('https://api.github.com' . $path, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }
}
