<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Issues
 *
 * @see http://developer.github.com/v3/issues/
 * @package Martha\GitHub\Request\Repositories
 */
class Issues extends AbstractRequest
{
    /**
     * Get a single issue.
     *
     * @see http://developer.github.com/v3/issues/#get-a-single-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function issue($owner, $repo, $number)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number)
        );
    }

    /**
     * Create an issue.
     *
     * @see http://developer.github.com/v3/issues/#create-an-issue
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        if (!isset($parameters['title'])) {
            throw new MalformedRequestException('A title is required to create an issue');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues',
            $parameters
        );
    }

    /**
     * Edit an issue.
     *
     * @see http://developer.github.com/v3/issues/#edit-an-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function edit($owner, $repo, $number, array $parameters)
    {
        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number),
            $parameters
        );
    }

    /**
     * Returns an instance of the Issues\Assignees API request end point.
     *
     * @return Issues\Assignees
     */
    public function assignees()
    {
        return new Issues\Assignees($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Comments API request end point.
     *
     * @return Issues\Comments
     */
    public function comments()
    {
        return new Issues\Comments($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Events API request end point.
     *
     * @return Issues\Events
     */
    public function events()
    {
        return new Issues\Events($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Labels API request end point.
     *
     * @return Issues\Labels
     */
    public function labels()
    {
        return new Issues\Labels($this->getClient());
    }
}
