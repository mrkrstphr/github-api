<?php

namespace Martha\GitHub\Request;

/**
 * Class GitIgnore
 *
 * @see http://developer.github.com/v3/gitignore/
 * @package Martha\GitHub\Request
 */
class GitIgnore extends AbstractRequest
{

    /**
     * Render a Markdown document in raw mode.
     *
     * @see http://developer.github.com/v3/gitignore/#listing-available-templates
     * @return array
     */
    public function templates()
    {
        return $this->client->get('/gitignore/templates');
    }

    /**
     * Get a single template.
     *
     * @see http://developer.github.com/v3/gitignore/#get-a-single-template
     * @param string $name
     * @return array
     */
    public function template($name)
    {
        return $this->client->get('/gitignore/templates/' . urlencode($name));
    }
}
