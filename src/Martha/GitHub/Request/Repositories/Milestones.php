<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Milestones
 *
 * @see http://developer.github.com/v3/issues/milestones/
 * @package Martha\GitHub\Request\Repositories
 */
class Milestones extends AbstractRequest
{
    /**
     * List Milestones for a repository.
     *
     * @see http://developer.github.com/v3/issues/milestones/#list-milestones-for-a-repository
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function milestones($owner, $repo, array $parameters = array())
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones',
            $parameters
        );
    }

    /**
     * Get a single milestone.
     *
     * @see http://developer.github.com/v3/issues/milestones/#get-a-single-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function milestone($owner, $repo, $number)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones/' . urlencode($number)
        );
    }

    /**
     * Create a milestone
     *
     * @see http://developer.github.com/v3/issues/milestones/#create-a-milestone
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        if (isset($parameters['title'])) {
            throw new MalformedRequestException('Title is required to create a milestone');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones',
            $parameters
        );
    }

    /**
     * Update a milestone.
     *
     * @see http://developer.github.com/v3/issues/milestones/#update-a-milestone
     * @param $owner
     * @param $repo
     * @param $number
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $number, array $parameters)
    {
        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones/' . urlencode($number),
            $parameters
        );
    }

    /**
     * Delete a milestone.
     *
     * @see http://developer.github.com/v3/issues/milestones/#delete-a-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     */
    public function delete($owner, $repo, $number)
    {
        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones/' . urlencode($number)
        );
    }

    /**
     * Get labels for every issue in a milestone.
     *
     * @see http://developer.github.com/v3/issues/labels/#get-labels-for-every-issue-in-a-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function labels($owner, $repo, $number)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/milestones/' . urlencode($number) . '/labels'
        );
    }
}
