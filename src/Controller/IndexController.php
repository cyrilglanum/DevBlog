<?php

namespace App\Controller;

use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseController
{
    public function hello(Request $request)
    {
        ob_start();
        $db = parent::connect();
        //récupération des posts
        $tableau = new Post();
        $getPosts = $tableau->getPost();
        $name = $request->attributes->get('name');
        include __DIR__ . '/../pages/hello.php';
        return new Response(ob_get_clean());
    }

    public function redirect(Request $request)
    {
         dd('hi');

    }
}