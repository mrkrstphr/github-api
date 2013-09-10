<?php

namespace Martha\GitHub\Request;

/**
 * Class Users
 * @package Martha\GitHub\Request
 */
class Users extends AbstractRequest
{
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
     * If user is supplied, list all public organizations for that user. Otherwise list all public and private
     * organizations for the authenticated user.
     *
     * @see http://developer.github.com/v3/orgs/#list-user-organizations
     * @param string $user
     * @return array
     */
    public function organizations($user = '')
    {
        $url = isset($user) ? '/users/' . urlencode($user) . '/orgs' : '/user/orgs';

        return $this->client->get($url);
    }

    /**
     * Returns an instance of the Users\Emails API request end point.
     *
     * @return Users\Emails
     */
    public function emails()
    {
        return new Users\Emails($this->getClient());
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
