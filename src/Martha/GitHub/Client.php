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

    /**
     * Returns an instance of the Repositories API request end point.
     *
     * @return Request\Repositories
     */
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
        $queryString = http_build_query($parameters);
        $url = 'https://api.github.com' . $path . '?' . $queryString;

        $request = $this->client->get($url, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function post($path, array $parameters = array())
    {
        $request = $this->client->post('https://api.github.com' . $path, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function put($path, array $parameters = array())
    {
        $request = $this->client->put('https://api.github.com' . $path, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function patch($path, array $parameters = array())
    {
        $request = $this->client->patch('https://api.github.com' . $path, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function delete($path, array $parameters = array())
    {
        $request = $this->client->delete('https://api.github.com' . $path, null, $parameters);
        $response = $request->send();

        $data = $response->json();

        return $data;
    }
}
