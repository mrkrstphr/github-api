<?php

namespace Martha\GitHub\Request\Me;

use Martha\GitHub\Request\AbstractRequest;
use Martha\GitHub\Request\MalformedRequestException;

/**
 * Class Keys
 *
 * @see http://developer.github.com/v3/users/keys/
 * @package Martha\GitHub\Request\Me
 */
class Keys extends AbstractRequest
{
    /**
     * List your public keys.
     *
     * @see http://developer.github.com/v3/users/keys/#list-your-public-keys
     * @return array
     */
    public function keys()
    {
        return $this->getClient()->get('/user/keys');
    }

    /**
     * Get a single public key.
     *
     * @see http://developer.github.com/v3/users/keys/#get-a-single-public-key
     * @param int $id
     * @return array
     */
    public function key($id)
    {
        return $this->getClient()->get('/user/keys/' . urlencode($id));
    }

    /**
     * Create a public key.
     *
     * @see http://developer.github.com/v3/users/keys/#create-a-public-key
     * @throws MalformedRequestException
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters)
    {
        if (!isset($parameters['title']) || !isset($parameters['key'])) {
            throw new MalformedRequestException('Title and Key are required to create a key');
        }

        return $this->getClient()->post('/user/keys');
    }

    /**
     * Update a public key.
     *
     * @see http://developer.github.com/v3/users/keys/#update-a-public-key
     * @throws MalformedRequestException
     * @param array $parameters
     * @return array
     */
    public function update(array $parameters)
    {
        if (!isset($parameters['title']) || !isset($parameters['key'])) {
            throw new MalformedRequestException('Title and Key are required to create a key');
        }

        return $this->getClient()->patch('/user/keys');
    }

    /**
     * Delete a public key.
     *
     * @see http://developer.github.com/v3/users/keys/#delete-a-public-key
     * @param int $id
     */
    public function delete($id)
    {
        $this->getClient()->delete('/user/keys/' . urlencode($id));
    }
}
