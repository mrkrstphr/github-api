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
     * @todo
     * @see http://developer.github.com/v3/repos/hooks/#create-a-hook
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function create($owner, $repo)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/hooks/#edit-a-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function edit($owner, $repo, $id)
    {
        return array();
    }

    /**
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
     * @todo
     * @see http://developer.github.com/v3/repos/hooks/#delete-a-hook
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function delete($owner, $repo, $id)
    {
        return array();
    }
}
