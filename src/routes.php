<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

//AUTH
$routes->add('login', new Route('/login',[
    '_controller' => 'App\Controller\ConnexionController::login'
]));
$routes->add('loginError', new Route('/loginError',[
    '_controller' => 'App\Controller\ConnexionController::loginError'
]));
$routes->add('connexion', new Route('/connexion',[
    '_controller' => 'App\Controller\ConnexionController::connexion'
]));
$routes->add('deconnexion', new Route('/deconnexion/{email}',[
    '_controller' => 'App\Controller\ConnexionController::deconnexion'
]));
$routes->add('inscription', new Route('/inscription',[
    '_controller' => 'App\Controller\ConnexionController::inscription'
]));
$routes->add('inscription/add-user', new Route('/inscription/add-user',[
    '_controller' => 'App\Controller\ConnexionController::AddUserToBdd'
]));

//ADMIN
$routes->add('admin', new Route('/admin',[
    '_controller' => 'App\Controller\AdminController::admin'
]));
$routes->add('deleteUserById', new Route('/deleteUser/{id}', [
    '_controller' => 'App\Controller\AdminController::deleteUser'
]));

//USER
$routes->add('profil', new Route('/profil',[
    '_controller' => 'App\Controller\UserController::profil'
]));

//BlogPost
$routes->add('postById', new Route('/post/{id}', [
    '_controller' => 'App\Controller\PostController::postById'
]));
$routes->add('index', new Route('/', [
    '_controller' => 'App\Controller\IndexController::hello'
]));
$routes->add('hello', new Route('/home', [
    '_controller' => 'App\Controller\IndexController::home'
]));

$routes->add('addPost', new Route('/add-post',[
    '_controller' => 'App\Controller\PostController::addPost'
]));
$routes->add('postForm', new Route('/postForm',[
    '_controller' => 'App\Controller\PostController::postForm'
]));


$routes->add('bye', new Route('/bye',[
    '_controller' => 'App\Controller\PostController::bye'
]));
$routes->add('about', new Route('/about',[
    '_controller' => 'App\Controller\PageController::about'
]));

$routes->add('test', new Route('/test',[
    '_controller' => 'App\Controller\PageController::test'
]));




return $routes;
