<?php

namespace Martha\GitHub\Request\Me;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Followers
 *
 * @see http://developer.github.com/v3/users/followers/
 * @package Martha\GitHub\Request\Me
 */
class Followers extends AbstractRequest
{
    /**
     * List the authenticated user's followers.
     *
     * @see http://developer.github.com/v3/users/followers/#list-followers-of-a-user
     * @return array
     */
    public function followers()
    {
        return $this->getClient()->get('/user/followers');
    }

    /**
     * List who the authenticated user is following.
     *
     * @see http://developer.github.com/v3/users/followers/#list-users-followed-by-another-user
     * @return array
     */
    public function following()
    {
        return $this->getClient()->get('/user/following');
    }

    /**
     * Check if the authenticated user is following a user.
     *
     * @see http://developer.github.com/v3/users/followers/#check-if-you-are-following-a-user
     * @param $user
     * @return bool
     */
    public function amFollowing($user)
    {
        $this->getClient()->get('/user/following/' . urlencode($user));
        $response = $this->getClient()->getLastResponse();

        return $response->getStatusCode() == '204';
    }

    /**
     * Follow a user.
     *
     * @see http://developer.github.com/v3/users/followers/#follow-a-user
     * @param string $user
     */
    public function follow($user)
    {
        $this->getClient()->put('/user/following/' . urlencode($user));
    }

    /**
     * Unfollow a user.
     *
     * @see http://developer.github.com/v3/users/followers/#unfollow-a-user
     * @param string $user
     */
    public function unfollow($user)
    {
        $this->getClient()->delete('/user/following/' . urlencode($user));
    }
}
