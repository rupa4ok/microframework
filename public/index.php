<?php

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

use Framework\Http\ResponseSender;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Гость';

$response =(new HtmlResponse('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'Test');

$emitter = new ResponseSender();
$emitter->send($response);