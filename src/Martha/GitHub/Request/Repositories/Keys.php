<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Keys
 *
 * @see http://developer.github.com/v3/repos/keys/
 * @package Martha\GitHub\Request\Repositories
 */
class Keys extends AbstractRequest
{
    /**
     * Get all keys for the given repository.
     *
     * @see http://developer.github.com/v3/repos/keys/#list
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function keys($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys'
        );
    }

    /**
     * Get information about a specific key of a given repository.
     *
     * @see http://developer.github.com/v3/repos/keys/#get
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function key($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys/' . urlencode($id)
        );
    }

    /**
     * Create a key for a given repository.
     *
     * @see http://developer.github.com/v3/repos/keys/#create
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys',
            $parameters
        );
    }

    /**
     * Edit a key for a given repository.
     *
     * @see http://developer.github.com/v3/repos/keys/#edit
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function edit($owner, $repo, $id, array $parameters)
    {
        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys/' . urlencode($id),
            $parameters
        );
    }

    /**
     * Delete a key for a given repository.
     *
     * @see http://developer.github.com/v3/repos/keys/#delete
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {
        return $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys/' . urlencode($id)
        );
    }
}
