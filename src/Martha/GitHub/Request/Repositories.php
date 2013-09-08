<?php

namespace Martha\GitHub\Request;

/**
 * Class Repositories
 * @package Martha\GitHub\Request
 */
class Repositories extends AbstractRequest
{
    /**
     * Get information about a specific GitHub repository.
     *
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function get($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo));

        return $response;
    }

    /**
     * Get all public GitHub repositories.
     *
     * @param array $parameters
     * @return array
     */
    public function all(array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get('/repositories', $parameters);

        return $response;
    }
}
