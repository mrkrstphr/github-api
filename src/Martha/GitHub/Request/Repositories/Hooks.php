<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Hooks
 *
 * @see http://developer.github.com/v3/repos/hooks/
 * @package Martha\GitHub\Request\Repositories
 */
class Hooks extends AbstractRequest
{
    /**
     * Get all hooks for a given repository.
     *
     * @see http://developer.github.com/v3/repos/hooks/#list
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function hooks($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks'
        );
    }

    /**
     * Get information about a specific hook for a given repository.
     *
     * @see http://developer.github.com/v3/repos/hooks/#get-single-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function hook($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks/' . urlencode($id)
        );
    }

    /**
     * Create hook events for a given repository. A parameter of name and config is required. See the GitHub
     * documentation for more information.
     *
     * @see http://developer.github.com/v3/repos/hooks/#create-a-hook
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks',
            $parameters
        );
    }

    /**
     * Edit information about the hook events for a given repository.
     *
     * @see http://developer.github.com/v3/repos/hooks/#edit-a-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @param array $parameters
     * @return array
     */
    public function edit($owner, $repo, $id, array $parameters)
    {
        return $this->client->patch(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks/' . urlencode($id),
            $parameters
        );
    }

    /**
     * Send a test hook for the given repository.
     *
     * @see http://developer.github.com/v3/repos/hooks/#test-a-push-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function test($owner, $repo, $id)
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks/' . urlencode($id) . '/tests'
        );
    }

    /**
     * Deletes the specified hook events from a given repository.
     * 
     * @see http://developer.github.com/v3/repos/hooks/#delete-a-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {
        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/hooks/' . urlencode($id)
        );
    }
}
