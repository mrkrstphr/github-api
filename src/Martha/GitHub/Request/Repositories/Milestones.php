<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Milestones
 * @package Martha\GitHub\Request\Repositories
 */
class Milestones extends AbstractRequest
{
    /**
     * List Milestones for a repository.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/milestones/#list-milestones-for-a-repository
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function milestones($owner, $repo, array $parameters = array())
    {
        return array();
    }

    /**
     * Get a single milestone.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/milestones/#get-a-single-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function milestone($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Create a milestone
     *
     * @todo
     * @see http://developer.github.com/v3/issues/milestones/#create-a-milestone
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
     * Update a milestone.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/milestones/#update-a-milestone
     * @param $owner
     * @param $repo
     * @param $number
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $number, array $parameters)
    {
        return array();
    }

    /**
     * Delete a milestone.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/milestones/#delete-a-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     */
    public function delete($owner, $repo, $number)
    {

    }

    /**
     * Get labels for every issue in a milestone.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#get-labels-for-every-issue-in-a-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function labels($owner, $repo, $number)
    {
        return array();
    }
}
