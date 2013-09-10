<?php

namespace Martha\GitHub\Request;

/**
 * Class Me
 * @package Martha\GitHub\Request
 */
class Me extends AbstractRequest
{
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
