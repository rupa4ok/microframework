<?php
/**
 * Created by PhpStorm.
 * User: rupak
 * Date: 03.03.2019
 * Time: 9:10
 */

namespace Framework\Http;


class RequestFactory
{
    public static function fromGlobals(array $query = null, array $body = null): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedBody($body ?: $_POST);
    }
}