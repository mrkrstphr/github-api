<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Contents
 *
 * @see http://developer.github.com/v3/repos/contents/
 * @package Martha\GitHub\Request\Repositories
 */
class Contents extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/contents/#get-the-readme
     * @param string $owner
     * @param string $repo
     * @param array $parameters
     * @return array
     */
    public function readme($owner, $repo, array $parameters = array())
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/readme',
            $parameters
        );
    }

    /**
     * @see http://developer.github.com/v3/repos/contents/#get-contents
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function contents($owner, $repo, $path, array $parameters = array())
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/contents/' . urlencode($path),
            $parameters
        );
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/contents/#create-a-file
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $path, array $parameters)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/contents/#update-a-file
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $path, array $parameters)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/contents/#delete-a-file
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function delete($owner, $repo, $path, array $parameters)
    {
        return array();
    }

    /**
     * @todo
     * @see http://developer.github.com/v3/repos/contents/#get-archive-link
     * @param string $owner
     * @param string $repo
     * @param string $format
     * @param string $ref
     * @param array $parameters
     * @return string
     */
    public function archive($owner, $repo, $format, $ref, array $parameters = array())
    {
        return '';
    }
}
