<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Comments
 *
 * @see http://developer.github.com/v3/repos/comments/
 * @package Martha\GitHub\Request\Repositories
 */
class Comments extends AbstractRequest
{
    /**
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
     * @todo
     * @see http://developer.github.com/v3/repos/comments/#create-a-commit-comment
     * @param string $user
     * @param string $repo
     * @param string $sha
     * @param array $parameters
     * @return array
     */
    public function create($user, $repo, $sha, array $parameters)
    {
        return array();
    }

    /**
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
     * @todo
     * @see http://developer.github.com/v3/repos/comments/#update-a-commit-comment
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $id, array $parameters)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/comments/#delete-a-commit-comment
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {

    }
}
