<?php

namespace App\Controller;

use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    public function home(Request $request)
    {
        ob_start();
        //récupération des posts
        $posts = new Post();
        $getPosts = $posts->getPosts();
        $name = $request->attributes->get('name');
        include __DIR__ . '/../pages/home.php';
        return new Response(ob_get_clean());
    }

    public function redirect(Request $request)
    {
         dd('hi');

    }
}