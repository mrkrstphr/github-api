<?php

namespace Martha\GitHub\Request\Me;

use Martha\GitHub\Request\AbstractRequest;

/**
 * Class Emails
 *
 * @see http://developer.github.com/v3/users/emails/
 * @package Martha\GitHub\Request\Me
 */
class Emails extends AbstractRequest
{
    /**
     * List email addresses for a user.
     *
     * @see http://developer.github.com/v3/users/emails/#list-email-addresses-for-a-user
     * @return array
     */
    public function emails()
    {
        $request = $this->client->prepareRequest('GET', '/user/emails');
        $request->addHeader('Accept: application/vnd.github.v3');

        return $this->client->processRequest($request);
    }

    /**
     * Add email address(es).
     *
     * @see http://developer.github.com/v3/users/emails/#add-email-addresses
     * @param array $parameters
     * @return array
     */
    public function create(array $parameters)
    {
        return $this->getClient()->post('/user/emails', $parameters);
    }

    /**
     * Delete email address(es).
     *
     * @see http://developer.github.com/v3/users/emails/#delete-email-addresses
     * @param mixed $parameters
     */
    public function delete($parameters)
    {
        $this->getClient()->delete('/user/emails', $parameters);
    }
}
