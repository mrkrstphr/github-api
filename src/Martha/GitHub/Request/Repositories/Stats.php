<?php

namespace Martha\GitHub\Request\Repositories;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Stats
 *
 * @see http://developer.github.com/v3/repos/statistics/
 * @package Martha\GitHub\Request\Repositories
 */
class Stats extends AbstractRequest
{
    /**
     * @see http://developer.github.com/v3/repos/statistics/#get-contributors-list-with-additions-deletions-and-commit-counts
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function contributors($owner, $repo)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/statistics/#get-the-last-year-of-commit-activity-data
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function commitActivity($owner, $repo)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/statistics/#get-the-number-of-additions-and-deletions-per-week
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function codeFrequency($owner, $repo)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/statistics/#get-the-weekly-commit-count-for-the-repo-owner-and-everyone-else
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function participation($owner, $repo)
    {
        return array();
    }

    /**
     * @see http://developer.github.com/v3/repos/statistics/#get-the-number-of-commits-per-hour-in-each-day
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function punchChard($owner, $repo)
    {
        return array();
    }
}
