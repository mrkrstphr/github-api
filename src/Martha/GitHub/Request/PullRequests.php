<?php

namespace Martha\GitHub\Request;

/**
 * Class PullRequests
 * @package Martha\GitHub\Request
 */
class PullRequests extends AbstractRequest
{
    /**
     * Returns an instance of the PullRequests\Comments API request end point.
     *
     * @return PullRequests\Comments
     */
    public function comments()
    {
        return new PullRequests\Comments($this->getClient());
    }
}
