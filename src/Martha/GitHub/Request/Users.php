<?php

namespace Martha\GitHub\Request;

/**
 * Class Users
 *
 * @see http://developer.github.com/v3/users/
 * @package Martha\GitHub\Request
 */
class Users extends AbstractRequest
{
    /**
     * Get all users.
     *
     * @todo
     * @see http://developer.github.com/v3/users/#get-all-users
     * @param array $parameters
     * @return array
     */
    public function users(array $parameters = array())
    {
        return array();
    }

    /**
     * Gets a single user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/#get-a-single-user
     * @param string $user
     * @return array
     */
    public function user($user)
    {
        return array();
    }

    /**
     * Gets all gists for a given user.
     *
     * @see http://developer.github.com/v3/gists/#list-gists
     * @param string $user
     * @param array $parameters
     * @return array
     */
    public function gists($user, array $parameters = array())
    {
        return $this->client->get('/users/' . urlencode($user) . '/repos', $parameters);
    }

    /**
     * List all public organizations for a user.
     *
     * @see http://developer.github.com/v3/orgs/#list-user-organizations
     * @param string $user
     * @return array
     */
    public function organizations($user = '')
    {
        return $this->client->get('/users/' . urlencode($user) . '/orgs');
    }

    /**
     * Returns an instance of the Users\Followers API request end point.
     *
     * @return Users\Followers
     */
    public function followers()
    {
        return new Users\Followers($this->getClient());
    }

    /**
     * Returns an instance of the Users\Keys API request end point.
     *
     * @return Users\Keys
     */
    public function keys()
    {
        return new Users\Keys($this->getClient());
    }
}
