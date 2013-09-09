<?php

namespace Martha\GitHub\Request;

/**
 * Class Gists
 * @package Martha\GitHub\Request
 */
class Gists extends AbstractRequest
{
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
