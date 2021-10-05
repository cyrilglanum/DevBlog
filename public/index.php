<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

use Framework\Simplex;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();
$routes = require __DIR__ . '/../src/routes.php';
$context = new RequestContext();


try {
    $urlMatcher = new UrlMatcher($routes, $context);
    $controllerResolver = new ControllerResolver();
    $argumentsResolver = new ArgumentResolver();
    $framework = new Simplex($urlMatcher, $controllerResolver, $argumentsResolver);
    $response = $framework->handle($request);
    $response->send();
} catch (Exception $e) {
    var_dump([$e->getMessage(),$e->getFile(),$e->getLine(),$e->getTrace()]);
}

