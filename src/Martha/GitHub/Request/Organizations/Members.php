<?php

namespace Martha\GitHub\Request\Organizations;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Members
 *
 * @see http://developer.github.com/v3/orgs/members/
 * @package Martha\GitHub\Request\Organizations
 */
class Members extends AbstractRequest
{
    /**
     * List all users who are members of an organization.
     *
     * @see http://developer.github.com/v3/orgs/members/#members-list
     * @param string $organization
     * @return array
     */
    public function members($organization)
    {
        return $this->getClient()->get('/orgs/' . urlencode($organization) . '/members');
    }

    /**
     * Check if a user is, publicly or privately, a member of the organization.
     *
     * @see http://developer.github.com/v3/orgs/members/#check-membership
     * @param string $organization
     * @param string $user
     * @return bool
     */
    public function isMember($organization, $user)
    {
        $this->getClient()->get('/orgs/' . urlencode($organization) . '/members/' . urlencode($user));

        return $this->getClient()->getLastResponse()->getStatusCode() == '204';
    }

    /**
     * Remove a member from an organization.
     *
     * @see http://developer.github.com/v3/orgs/members/#remove-a-member
     * @param string $organization
     * @param string $user
     */
    public function remove($organization, $user)
    {
        $this->getClient()->delete('/orgs/' . urlencode($organization) . '/members/' . urlencode($user));
    }

    /**
     * Public members list.
     *
     * @see http://developer.github.com/v3/orgs/members/#public-members-list
     * @param string $organization
     * @return array
     */
    public function publicMembers($organization)
    {
        return $this->getClient()->get('/orgs/' . urlencode($organization) . '/public_members');
    }

    /**
     * Check public membership.
     *
     * @see http://developer.github.com/v3/orgs/members/#check-public-membership
     * @param string $organization
     * @param string $user
     * @return bool
     */
    public function isPublicMember($organization, $user)
    {
        $this->getClient()->get('/orgs/' . urlencode($organization) . '/public_members/' . urlencode($user));

        return $this->getClient()->getLastResponse()->getStatusCode() == '204';
    }

    /**
     * Publicize a user's membership.
     *
     * @see http://developer.github.com/v3/orgs/members/#publicize-a-users-membership
     * @param string $organization
     * @param string $user
     */
    public function publicize($organization, $user)
    {
        $this->getClient()->put('/orgs/' . urlencode($organization) . '/public_members/' . urlencode($user));
    }

    /**
     * Conceal a user's membership.
     *
     * @see http://developer.github.com/v3/orgs/members/#conceal-a-users-membership
     * @param string $organization
     * @param string $user
     */
    public function conceal($organization, $user)
    {
        $this->getClient()->delete('/orgs/' . urlencode($organization) . '/public_members/' . urlencode($user));
    }
}
