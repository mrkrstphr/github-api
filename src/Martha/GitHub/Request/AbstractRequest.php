<?php

namespace Martha\GitHub\Request;

use Martha\GitHub\Client;

/**
 * Class AbstractRequest
 * @package Martha\GitHub\Request
 */
abstract class AbstractRequest
{
    /**
     * The client to make the API requests against.
     * @var \Martha\GitHub\Client
     */
    protected $client;

    /**
     * Setup the class with the injected client.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get the GitHub API client.
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
