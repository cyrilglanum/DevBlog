<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();


$routes->add('index', new Route('/', [
    '_controller' => 'App\Controller\IndexController::hello'
]));
$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'World',
    '_controller' => 'App\Controller\IndexController::hello'
]));
$routes->add('postById', new Route('/post/{id}', [
    '_controller' => 'App\Controller\PostController::postById'
]));
$routes->add('bye', new Route('/bye',[
    '_controller' => 'App\Controller\PostController::bye'
]));
$routes->add('about', new Route('/about',[
    '_controller' => 'App\Controller\PageController::about'
]));




return $routes;
