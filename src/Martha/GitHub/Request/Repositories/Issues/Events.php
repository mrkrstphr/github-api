<?php

namespace Martha\GitHub\Request\Repositories\Issues;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Events
 *
 * @see http://developer.github.com/v3/issues/events/
 * @package Martha\GitHub\Request\Repositories\Issues
 */
class Events extends AbstractRequest
{
    /**
     * If $number is provided, list events for that issue, otherwise list events for the repository.
     *
     * @see http://developer.github.com/v3/issues/events/#list-events-for-an-issue
     * @see http://developer.github.com/v3/issues/events/#list-events-for-a-repository
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function events($owner, $repo, $number = '')
    {
        $url = '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues' .
            ($number ? '/' . urlencode($number) : '') . '/events';

        return $this->client->get($url);
    }

    /**
     * Get a single event.
     *
     * @see http://developer.github.com/v3/issues/events/#get-a-single-event
     * @param string $owner
     * @param string $repo
     * @param int $id
     * @return array
     */
    public function event($owner, $repo, $id)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/events/' . urlencode($id)
        );
    }
}
