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
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function commits($owner, $repo, array $parameters = array())
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/commits',
            $parameters
        );
    }

    /**
     * @see http://developer.github.com/v3/repos/commits/#get-a-single-commit
     * @param string $owner
     * @param string $repo
     * @param $sha
     * @return array
     */
    public function commit($owner, $repo, $sha)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/commits/' . urlencode($sha)
        );
    }

    /**
     * @see http://developer.github.com/v3/repos/commits/#compare-two-commits
     * @param string $owner
     * @param string $repo
     * @param string $base
     * @param string $head
     * @return array
     */
    public function compare($owner, $repo, $base, $head)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/compare/' .
            urlencode($base) . '...' . urlencode($head)
        );
    }
}
