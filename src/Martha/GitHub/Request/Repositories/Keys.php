<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Keys
 *
 * @see http://developer.github.com/v3/repos/keys/
 * @package Martha\GitHub\Request\Repositories
 */
class Keys extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/keys/#list
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function keys($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys'
        );
    }

    /**
     * @see http://developer.github.com/v3/repos/keys/#get
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function key($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/keys/' . urlencode($id)
        );
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/keys/#create
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
     * @see http://developer.github.com/v3/repos/keys/#edit
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
     * @todo
     * @see http://developer.github.com/v3/repos/keys/#delete
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {

    }
}
