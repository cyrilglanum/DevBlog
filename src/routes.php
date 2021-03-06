<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

//AUTH
$routes->add('login', new Route('/login',[
    '_controller' => 'App\controller\ConnexionController::login'
]));
$routes->add('loginError', new Route('/loginError',[
    '_controller' => 'App\controller\ConnexionController::loginError'
]));
$routes->add('connexion', new Route('/connexion',[
    '_controller' => 'App\controller\ConnexionController::connexion'
]));
$routes->add('deconnexion', new Route('/deconnexion/{email}',[
    '_controller' => 'App\controller\ConnexionController::deconnexion'
]));
$routes->add('inscription', new Route('/inscription',[
    '_controller' => 'App\controller\ConnexionController::inscription'
]));
$routes->add('inscription/add-user', new Route('/inscription/add-user',[
    '_controller' => 'App\controller\ConnexionController::AddUserToBdd'
]));

//ADMIN
$routes->add('admin', new Route('/admin',[
    '_controller' => 'App\controller\AdminController::admin'
]));
$routes->add('admin2', new Route('/admin2',[
    '_controller' => 'App\controller\AdminController::admin2'
]));
$routes->add('deleteUserById', new Route('/deleteUser/{id}', [
    '_controller' => 'App\controller\AdminController::deleteUser'
]));

//USER
$routes->add('profil', new Route('/profil',[
    '_controller' => 'App\controller\UserController::profil'
]));

$routes->add('cv', new Route('/Profil/cv',[
    '_controller' => 'App\controller\UserController::cv'
]));

$routes->add('savePicture', new Route('/savePicture',[
    '_controller' => 'App\controller\UserController::savePicture'
]));

$routes->add('savePassword', new Route('/savePassword',[
    '_controller' => 'App\controller\UserController::savePassword'
]));

//BlogPost
$routes->add('postById', new Route('/post/{id}', [
    '_controller' => 'App\controller\PostController::postById'
]));

$routes->add('deletePostById', new Route('/delete-post/{id}', [
    '_controller' => 'App\controller\PostController::deletePostById'
]));

$routes->add('editPostById', new Route('/edit-post/{id}', [
    '_controller' => 'App\controller\PostController::editPostById'
]));

$routes->add('showCommentsByPostId', new Route('/edit-comments/{id}', [
    '_controller' => 'App\controller\CommentController::showCommentsByPostId'
]));

$routes->add('validCommentsByPostId', new Route('/valid-comments/{id}', [
    '_controller' => 'App\controller\CommentController::validCommentsByPostId'
]));

$routes->add('commentPost', new Route('/comment-post/{id}', [
    '_controller' => 'App\controller\CommentController::commentPost'
]));

$routes->add('addComment', new Route('/addComment', [
    '_controller' => 'App\controller\CommentController::addComment'
]));

$routes->add('editPostValidation', new Route('editPostValidation', [
    '_controller' => 'App\controller\PostController::editPostValidation'
]));

$routes->add('blogSpace', new Route('/blogSpace', [
    '_controller' => 'App\controller\PostController::blogSpace'
]));

$routes->add('index', new Route('/', [
    '_controller' => 'App\controller\IndexController::home'
]));

$routes->add('home', new Route('/index.php/home', [
    '_controller' => 'App\controller\IndexController::index'
]));

$routes->add('cv', new Route('/cv', [
    '_controller' => 'App\controller\IndexController::cv'
]));

$routes->add('contact', new Route('/contact',[
    '_controller' => 'App\controller\IndexController::contact'
]));

$routes->add('contactus', new Route('/contactus',[
    '_controller' => 'App\controller\IndexController::contactus'
]));

$routes->add('addPost', new Route('/add-post',[
    '_controller' => 'App\controller\PostController::addPost'
]));

$routes->add('postForm', new Route('/postForm',[
    '_controller' => 'App\controller\PostController::postForm'
]));

$routes->add('deletePost', new Route('/deletePost/{id}',[
    '_controller' => 'App\controller\AdminController::deletePost'
]));

$routes->add('deleteComm', new Route('/edit-comments/deleteComm/{id}',[
    '_controller' => 'App\controller\CommentController::deleteComm'
]));

$routes->add('deleteMessage', new Route('/deleteMessage/{id}',[
    '_controller' => 'App\controller\IndexController::deleteMessage'
]));

$routes->add('validComm', new Route('/valid-comments/validate/{id}',[
    '_controller' => 'App\controller\CommentController::validComm'
]));

//$routes->add('test', new Route('/test',[
//    '_controller' => 'App\controller\PageController::test'
//]));


return $routes;
