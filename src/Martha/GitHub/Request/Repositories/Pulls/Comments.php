<?php

namespace Martha\GitHub\Request\Repositories\Pulls;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Comments
 * @package Martha\GitHub\Request\Repositories\Pulls
 */
class Comments extends AbstractRequest
{
    /**
     * If $number is provided, list comments on that pull request, otherwise list comments on all pulls in the
     * given repository.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/comments/#list-comments-on-a-pull-request
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function comments($owner, $repo, $number = '')
    {
        return array();
    }

    /**
     * Get a single comment.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/comments/#get-a-single-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function comment($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Create a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/comments/#create-a-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function create($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Edit a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/comments/#edit-a-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function update($owner, $repo, $number)
    {
        return array();
    }

    /**
     * Delete a comment.
     *
     * @todo
     * @see http://developer.github.com/v3/pulls/comments/#edit-a-comment
     * @param string $owner
     * @param string $repo
     * @param string $number
     */
    public function delete($owner, $repo, $number)
    {
    }
}
