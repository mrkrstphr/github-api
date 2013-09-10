<?php

namespace Martha\GitHub\Request;

/**
 * Class Markdown
 * @package Martha\GitHub\Request
 */
class Markdown extends AbstractRequest
{
    /**
     * Render an arbitrary markdown document.
     *
     * @see http://developer.github.com/v3/markdown/#render-an-arbitrary-markdown-document
     * @param array $parameters
     * @return array
     * @throws MalformedRequestException
     */
    public function markdown(array $parameters)
    {
        if (!isset($parameters['text'])) {
            throw new MalformedRequestException('Text is required to render');
        }

        return $this->client->post('/markdown', $parameters);
    }

    /**
     * Render a Markdown document in raw mode.
     *
     * @see http://developer.github.com/v3/markdown/#render-a-markdown-document-in-raw-mode
     * @param string $contents
     * @return array
     */
    public function raw($contents)
    {
        return $this->client->post('/markdown/raw', $contents);
    }
}
