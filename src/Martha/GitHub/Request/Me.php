<?php

namespace Martha\GitHub\Request;

/**
 * Class Me
 * @package Martha\GitHub\Request
 */
class Me extends AbstractRequest
{
    /**
     * Gets the authenticated user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/#get-the-authenticated-user
     * @return array
     */
    public function user()
    {
        return array();
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
     * Updates the authenticated user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/#update-the-authenticated-user
     * @param array $parameters
     * @return array
     */
    public function update(array $parameters)
    {
        return array();
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
