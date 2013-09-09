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
     * @param array $config
     * @param HttpClient $httpClient
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
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @return mixed
     */
    protected function request($method, $path, array $parameters = array())
    {
        $request = $this->client->createRequest($method, $path, null, $parameters);
        $response = $request->send();

        if ($response->getStatusCode() == '302') {
            $location = $response->getHeader('Location');

            if ($location) {
                return $this->get($location);
            }
        }

        if (substr($response->getContentType(), 0, 16) == 'application/json') {
            $data = $response->json();
        } else {
            $data = $response->getBody(true);
        }

        return $data;
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
        return $this->request('GET', $url);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function post($path, array $parameters = array())
    {
        return $this->request('POST', 'https://api.github.com' . $path, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function put($path, array $parameters = array())
    {
        return $this->request('PUT', 'https://api.github.com' . $path, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function patch($path, array $parameters = array())
    {
        return $this->request('PATCH', 'https://api.github.com' . $path, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function delete($path, array $parameters = array())
    {
        return $this->request('DELETE', 'https://api.github.com' . $path, $parameters);
    }
}
