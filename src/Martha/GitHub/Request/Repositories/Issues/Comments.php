<?php

namespace Martha\GitHub\Request\Repositories\Issues;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Comments
 *
 * @see http://developer.github.com/v3/issues/comments/
 * @package Martha\GitHub\Request\Repositories\Issues
 */
class Comments extends AbstractRequest
{
    /**
     * If $number is provided, list comments on an issue, otherwise list comments in a repository.
     *
     * @see http://developer.github.com/v3/issues/comments/#list-comments-on-an-issue
     * @see http://developer.github.com/v3/issues/comments/#list-comments-in-a-repository
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function comments($owner, $repo, $number = '', array $parameters = array())
    {
        $url = '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues' .
            (!empty($number) ? '/' . urlencode($number) : '') . '/comments';

        return $this->client->get($url, $parameters);
    }

    /**
     * Get a single comment.
     *
     * @see http://developer.github.com/v3/issues/comments/#get-a-single-comment
     * @param string $owner
     * @param string $repo
     * @param int $id
     * @return array
     */
    public function comment($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/comments/' . urlencode($id)
        );
    }

    /**
     * Create a comment.
     *
     * @see http://developer.github.com/v3/issues/comments/#create-a-comment
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $number, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required to create a comment');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number) . '/comments',
            $parameters
        );
    }

    /**
     * Edit a comment.
     *
     * @see http://developer.github.com/v3/issues/comments/#edit-a-comment
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param int $id
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $id, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required to create a comment');
        }

        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/comments/' . urlencode($id),
            $parameters
        );
    }

    /**
     * Delete a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/comments/#delete-a-comment
     * @param string $owner
     * @param string $repo
     * @param int $id
     */
    public function delete($owner, $repo, $id)
    {
        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/comments/' . urlencode($id)
        );
    }
}
