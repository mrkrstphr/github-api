<?php

namespace Martha\GitHub;

use Buzz\Client\AbstractClient;
use Buzz\Client\Curl;
use Buzz\Message\Request as BuzzRequest;
use Buzz\Message\Response as BuzzResponse;
use Martha\GitHub\Authentication\AbstractAuthentication;
use Martha\GitHub\Authentication\AuthenticationFactory;

/**
 * Class Client
 * @package Martha\GitHub
 */
class Client
{
    /**
     * @var AbstractClient
     */
    protected $client;

    /**
     * Configuration passed to the constructor.
     * @var array
     */
    protected $config;

    /**
     * @var AbstractAuthentication
     */
    protected $authentication;

    /**
     * @var BuzzResponse
     */
    protected $lastResponse;

    /**
     * @param array $config
     * @param AbstractClient $httpClient
     */
    public function __construct($config = array(), AbstractClient $httpClient = null)
    {
        if (!$httpClient) {
            $httpClient = new Curl();
        }

        $this->client = $httpClient;
        $this->config = $config;

        $authenticationFactory = new AuthenticationFactory();
        $this->authentication = $authenticationFactory->createAuthentication($config);
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
     * @return AbstractClient
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * Returns an instance of the Gists API request end point.
     *
     * @return Request\Gists
     */
    public function gists()
    {
        return new Request\Gists($this);
    }

    /**
     * Returns an instance of the GitIgnore API request end point.
     *
     * @return Request\GitIgnore
     */
    public function gitIgnore()
    {
        return new Request\GitIgnore($this);
    }

    /**
     * Returns an instance of the Issues API request end point.
     *
     * @return Request\Issues
     */
    public function issues()
    {
        return new Request\Issues($this);
    }

    /**
     * Returns an instance of the Markdown API request end point.
     *
     * @return Request\Markdown
     */
    public function markdown()
    {
        return new Request\Markdown($this);
    }

    /**
     * Returns an instance of the User API request end point.
     *
     * @return Request\Me
     */
    public function me()
    {
        return new Request\Me($this);
    }

    /**
     * Returns an instance of the Organizations API request end point.
     *
     * @return Request\Organizations
     */
    public function organizations()
    {
        return new Request\Organizations($this);
    }

    /**
     * Returns an instance of the PullRequests API request end point.
     *
     * @return Request\Pulls
     */
    public function pullRequests()
    {
        return new Request\Pulls($this);
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
     * Returns an instance of the Search API request end point.
     *
     * @return Request\Search
     */
    public function search()
    {
        return new Request\Search($this);
    }

    /**
     * Returns an instance of the Users API request end point.
     *
     * @return Request\Users
     */
    public function users()
    {
        return new Request\Users($this);
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @return mixed
     */
    protected function request($method, $path, array $parameters = array())
    {
        $resource = str_replace('https://api.github.com', '', $path);

        $request = new BuzzRequest($method, $resource, 'https://api.github.com');
        $request->addHeader('User-agent: Martha-Github-Client');

        if ($method != 'GET' && $parameters) {
            $content = json_encode($parameters);
            $request->setContent($content);
        }

        if ($this->authentication) {
            $this->authentication->authenticate($request);
        }

        $response = new BuzzResponse();

        $this->getHttpClient()->send($request, $response);

        if ($response->getStatusCode() == '302') {
            $location = $response->getHeader('Location');

            if ($location) {
                return $this->get($location);
            }
        }

        $this->lastResponse = $response;

        if (substr($response->getHeader('Content-type'), 0, 16) == 'application/json') {
            $data = json_decode($response->getContent(), true);
        } else {
            $data = $response->getContent();
        }

        return $data;
    }

    /**
     * Get the last response returned from the API.
     *
     * @return BuzzResponse
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function get($path, array $parameters = array())
    {
        $queryString = http_build_query($parameters);
        $url = 'https://api.github.com' . $path . ($queryString ? '?' . $queryString : '');
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
