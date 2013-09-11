<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class PullRequests
 * @package Martha\GitHub\Request
 */
class Pulls extends AbstractRequest
{
    /**
     * List pull requests.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#list-pull-requests
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function pulls($owner, $repo, array $parameters = array())
    {
        return array();
    }

    /**
     * Get a single pull request.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#get-a-single-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function pull($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Create a pull request.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#create-a-pull-request
     * @param $owner
     * @param $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        return array();
    }

    /**
     * Update a pull request.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#update-a-pull-request
     * @param $owner
     * @param $repo
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, array $parameters)
    {
        return array();
    }

    /**
     * List commits on a pull request.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#list-commits-on-a-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function commits($owner, $repo, $number)
    {
        return array();
    }

    /**
     * List pull request files
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#list-pull-requests-files
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function files($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Get if a pull request has been merged
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#get-if-a-pull-request-has-been-merged
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return boolean
     */
    public function wasMerged($owner, $repo, $number)
    {
        return true;
    }

    /**
     * Merge a pull request.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/#merge-a-pull-request-merge-buttontrade
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function merge($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Returns an instance of the Pulls\Comments API request end point.
     *
     * @return Pulls\Comments
     */
    public function comments()
    {
        return new Pulls\Comments($this->getClient());
    }
}
