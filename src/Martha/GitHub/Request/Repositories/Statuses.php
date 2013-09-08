<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Statuses
 *
 * @see http://developer.github.com/v3/repos/statuses/
 * @package Martha\GitHub\Request\Repositories
 */
class Statuses extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/statuses/#list-statuses-for-a-specific-ref
     * @param string $owner
     * @param string $repo
     * @param string $ref
     * @return array
     */
    public function statuses($owner, $repo, $ref)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/statuses/#create-a-status
     * @param string $owner
     * @param string $repo
     * @param string $sha
     * @return array
     */
    public function create($owner, $repo, $sha)
    {
        return array();
    }
}
