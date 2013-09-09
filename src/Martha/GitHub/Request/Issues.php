<?php

namespace Martha\GitHub\Request;

/**
 * Class Issues
 * @package Martha\GitHub\Request
 */
class Issues extends AbstractRequest
{
    /**
     * Returns an instance of the Issues\Assignees API request end point.
     *
     * @return Gists\Comments
     */
    public function assignees()
    {
        return new Issues\Assignees($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Comments API request end point.
     *
     * @return Issues\Comments
     */
    public function comments()
    {
        return new Issues\Comments($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Events API request end point.
     *
     * @return Issues\Events
     */
    public function events()
    {
        return new Issues\Events($this->getClient());
    }

    /**
     * Returns an instance of the Issues\Labels API request end point.
     *
     * @return Issues\Labels
     */
    public function labels()
    {
        return new Issues\Labels($this->getClient());
    }
}
