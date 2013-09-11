<?php

namespace Martha\GitHub\Request\Me;

use Martha\GitHub\Request\AbstractRequest;

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
     * @todo
     * @see http://developer.github.com/v3/users/keys/#list-your-public-keys
     * @return array
     */
    public function keys()
    {
        return array();
    }

    /**
     * Get a single public key.
     *
     * @todo
     * @see http://developer.github.com/v3/users/keys/#get-a-single-public-key
     * @param int $id
     * @return array
     */
    public function key($id)
    {
        return array();
    }

    /**
     * Create a public key.
     *
     * @todo
     * @see http://developer.github.com/v3/users/keys/#create-a-public-key
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters)
    {
        return array();
    }

    /**
     * Update a public key.
     *
     * @todo
     * @see http://developer.github.com/v3/users/keys/#update-a-public-key
     * @param array $parameters
     * @return array
     */
    public function update(array $parameters)
    {
        return array();
    }

    /**
     * Delete a public key.
     *
     * @todo
     * @see http://developer.github.com/v3/users/keys/#delete-a-public-key
     * @param int $id
     */
    public function delete($id)
    {

    }
}
