<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class PullRequests
 *
 * @see http://developer.github.com/v3/pulls/
 * @package Martha\GitHub\Request
 */
class Pulls extends AbstractRequest
{
    /**
     * List pull requests.
     *
     * @see http://developer.github.com/v3/pulls/#list-pull-requests
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function pulls($owner, $repo, array $parameters = array())
    {
        return $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo),
            $parameters
        );
    }

    /**
     * Get a single pull request.
     *
     * @see http://developer.github.com/v3/pulls/#get-a-single-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function pull($owner, $repo, $number)
    {
        return $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number)
        );
    }

    /**
     * Create a pull request.
     *
     * @see http://developer.github.com/v3/pulls/#create-a-pull-request
     * @throws MalformedRequestException
     * @param $owner
     * @param $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        if (!isset($parameters['title'])) {
            throw new MalformedRequestException('Title is required to create a pull request');
        }

        if (!isset($parameters['base']) || !isset($parameters['head'])) {
            throw new MalformedRequestException('Base and Head are required to create a pull request');
        }

        return $this->getClient()->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls',
            $parameters
        );
    }

    /**
     * Update a pull request.
     *
     * @see http://developer.github.com/v3/pulls/#update-a-pull-request
     * @param $owner
     * @param $repo
     * @param $number
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $number, array $parameters)
    {
        return $this->getClient()->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number),
            $parameters
        );
    }

    /**
     * List commits on a pull request.
     *
     * @see http://developer.github.com/v3/pulls/#list-commits-on-a-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function commits($owner, $repo, $number)
    {
        return $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number) . '/commits'
        );
    }

    /**
     * List pull request files
     *
     * @see http://developer.github.com/v3/pulls/#list-pull-requests-files
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function files($owner, $repo, $number)
    {
        return $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number) . '/files'
        );
    }

    /**
     * Get if a pull request has been merged
     *
     * @see http://developer.github.com/v3/pulls/#get-if-a-pull-request-has-been-merged
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return boolean
     */
    public function wasMerged($owner, $repo, $number)
    {
        $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number) . '/merge'
        );

        $response = $this->getClient()->getLastResponse();

        return $response->getStatusCode() == '204';
    }

    /**
     * Merge a pull request.
     *
     * @see http://developer.github.com/v3/pulls/#merge-a-pull-request-merge-buttontrade
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function merge($owner, $repo, $number, array $parameters = array())
    {
        return $this->getClient()->put(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number) . '/merge',
            $parameters
        );
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
