<?php

namespace Martha\GitHub\Request\Organizations;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Repositories
 * @package Martha\GitHub\Request\Organizations
 */
class Repositories extends AbstractRequest
{
    /**
     * Get all repositories for the specified organization.
     *
     * @see http://developer.github.com/v3/repos/#list-organization-repositories
     * @param string $organization
     * @param array $parameters
     * @return array
     */
    public function repositories($organization, array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get('/orgs/' . urlencode($organization) . '/repos', $parameters);

        return $response;
    }

    /**
     * Creates a new repository for the specified organization.
     *
     * @see http://developer.github.com/v3/repos/#create
     * @param string $organization
     * @param array $parameters
     * @return array
     * @throws MalformedRequestException
     */
    public function create($organization, array $parameters = array())
    {
        if (!isset($parameters['name'])) {
            throw new MalformedRequestException('Name is required when creating a repository');
        }

        $response = $this->client->post('/orgs/' . urlencode($organization) . '/repos', $parameters);

        return $response;
    }
}
