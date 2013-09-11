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
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#members-list
     * @return array
     */
    public function members()
    {
        return array();
    }

    /**
     * Check if a user is, publicly or privately, a member of the organization.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#check-membership
     * @param string $organization
     * @param string $user
     * @return bool
     */
    public function isMember($organization, $user)
    {
        return false;
    }

    /**
     * Remove a member from an organization.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#remove-a-member
     * @param string $organization
     * @param string $user
     */
    public function remove($organization, $user)
    {
    }

    /**
     * Public members list.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#public-members-list
     * @param string $organization
     * @return array
     */
    public function publicMembers($organization)
    {
        return array();
    }

    /**
     * Check public membership.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#check-public-membership
     * @param string $organization
     * @param string $user
     * @return bool
     */
    public function isPublicMember($organization, $user)
    {
        return false;
    }

    /**
     * Publicize a user's membership.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#publicize-a-users-membership
     * @param string $organization
     * @param string $user
     */
    public function publicize($organization, $user)
    {
    }

    /**
     * Conceal a user's membership.
     *
     * @todo
     * @see http://developer.github.com/v3/orgs/members/#conceal-a-users-membership
     * @param string $organization
     * @param string $user
     */
    public function conceal($organization, $user)
    {
    }
}
