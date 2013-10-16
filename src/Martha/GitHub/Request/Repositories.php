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
     * Get all public GitHub repositories.
     *
     * @see http://developer.github.com/v3/repos/#list-all-public-repositories
     * @param array $parameters
     * @return array
     */
    public function repositories(array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get('/repositories', $parameters);

        return $response;
    }

    /**
     * Get information about a specific GitHub repository.
     *
     * @see http://developer.github.com/v3/repos/#get
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function repository($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo));

        return $response;
    }

    /**
     * Creates a new repository for the authenticated user.
     *
     * @see http://developer.github.com/v3/repos/#create
     * @throws MalformedRequestException
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters)
    {
        if (!isset($parameters['name'])) {
            throw new MalformedRequestException('Name is required when creating a repository');
        }

        $response = $this->client->post('/user/repos', $parameters);

        return $response;
    }

    /**
     * Updates a repository.
     *
     * @see http://developer.github.com/v3/repos/#edit
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, array $parameters = array())
    {
        if (!isset($parameters['name'])) {
            throw new MalformedRequestException('Name is required when creating a repository');
        }

        $response = $this->client->patch('/repos/' . urlencode($owner) . '/' . urlencode($repo), $parameters);

        return $response;
    }

    /**
     * Get contributors of a repository.
     *
     * @see http://developer.github.com/v3/repos/#list-contributors
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function contributors($owner, $repo, array $parameters = array())
    {
        $defaults = array('page' => 1);
        $parameters = array_merge($defaults, $parameters);

        $response = $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/contributors',
            $parameters
        );

        return $response;
    }

    /**
     * Return the Issues API endpoint.
     *
     * @return Repositories\Issues
     */
    public function issues()
    {
        return new Repositories\Issues($this->getClient());
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-languages
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function languages($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/languages');
        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-teams
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function teams($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/teams');
        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-tags
     * @param string $owner
     * @param string $repo)
     * @return array
     */
    public function tags($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/tags');
        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#list-branches
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function branches($owner, $repo)
    {
        $response = $this->client->get('/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/branches');
        return $response;
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
        $response = $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/branches/' . urlencode($branch)
        );
        return $response;
    }

    /**
     * @see http://developer.github.com/v3/repos/#delete-a-repository
     * @param string $owner
     * @param string $repo
     */
    public function delete($owner, $repo)
    {
        $this->client->delete('/repos/' . urlencode($owner) . '/' . urlencode($repo));
    }

    /**
     * Return the Collaborators API endpoint.
     *
     * @return Repositories\Collaborators
     */
    public function collaborators()
    {
        return new Repositories\Collaborators($this->getClient());
    }

    /**
     * Return the Comments API endpoint.
     *
     * @return Repositories\Comments
     */
    public function comments()
    {
        return new Repositories\Comments($this->getClient());
    }

    /**
     * Return the Commits API endpoint.
     *
     * @return Repositories\Commits
     */
    public function commits()
    {
        return new Repositories\Commits($this->getClient());
    }

    /**
     * Return the Contents API endpoint.
     *
     * @return Repositories\Contents
     */
    public function contents()
    {
        return new Repositories\Contents($this->getClient());
    }

    /**
     * Return the Downloads API endpoint.
     *
     * @return Repositories\Downloads
     */
    public function downloads()
    {
        return new Repositories\Downloads($this->getClient());
    }

    /**
     * Return the Forks API endpoint.
     *
     * @return Repositories\Forks
     */
    public function forks()
    {
        return new Repositories\Forks($this->getClient());
    }

    /**
     * Return the Hooks API endpoint.
     *
     * @return Repositories\Hooks
     */
    public function hooks()
    {
        return new Repositories\Hooks($this->getClient());
    }

    /**
     * Return the Keys API endpoint.
     *
     * @return Repositories\Keys
     */
    public function keys()
    {
        return new Repositories\Keys($this->getClient());
    }

    /**
     * Return the Merges API endpoint.
     *
     * @return Repositories\Merges
     */
    public function merges()
    {
        return new Repositories\Merges($this->getClient());
    }

    /**
     * Return the Milestones API endpoint.
     *
     * @return Repositories\Milestones
     */
    public function milestones()
    {
        return new Repositories\Milestones($this->getClient());
    }

    /**
     * Return the Pull Requests API endpoint.
     *
     * @return Repositories\Pulls
     */
    public function pulls()
    {
        return new Repositories\Pulls($this->getClient());
    }

    /**
     * Return the Stats API endpoint.
     *
     * @return Repositories\Stats
     */
    public function stats()
    {
        return new Repositories\Stats($this->getClient());
    }

    /**
     * Return the Statuses API endpoint.
     *
     * @return Repositories\Statuses
     */
    public function statuses()
    {
        return new Repositories\Statuses($this->getClient());
    }
}
