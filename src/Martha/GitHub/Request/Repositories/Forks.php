<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Forks
 *
 * @see http://developer.github.com/v3/repos/forks/
 * @package Martha\GitHub\Request\Repositories
 */
class Forks extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/forks/#list-forks
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function forks($owner, $repo, array $parameters = array())
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/forks',
            $parameters
        );
    }

    /**
     * Fork the specified repository to the authenticated user's account. If an organization is supplied via the
     * parameters, the fork will be created for that organization instead.
     *
     * @see http://developer.github.com/v3/repos/forks/#create-a-fork
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters = array())
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/forks',
            $parameters
        );
    }
}
