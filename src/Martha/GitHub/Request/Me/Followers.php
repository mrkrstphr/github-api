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
     * @todo
     * @see http://developer.github.com/v3/users/followers/#list-followers-of-a-user
     * @return array
     */
    public function followers()
    {
        return array();
    }

    /**
     * List who the authenticated user is following.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#list-users-followed-by-another-user
     * @return array
     */
    public function following()
    {
        return array();
    }

    /**
     * Check if the authenticated user is following a user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#check-if-you-are-following-a-user
     * @param $user
     * @return bool
     */
    public function amFollowing($user)
    {
        return true;
    }

    /**
     * Follow a user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#follow-a-user
     * @param string $user
     */
    public function follow($user)
    {

    }

    /**
     * Unfollow a user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#unfollow-a-user
     * @param string $user
     */
    public function unfollow($user)
    {

    }
}
