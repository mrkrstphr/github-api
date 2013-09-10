<?php

namespace Martha\GitHub\Request\Repositories\Issues;

use Martha\GitHub\Request\AbstractRequest;

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
     * @todo
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
        return array();
    }

    /**
     * Get a single comment.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/comments/#get-a-single-comment
     * @param string $owner
     * @param string $repo
     * @param int $id
     * @return array
     */
    public function comment($owner, $repo, $id)
    {
        return array();
    }

    /**
     * Create a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/comments/#create-a-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $number, array $parameters)
    {
        return array();
    }

    /**
     * Edit a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/comments/#edit-a-comment
     * @param string $owner
     * @param string $repo
     * @param int $id
     * @param array $parameters
     * @return array
     */
    public function edit($owner, $repo, $id, array $parameters)
    {
        return array();
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

    }
}
