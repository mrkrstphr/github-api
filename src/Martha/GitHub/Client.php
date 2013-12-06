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
     *
     */
    const GITHUB_URL = 'https://github.com';

    /**
     *
     */
    const GITHUB_API_URL = 'https://api.github.com';

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
     * @var int
     */
    protected $rateLimit;

    /**
     * @var int
     */
    protected $rateLimitRemaining;

    /**
     * @var int
     */
    protected $rateLimitReset;

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

    public function login()
    {
        return new Request\Login($this);
    }

    /**
     * Prepare an API request and return the Request object for further manipulation.
     *
     * @param string $method
     * @param string $resource
     * @param array $parameters
     * @param string $url
     * @return BuzzRequest
     */
    public function prepareRequest($method, $resource, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        $request = new BuzzRequest($method, $resource, $url);
        $request->addHeader('User-agent: Martha-Github-Client');
        $request->addHeader('Content-type: application/json');

        if ($method != 'GET' && $parameters) {
            $content = json_encode($parameters);
            $request->setContent($content);
        }

        if ($this->authentication) {
            $this->authentication->authenticate($request);
        }

        return $request;
    }

    /**
     * Runs the given Request, parses the response and returns it.
     *
     * @param BuzzRequest $request
     * @return array|mixed
     */
    public function processRequest(BuzzRequest $request)
    {
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

        $this->rateLimit = $response->getHeader('X-RateLimit-Limit');
        $this->rateLimitRemaining = $response->getHeader('X-RateLimit-Remaining');
        $this->rateLimitReset = $response->getHeader('X-RateLimit-Reset');

        return $data;
    }

    /**
     * @param string $method
     * @param string $resource
     * @param array $parameters
     * @param string $url
     * @return mixed
     */
    protected function request($method, $resource, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        $request = $this->prepareRequest($method, $resource, $parameters, $url);
        return $this->processRequest($request);
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
     * @param string $url
     * @return array
     */
    public function get($path, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        $queryString = http_build_query($parameters);
        $resource = $path . ($queryString ? '?' . $queryString : '');
        return $this->request('GET', $resource, [], $url);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param string $url
     * @return array
     */
    public function post($path, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        return $this->request('POST', $path, $parameters, $url);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param string $url
     * @return array
     */
    public function put($path, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        return $this->request('PUT', $path, $parameters, $url);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param string $url
     * @return array
     */
    public function patch($path, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        return $this->request('PATCH', $path, $parameters, $url);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param string $url
     * @return array
     */
    public function delete($path, array $parameters = array(), $url = self::GITHUB_API_URL)
    {
        return $this->request('DELETE', $path, $parameters, $url);
    }

    /**
     * @return int
     */
    public function getRateLimit()
    {
        return $this->rateLimit;
    }

    /**
     * @return int
     */
    public function getRateLimitRemaining()
    {
        return $this->rateLimitRemaining;
    }

    /**
     * @return int
     */
    public function getRateLimitReset()
    {
        return date('Y-m-d H:i:s', $this->rateLimitReset);
    }
}
