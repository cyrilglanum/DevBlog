<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = require __DIR__ . '/../src/routes.php';
$context = new RequestContext();

$urlMatcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentsResolver = new ArgumentResolver();

$framework = new Framework\Simplex($urlMatcher,$controllerResolver,$argumentsResolver);

$response = $framework->handle($request);

$response->send();

