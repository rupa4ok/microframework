<?php

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = \Framework\Http\RequestFactory::fromGlobals();

$name = $request->getQueryParams()['name'] ?? 'Гость';
header(('X-developer: Test'));
echo $name;