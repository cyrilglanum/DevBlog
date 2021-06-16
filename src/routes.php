<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;



$routes = new RouteCollection();

$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => [new App\Controller\GreetingController,'hello']]));
$routes->add('bye', new Route('/bye',[
    '_controller' => [new App\Controller\GreetingController,'bye']]));
$routes->add('about', new Route('/about',[
    '_controller' => [new App\Controller\PageController,'about']]));

return $routes;