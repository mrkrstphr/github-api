<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Merges
 *
 * @see http://developer.github.com/v3/repos/merging/
 * @package Martha\GitHub\Request\Repositories
 */
class Merges extends AbstractRequest
{
    /**
     * Performs a merge.
     *
     * @see http://developer.github.com/v3/repos/merging/#perform-a-merge
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function merge($owner, $repo, array $parameters)
    {
        if (!isset($parameters['base']) || !isset($parameters['head'])) {
            throw new MalformedRequestException('Base and head are required to perform a merge');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/merges',
            $parameters
        );
    }
}
