<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Commits
 *
 * @see http://developer.github.com/v3/repos/commits/
 * @package Martha\GitHub\Request\Repositories
 */
class Commits extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/commits/#list-commits-on-a-repository
     * @param string $user
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function commits($user, $repo, array $parameters = array())
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/commits/#get-a-single-commit
     * @param string $user
     * @param string $repo
     * @param $sha
     * @return array
     */
    public function commit($user, $repo, $sha)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/commits/#compare-two-commits
     * @param string $user
     * @param string $repo
     * @param string $base
     * @param string $head
     * @return array
     */
    public function compare($user, $repo, $base, $head)
    {
        return array();
    }
}
