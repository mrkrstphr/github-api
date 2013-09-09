<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Comments
 *
 * @see http://developer.github.com/v3/repos/comments/
 * @package Martha\GitHub\Request\Repositories
 */
class Comments extends AbstractRequest
{
    /**
     * Get all commit comments on a given repository.
     *
     * @see http://developer.github.com/v3/repos/comments/#list-commit-comments-for-a-repository
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function comments($owner, $repo)
    {
        return $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/comments');
    }

    /**
     * Get all comments on a specific commit in a given repository.
     *
     * @see http://developer.github.com/v3/repos/comments/#list-comments-for-a-single-commit
     * @param string $owner
     * @param string $repo
     * @param string $sha
     * @return array
     */
    public function commitComments($owner, $repo, $sha)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/commits/' . urlencode($sha) . '/comments'
        );
    }

    /**
     * Creates a comment on a specific commit in a given repository.
     *
     * @see http://developer.github.com/v3/repos/comments/#create-a-commit-comment
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $sha
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $sha, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required when creating a comment');
        }

        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/commits/' . urlencode($sha) . '/comments',
            $parameters
        );
    }

    /**
     * Get a specific comment on a given repository.
     *
     * @see http://developer.github.com/v3/repos/comments/#get-a-single-commit-comment
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function get($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/comments/' . urlencode($id)
        );
    }

    /**
     * Updates a specific comment on a given repository.
     *
     * @see http://developer.github.com/v3/repos/comments/#update-a-commit-comment
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $id, array $parameters)
    {
        if (!isset($parameters['body'])) {
            throw new MalformedRequestException('Body is required when creating a comment');
        }

        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/comments/' . urlencode($id),
            $parameters
        );
    }

    /**
     * Deletes a specific comment from a given repository.
     * 
     * @see http://developer.github.com/v3/repos/comments/#delete-a-commit-comment
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {
        return $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/comments/' . urlencode($id)
        );
    }
}
