<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Downloads
 *
 * @see http://developer.github.com/v3/repos/downloads/
 * @package Martha\GitHub\Request\Repositories
 */
class Downloads extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/downloads/#list-downloads-for-a-repository
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function downloads($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/downloads'
        );
    }

    /**
     * @see http://developer.github.com/v3/repos/downloads/#get-a-single-download
     * @param string $owner
     * @param string $repo
     * @param string $id
     * @return array
     */
    public function download($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/downloads/' . urlencode($id)
        );
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/downloads/#create-a-new-download-part-1-create-the-resource
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, array $parameters)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/downloads/#delete-a-download
     * @param string $owner
     * @param string $repo
     * @param string $id
     */
    public function delete($owner, $repo, $id)
    {

    }
}
