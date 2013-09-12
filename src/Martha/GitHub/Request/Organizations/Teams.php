<?php

namespace Martha\GitHub\Request\Organizations;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Teams
 *
 * @see http://developer.github.com/v3/orgs/teams/
 * @package Martha\GitHub\Request\Organizations
 */
class Teams extends AbstractRequest
{
    /**
     * List teams.
     *
     * @see http://developer.github.com/v3/orgs/teams/#list-teams
     * @param string $organization
     * @return array
     */
    public function teams($organization)
    {
        return $this->getClient()->get('/orgs/' . urlencode($organization) . '/teams');
    }

    /**
     * Create a team.
     *
     * @see http://developer.github.com/v3/orgs/teams/#create-team
     * @throws MalformedRequestException
     * @param $organization
     * @param array $parameters
     * @return array
     */
    public function create($organization, array $parameters)
    {
        if (!isset($parameters['name'])) {
            throw new MalformedRequestException('Name is required to create a team');
        }

        return $this->getClient()->post('/orgs/' . urlencode($organization) . '/teams', $parameters);
    }
}
