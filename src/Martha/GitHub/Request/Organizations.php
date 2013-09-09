<?php

namespace Martha\GitHub\Request;

/**
 * Class Organizations
 * @package Martha\GitHub\Request
 */
class Organizations extends AbstractRequest
{
    /**
     * Returns an instance of the Organizations\Members API request end point.
     *
     * @return Organizations\Members
     */
    public function members()
    {
        return new Organizations\Members($this->getClient());
    }

    /**
     * Returns an instance of the Organizations\Teams API request end point.
     *
     * @return Organizations\Teams
     */
    public function teams()
    {
        return new Organizations\Teams($this->getClient());
    }
}
