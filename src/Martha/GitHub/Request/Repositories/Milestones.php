<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Milestones
 * @package Martha\GitHub\Request\Repositories
 */
class Milestones extends AbstractRequest
{
    /**
     * Get labels for every issue in a milestone.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/labels/#get-labels-for-every-issue-in-a-milestone
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function labels($owner, $repo, $number)
    {
        return array();
    }
}
