<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

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
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#list-all-labels-for-this-repository
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function labels($owner, $repo)
    {
        return array();
    }

    /**
     * Get a single label.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#get-a-single-label
     * @param string $owner
     * @param string $repo
     * @param string $name
     * @return array
     */
    public function label($owner, $repo, $name)
    {
        return array();
    }

    /**
     * Create a label.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#create-a-label
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        return array();
    }

    /**
     * Update a label.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#update-a-label
     * @param string $owner
     * @param string $repo
     * @param string $name
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $name, array $parameters)
    {
        return array();
    }

    /**
     * Delete a label.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#delete-a-label
     * @param string $owner
     * @param string $repo
     * @param string $name
     */
    public function delete($owner, $repo, $name)
    {

    }
}
