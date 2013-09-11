<?php

namespace Martha\GitHub\Request\Users;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Followers
 *
 * @see http://developer.github.com/v3/users/followers/
 * @package Martha\GitHub\Request\Users
 */
class Followers extends AbstractRequest
{
    /**
     * List a user's followers.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#list-followers-of-a-user
     * @param string $user
     * @return array
     */
    public function followers($user)
    {
        return array();
    }

    /**
     * List users followed by another user.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#list-users-followed-by-another-user
     * @param string $user
     * @return array
     */
    public function following($user)
    {
        return array();
    }

    /**
     * Check if one user follows another.
     *
     * @todo
     * @see http://developer.github.com/v3/users/followers/#check-if-one-user-follows-another
     * @param $user
     * @param $targetUser
     * @return bool
     */
    public function isFollowing($user, $targetUser)
    {
        return true;
    }
}
