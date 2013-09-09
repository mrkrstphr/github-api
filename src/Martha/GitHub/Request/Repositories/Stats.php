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
     * Get repository contributor statistics.
     *
     * @see http://developer.github.com/v3/repos/statistics/#get-contributors-list-with-additions-deletions-and-commit-counts
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function contributors($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/stats/contributors'
        );
    }

    /**
     * Get repository commit activity (last year).
     *
     * @see http://developer.github.com/v3/repos/statistics/#get-the-last-year-of-commit-activity-data
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function commitActivity($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/stats/commit_activity'
        );
    }

    /**
     * Get repository code frequency (additions and deletions per week).
     *
     * @see http://developer.github.com/v3/repos/statistics/#get-the-number-of-additions-and-deletions-per-week
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function codeFrequency($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/stats/code_frequency'
        );
    }

    /**
     * Get repository participation (weekly commit count).
     *
     * @see http://developer.github.com/v3/repos/statistics/#get-the-weekly-commit-count-for-the-repo-owner-and-everyone-else
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function participation($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/stats/participation'
        );
    }

    /**
     * Get the repository punch card (number of commits per hour each day).
     *
     * @see http://developer.github.com/v3/repos/statistics/#get-the-number-of-commits-per-hour-in-each-day
     * @param string $owner
     * @param string $repo
     * @return array
     */
    public function punchChard($owner, $repo)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/stats/punch_card'
        );
    }
}
