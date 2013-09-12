<?php

namespace Martha\GitHub\Request\Gists;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Comments
 *
 * @see http://developer.github.com/v3/gists/comments/
 * @package Martha\GitHub\Request\Gists
 */
class Comments extends AbstractRequest
{
    /**
     * List comments on a gist.
     *
     * @see http://developer.github.com/v3/gists/comments/#list-comments-on-a-gist
     * @param string $id
     * @return array
     */
    public function comments($id)
    {
        return $this->getClient()->get('/gists/' . urlencode($id) . '/comments');
    }

    /**
     * Get a single comment.
     *
     * @see http://developer.github.com/v3/gists/comments/#get-a-single-comment
     * @param int $gistId
     * @param int $commentId
     * @return array
     */
    public function comment($gistId, $commentId)
    {
        return $this->getClient()->get('/gists/' . urlencode($gistId) . '/comments/' . urlencode($commentId));
    }

    /**
     * Create a comment.
     *
     * @see http://developer.github.com/v3/gists/comments/#create-a-comment
     * @throws MalformedRequestException
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function create($id, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required to create a gist comment');
        }

        return $this->getClient()->post('/gists/' . urlencode($id) . '/comments', $parameters);
    }

    /**
     * Edit a comment.
     *
     * @see http://developer.github.com/v3/gists/comments/#edit-a-comment
     * @param int $gistId
     * @param int $commentId
     * @param array $parameters
     * @return array
     */
    public function update($gistId, $commentId, array $parameters)
    {
        return $this->getClient()->patch(
            '/gists/' . urlencode($gistId) . '/comments/' . urlencode($commentId),
            $parameters
        );
    }

    /**
     * Delete a comment.
     *
     * @see http://developer.github.com/v3/gists/comments/#delete-a-comment
     * @param int $gistId
     * @param int $commentId
     */
    public function delete($gistId, $commentId)
    {
        $this->getClient()->delete(
            '/gists/' . urlencode($gistId) . '/comments/' . urlencode($commentId)
        );
    }
}
