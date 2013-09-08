<?php

namespace Martha\GitHub\Request;

/**
 * Class Repositories
 *
 * @see http://developer.github.com/v3/repos/
 * @package Martha\GitHub\Request
 */
class Repositories extends AbstractRequest
{
    /**
     * Get all repositories for the current authenticated user.
     *
     * @see http://developer.github.com/v3/repos/#list-your-repositories
     * @param array $parameters
     * @return array
     */
    public function me(array $parameters = array())
    {
        return array();
    }

    /**
     * Get all repositories for the specified user.
     *
     * @see http://developer.github.com/v3/repos/#list-user-repositories
     * @param string $user
     * @param array $parameters
     * @return array
     */
    public function user($user, array $parameters = array())
    {
        return [];
    }

    /**
     * Get all repositories for the specified organization.
     *
     * @see http://developer.github.com/v3/repos/#list-organization-repositories
     * @param string $organization
     * @param array $parameters
     * @return array
     */
    public function organization($organization, array $parameters = array())
    {
        return [];
    }

    /**
     * Get all public GitHub repositories.
     *
     * @see http://developer.github.com/v3/repos/#list-all-public-repositories
     * @param array $parameters
     * @return array
     */
    public function all(array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get('/repositories', $parameters);

        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#create
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters = array())
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#create
     * @param string $organization
     * @param array $parameters
     * @return array
     */
    public function createOrg($organization, array $parameters = array())
    {
        return [];
    }

    /**
     * Get information about a specific GitHub repository.
     *
     * @see http://developer.github.com/v3/repos/#get
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function get($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo));

        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#edit
     * @param $owner
     * @param $repo
     * @param array $parameters
     * @return array
     */
    public function edit($owner, $repo, array $parameters = array())
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-contributors
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function contributors($owner, $repo, array $parameters = array())
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-languages
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function languages($owner, $repo)
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-teams
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function teams($owner, $repo)
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-tags
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function tags($owner, $repo)
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-branches
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function branches($owner, $repo)
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#get-branch
     * @param string $owner
     * @param string $repo
     * @param string $branch
     * @return array
     */
    public function branch($owner, $repo, $branch)
    {
        return [];
    }

    /**
     * @see http://developer.github.com/v3/repos/#delete-a-repository
     * @param string $owner
     * @param string $repo
     */
    public function delete($owner, $repo)
    {

    }
}
