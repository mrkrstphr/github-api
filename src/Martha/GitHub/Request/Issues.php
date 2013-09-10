<?php

namespace Martha\GitHub\Request;

/**
 * Class Issues
 * @package Martha\GitHub\Request
 */
class Issues extends AbstractRequest
{
    /**
     * List all issues across all the authenticated user's visible repositories including owned repositories,
     * member repositories, and organization repositories.
     *
     * @see http://developer.github.com/v3/issues/#list-issues
     * @param array $parameters
     * @return array
     */
    public function issues(array $parameters = array())
    {
        return $this->client->get('/issues', $parameters);
    }
}
