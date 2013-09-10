<?php

namespace Martha\GitHub\Request;

/**
 * Class Gists
 * @package Martha\GitHub\Request
 */
class Gists extends AbstractRequest
{
    /**
     * List the authenticated user’s gists or if called anonymously, this will return all public gists.
     *
     * @see http://developer.github.com/v3/gists/#list-gists
     * @param array $parameters
     * @return array
     */
    public function gists(array $parameters = array())
    {
        return $this->client->get('/gists', $parameters);
    }

    /**
     * List all public gists.
     *
     * @see http://developer.github.com/v3/gists/#list-gists
     * @param array $parameters
     * @return array
     */
    public function publicGists(array $parameters = array())
    {
        return $this->client->get('/gists/public', $parameters);
    }

    /**
     * List the authenticated user’s starred gists.
     *
     * @see http://developer.github.com/v3/gists/#list-gists
     * @param array $parameters
     * @return array
     */
    public function starred(array $parameters = array())
    {
        return $this->client->get('/gists/starred', $parameters);
    }

    /**
     * Get a single gist.
     *
     * @see http://developer.github.com/v3/gists/#get-a-single-gist
     * @param int $id
     * @return array
     */
    public function gist($id)
    {
        return $this->client->get('/gists/' . urlencode($id));
    }

    /**
     * Create a gist.
     *
     * @see http://developer.github.com/v3/gists/#create-a-gist
     * @throws MalformedRequestException
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters)
    {
        if (!isset($parameters['public'])) {
            throw new MalformedRequestException('Public flag is required to create a Gist');
        }

        if (!isset($parameters['files'])) {
            throw new MalformedRequestException('An array of files is required to create a Gist');
        }

        return $this->client->post('/gists/', $parameters);
    }

    /**
     * Edit a gist.
     *
     * @see http://developer.github.com/v3/gists/#edit-a-gist
     * @throws MalformedRequestException
     * @param int $id
     * @param array $parameters
     * @return array
     */
    public function edit($id, array $parameters = array())
    {
        return $this->client->patch('/gists/', $parameters);
    }

    /**
     * Star a gist.
     *
     * @see http://developer.github.com/v3/gists/#star-a-gist
     * @param int $id
     * @return array
     */
    public function star($id)
    {
        return $this->client->put('/gists/' . urlencode($id) . '/star');
    }

    /**
     * Unstar a gist.
     *
     * @see http://developer.github.com/v3/gists/#unstar-a-gist
     * @param int $id
     * @return array
     */
    public function unstar($id)
    {
        return $this->client->delete('/gists/' . urlencode($id) . '/star');
    }

    /**
     * Check if a gist is starred.
     *
     * @see http://developer.github.com/v3/gists/#check-if-a-gist-is-starred
     * @param int $id
     * @return array
     */
    public function isStarred($id)
    {
        return $this->client->get('/gists/' . urlencode($id) . '/star');
    }

    /**
     * Fork a gist.
     *
     * @see http://developer.github.com/v3/gists/#fork-a-gist
     * @param int $id
     * @return array
     */
    public function fork($id)
    {
        return $this->client->post('/gists/' . urlencode($id) . '/forks');
    }

    /**
     * Delete a gist.
     *
     * @see http://developer.github.com/v3/gists/#delete-a-gist
     * @param int $id
     */
    public function delete($id)
    {
        $this->client->post('/gists/' . urlencode($id));
    }

    /**
     * Returns an instance of the Gists\Comments API request end point.
     *
     * @return Gists\Comments
     */
    public function comments()
    {
        return new Gists\Comments($this->getClient());
    }
}
