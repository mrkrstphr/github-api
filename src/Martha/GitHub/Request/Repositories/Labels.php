<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Labels
 *
 * @see http://developer.github.com/v3/issues/labels/
 * @package Martha\GitHub\Request\Repositories
 */
class Labels extends AbstractRequest
{
    /**
     * List all labels for this repository.
     *
     * @see http://developer.github.com/v3/issues/labels/#list-all-labels-for-this-repository
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function labels($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/labels'
        );
    }

    /**
     * Get a single label.
     *
     * @see http://developer.github.com/v3/issues/labels/#get-a-single-label
     * @param string $owner
     * @param string $repo
     * @param string $name
     * @return array
     */
    public function label($owner, $repo, $name)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/labels/' . urlencode($name)
        );
    }

    /**
     * Create a label.
     *
     * @see http://developer.github.com/v3/issues/labels/#create-a-label
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        if (!isset($parameters['name']) || !isset($parameters['color'])) {
            throw new MalformedRequestException('Name and Color are required to create a label');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/labels',
            $parameters
        );
    }

    /**
     * Update a label.
     *
     * @see http://developer.github.com/v3/issues/labels/#update-a-label
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $name, array $parameters)
    {
        if (!isset($parameters['name']) || !isset($parameters['color'])) {
            throw new MalformedRequestException('Name and Color are required to update a label');
        }

        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/labels/' . urlencode($name),
            $parameters
        );
    }

    /**
     * Delete a label.
     *
     * @see http://developer.github.com/v3/issues/labels/#delete-a-label
     * @param string $owner
     * @param string $repo
     * @param string $name
     */
    public function delete($owner, $repo, $name)
    {
        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/labels/' . urlencode($name)
        );
    }
}
