<?php

namespace Martha\GitHub\Request\Repositories\Issues;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Labels
 *
 * @see http://developer.github.com/v3/issues/labels/
 * @package Martha\GitHub\Request\Repositories\Issues
 */
class Labels extends AbstractRequest
{
    /**
     * List labels on an issue.
     *
     * @see http://developer.github.com/v3/issues/labels/#list-labels-on-an-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @return array
     */
    public function labels($owner, $repo, $number)
    {
        return $this->client->get(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number) . '/labels'
        );
    }

    /**
     * Add labels to an issue.
     *
     * @see http://developer.github.com/v3/issues/labels/#add-labels-to-an-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function create($owner, $repo, $number, array $parameters)
    {
        return $this->client->post(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number) . '/labels',
            $parameters
        );
    }

    /**
     * If $name is specified, remove that label from the issue, otherwise remove all labels from the issue.
     *
     * @see http://developer.github.com/v3/issues/labels/#remove-a-label-from-an-issue
     * @see http://developer.github.com/v3/issues/labels/#remove-all-labels-from-an-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param string $name
     */
    public function delete($owner, $repo, $number, $name = '')
    {
        $url = '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number) . '/labels';

        if ($name) {
            $url .= '/' . urlencode($name);
        }

        $this->client->delete($url);
    }

    /**
     * Replace all labels for an issue.
     *
     * @see http://developer.github.com/v3/issues/labels/#replace-all-labels-for-an-issue
     * @param string $owner
     * @param string $repo
     * @param string $number
     * @param array $parameters
     * @return array
     */
    public function replace($owner, $repo, $number, array $parameters = array())
    {
        return $this->client->put(
            '/repos/' . urlencode($owner) . '/' . urlencode($repo) . '/issues/' . urlencode($number) . '/labels',
            $parameters
        );
    }
}
