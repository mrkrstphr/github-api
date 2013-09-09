<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Merges
 *
 * @see http://developer.github.com/v3/repos/merging/
 * @package Martha\GitHub\Request\Repositories
 */
class Merges extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/merging/#perform-a-merge
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function merge($owner, $repo, array $parameters)
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/merges',
            $parameters
        );
    }
}
