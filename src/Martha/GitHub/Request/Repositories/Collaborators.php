<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Collaborators
 *
 * @see http://developer.github.com/v3/repos/collaborators/
 * @package Martha\GitHub\Request\Repositories
 */
class Collaborators extends AbstractRequest
{
    /**
     * Get all collaborators for a given repository.
     *
     * @see http://developer.github.com/v3/repos/collaborators/#list
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function collaborators($owner, $repo)
    {
        return $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/collaborators');
    }

    /**
     * Get information about a collaborator for a given repository.
     *
     * @see http://developer.github.com/v3/repos/collaborators/#get
     * @param string $owner
     * @param string $repo
     * @param string $user
     * @return array
     */
    public function get($owner, $repo, $user)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/collaborators/' . urlencode($user)
        );
    }

    /**
     * Add a user as a collaborator of a given repository.
     *
     * @see http://developer.github.com/v3/repos/collaborators/#add-collaborator
     * @param string $owner
     * @param string $repo
     * @param string $user
     * @return array
     */
    public function add($owner, $repo, $user)
    {
        return $this->client->put(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/collaborators/' . urlencode($user)
        );
    }

    /**
     * Remove a user as a collaborator for a given repository.
     *
     * @see http://developer.github.com/v3/repos/collaborators/#remove-collaborator
     * @param string $owner
     * @param string $repo
     * @param string $user
     */
    public function remove($owner, $repo, $user)
    {
        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/collaborators/' . urlencode($user)
        );
    }
}
