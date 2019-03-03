<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 03.03.2019
 * Time: 16:41
 */

namespace Framework\Http;

use Psr\Http\Message\ResponseInterface;

class ResponseSender
{
    public function send(ResponseInterface $response): void
    {
        header(sprintf(
            'HTTP/%s %d %s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ));
        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf('%s: $s', $name, $value), false);
            }
        }
        echo $response->getBody()->getContents();
    }
}