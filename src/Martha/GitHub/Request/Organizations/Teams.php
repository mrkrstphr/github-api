<?php

namespace Martha\GitHub\Request\Organizations;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Teams
 *
 * @see http://developer.github.com/v3/orgs/teams/
 * @package Martha\GitHub\Request\Organizations
 */
class Teams extends AbstractRequest
{
    public function teams($organization)
    {
        return array();
    }

    public function team($id)
    {
        return array();
    }

    public function create($organization, array $parameters)
    {
        return array();
    }
}
