<?php

namespace Martha\GitHub\Request\Repositories\Issues;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Assignees
 * @package Martha\GitHub\Request\Repositories\Issues
 */
class Assignees extends AbstractRequest
{
    /**
     * This call lists all the available assignees (owner + collaborators) to which issues may be assigned.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/assignees/#list-assignees
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function assignees($owner, $repo)
    {
        return array();
    }

    /**
     * You may also check to see if a particular user is an assignee for a repository.
     *
     * @todo
     * @see http://developer.github.com/v3/issues/assignees/#check-assignee
     * @param string $owner
     * @param string $repo
     * @param string $user
     * @return bool
     */
    public function isAssigned($owner, $repo, $user)
    {
        return true;
    }
}
