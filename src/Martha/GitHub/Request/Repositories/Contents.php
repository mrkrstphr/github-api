<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Contents
 *
 * @see http://developer.github.com/v3/repos/contents/
 * @package Martha\GitHub\Request\Repositories
 */
class Contents extends AbstractRequest
{
    /**
     * Get the preferred readme for a given repository.
     *
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
     * Get the contents of a file from a given repository.
     *
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
     * Create and commit a file. The content specified in $parameters must be base64 encoded.
     *
     * @see http://developer.github.com/v3/repos/contents/#create-a-file
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $path, array $parameters)
    {
        if (!isset($parameters['message'])) {
            throw new MalformedRequestException('A commit message is required to create a file');
        }

        if (!isset($parameters['content'])) {
            throw new MalformedRequestException('Content is required to create a file');
        }

        return $this->client->put(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/contents/' . urlencode($path),
            $parameters
        );
    }

    /**
     * Updates and commits the specified file. The content specified in $parameters must be base64 encoded.
     *
     * @see http://developer.github.com/v3/repos/contents/#update-a-file
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     * @return array
     */
    public function update($owner, $repo, $path, array $parameters)
    {
        if (!isset($parameters['message'])) {
            throw new MalformedRequestException('A commit message is required to create a file');
        }

        if (!isset($parameters['sha'])) {
            throw new MalformedRequestException('SHA hash of the file being updated is required');
        }

        if (!isset($parameters['content'])) {
            throw new MalformedRequestException('Content is required to create a file');
        }

        return $this->client->put(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/contents/' . urlencode($path),
            $parameters
        );
    }

    /**
     * Deletes a file from a repository.
     *
     * @see http://developer.github.com/v3/repos/contents/#delete-a-file
     * @throws MalformedRequestException
     * @param string $owner
     * @param string $repo
     * @param string $path
     * @param array $parameters
     */
    public function delete($owner, $repo, $path, array $parameters)
    {
        if (!isset($parameters['message'])) {
            throw new MalformedRequestException('Message is required to delete a file');
        }

        if (!isset($parameters['sha'])) {
            throw new MalformedRequestException('SHA hash of the file being removed is required');
        }

        $this->client->delete(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/contents/' . urlencode($path),
            $parameters
        );
    }

    /**
     * Download an archive of the repository. Returns the archive file contents in the requested format.
     *
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
        $response = $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/' . urlencode($format) . '/' . urlencode($ref),
            $parameters
        );

        return $response;
    }
}
