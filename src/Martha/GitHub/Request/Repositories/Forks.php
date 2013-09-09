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
     * @todo
     * @see http://developer.github.com/v3/repos/forks/#create-a-fork
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters = array())
    {
        return array();
    }
}
