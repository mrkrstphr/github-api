<?php

namespace Martha\GitHub\Request\Users;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Keys
 *
 * @see http://developer.github.com/v3/users/keys/
 * @package Martha\GitHub\Request\Users
 */
class Keys extends AbstractRequest
{
    /**
     * List your public keys for a user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/keys/#list-public-keys-for-a-user
     * @param string $user
     * @return array
     */
    public function keys($user)
    {
        return array();
    }
}
