<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Statuses
 *
 * @see http://developer.github.com/v3/repos/statuses/
 * @package Martha\GitHub\Request\Repositories
 */
class Statuses extends AbstractRequest
{
    /**
     * Get status for a specific reference of a given repository.
     *
     * @see http://developer.github.com/v3/repos/statuses/#list-statuses-for-a-specific-ref
     * @param string $owner
     * @param string $repo
     * @param string $ref
     * @return array
     */
    public function statuses($owner, $repo, $ref)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/statuses/' . urlencode($ref)
        );
    }

    /**
     * Create a commit status for a specific reference for a given repository.
     *
     * @see http://developer.github.com/v3/repos/statuses/#create-a-status
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $sha
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $sha, array $parameters)
    {
        if (!isset($parameters['state'])) {
            throw new MalformedRequestException('State is required');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/statuses/' . urlencode($sha),
            $parameters
        );
    }
}
