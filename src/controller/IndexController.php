<?php

namespace App\controller;

use App\models\Post;
use App\models\User;
use App\repositories\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    public function home(Request $request)
    {
        ob_start();
        //retrouver les données avec postrepo
        $repo = new PostRepository(parent::connect());
        //récupération des posts
        $posts = $repo->findAll();
        $name = $request->attributes->get('name');
        $user = new User();
//        $user = $user->getUserByCookie($request);
        include __DIR__ . '/../pages/home.php';
        return new Response(ob_get_clean());
    }

    public function redirect(Request $request)
    {
         dd('hi');

    }
}