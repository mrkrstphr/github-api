<?php

namespace Martha\GitHub\Request\Repositories\Pulls;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Comments
 *
 * @see http://developer.github.com/v3/pulls/comments/
 * @package Martha\GitHub\Request\Repositories\Pulls
 */
class Comments extends AbstractRequest
{
    /**
     * If $number is provided, list comments on that pull request, otherwise list comments on all pulls in the
     * given repository.
     *
     * @see http://developer.github.com/v3/pulls/comments/#list-comments-on-a-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function comments($owner, $repo, $number = '')
    {
        $url = '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls' .
            ($number ? '/' . urlencode($number) : '') . '/comments';

        return $this->getClient()->get($url);
    }

    /**
     * Get a single comment.
     *
     * @see http://developer.github.com/v3/pulls/comments/#get-a-single-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function comment($owner, $repo, $number)
    {
        return $this->getClient()->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/comments/' . urlencode($number)
        );
    }

    /**
     * Create a comment.
     *
     * @see http://developer.github.com/v3/pulls/comments/#create-a-comment
     * @throw MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $number, array $parameters)
    {
        $require = array('body', 'commit_id', 'path', 'position');

        foreach ($require as $required) {
            if (!isset($parameters[$required])) {
                throw new MalformedRequestException($required . ' is required to create a pull request comment');
            }
        }

        return $this->getClient()->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/' . urlencode($number) . '/comments',
            $parameters
        );
    }

    /**
     * Edit a comment.
     *
     * @see http://developer.github.com/v3/pulls/comments/#edit-a-comment
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $number, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required to update a comment');
        }

        return $this->getClient()->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/comments/' . urlencode($number),
            $parameters
        );
    }

    /**
     * Delete a comment.
     *
     * @see http://developer.github.com/v3/pulls/comments/#edit-a-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     */
    public function delete($owner, $repo, $number)
    {
        $this->getClient()->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/pulls/comments/' . urlencode($number)
        );
    }
}
