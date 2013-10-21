<?php

namespace Martha\GitHub\Request;

/**
 * Class Me
 *
 * @see http://developer.github.com/v3/users/
 * @package Martha\GitHub\Request
 */
class Me extends AbstractRequest
{
    /**
     * Gets the authenticated user.
     *
     * @see http://developer.github.com/v3/users/#get-the-authenticated-user
     * @return array
     */
    public function user()
    {
        return $this->getClient()->get('/user');
    }

    /**
     * List emails for the authenticated user.
     *
     * @return array
     */
    public function emails()
    {
        return $this->client->get('/user/emails');
    }

    /**
     * List public and private organizations for the authenticated user.
     *
     * @return array
     */
    public function organizations()
    {
        return $this->client->get('/user/orgs');
    }

    /**
     * Get all repositories for the current authenticated user.
     *
     * @see http://developer.github.com/v3/repos/#list-your-repositories
     * @param array $parameters
     * @return array
     */
    public function repositories(array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get('/user/repos', $parameters);

        return $response;
    }

    /**
     * Updates the authenticated user.
     *
     * @see http://developer.github.com/v3/users/#update-the-authenticated-user
     * @param array $parameters
     * @return array
     */
    public function update(array $parameters)
    {
        return $this->getClient()->post('/user', $parameters);
    }

    /**
     * List issues for a repository.
     *
     * @see http://developer.github.com/v3/issues/#list-issues
     * @param array $parameters
     * @return array
     */
    public function issues(array $parameters = array())
    {
        return $this->client->get('/user/issues', $parameters);
    }
}
