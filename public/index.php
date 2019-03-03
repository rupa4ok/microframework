<?php

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Руслан';

$response =(new HtmlResponse('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'Test');

header('HTTP/1.0'.$response->getStatusCode() . '' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $value) {
    header($name . ':' . $value);
}

echo $response->getBody();