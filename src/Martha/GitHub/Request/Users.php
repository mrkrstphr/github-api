<?php

namespace Martha\GitHub\Request;

/**
 * Class Users
 * @package Martha\GitHub\Request
 */
class Users extends AbstractRequest
{
    /**
     * Returns an instance of the Users\Emails API request end point.
     *
     * @return Users\Emails
     */
    public function emails()
    {
        return new Users\Emails($this->getClient());
    }

    /**
     * Returns an instance of the Users\Followers API request end point.
     *
     * @return Users\Followers
     */
    public function followers()
    {
        return new Users\Followers($this->getClient());
    }

    /**
     * Returns an instance of the Users\Keys API request end point.
     *
     * @return Users\Keys
     */
    public function keys()
    {
        return new Users\Keys($this->getClient());
    }
}
