<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Collaborators
 *
 * @see http://developer.github.com/v3/repos/collaborators/
 * @package Martha\GitHub\Request\Repositories
 */
class Collaborators extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/collaborators/#list
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function collaborators($owner, $repo)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/collaborators/#get
     * @param string $owner
     * @param string $repo
     * @param string $user
     * @return array
     */
    public function get($owner, $repo, $user)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/collaborators/#add-collaborator
     * @param string $owner
     * @param string $repo
     * @param string $user
     * @return array
     */
    public function add($owner, $repo, $user)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/collaborators/#remove-collaborator
     * @param string $owner
     * @param string $repo
     * @param string $user
     */
    public function remove($owner, $repo, $user)
    {
    }
}
