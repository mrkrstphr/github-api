<?php

namespace Martha\GitHub\Request;

/**
 * Class Organizations
 *
 * @see http://developer.github.com/v3/orgs/
 * @package Martha\GitHub\Request
 */
class Organizations extends AbstractRequest
{
    /**
     * Get an organization.
     *
     * @see http://developer.github.com/v3/orgs/#get-an-organization
     * @param string $organization
     * @return array
     */
    public function organization($organization)
    {
        return $this->client->get('/orgs/' . urlencode($organization));
    }

    /**
     * Edit an organization.
     *
     * @see http://developer.github.com/v3/orgs/#edit-an-organization
     * @param string $organization
     * @param array $parameters
     * @return array
     */
    public function edit($organization, array $parameters)
    {
        return $this->client->patch('/orgs/' . urlencode($organization), $parameters);
    }

    /**
     * Returns an instance of the Organizations\Members API request end point.
     *
     * @see http://developer.github.com/v3/orgs/members/
     * @return Organizations\Members
     */
    public function members()
    {
        return new Organizations\Members($this->getClient());
    }

    /**
     * Returns an instance of the Organizations\Teams API request end point.
     *
     * @see http://developer.github.com/v3/orgs/teams/
     * @return Organizations\Teams
     */
    public function teams()
    {
        return new Organizations\Teams($this->getClient());
    }
}
