<?php

namespace App\controller;

use App\models\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseController
{

    public function postById(Request $request)
    {
        ob_start();
        $id = $request->attributes->get('id');
        $db = parent::connect();
        $post = new Post();
        //récupération des information du post en question.
        $post = $post->getPostById($id);
        include __DIR__ . '/../pages/post.php';
        return new Response(ob_get_clean());
    }

     public function addPost(Request $request)
    {
        ob_start();
        $db = parent::connect();
//        $post = new Post();
        include __DIR__ . '/../pages/add-post.php';
        return new Response(ob_get_clean());
    }

    public function bye()
    {
        parent::connect();
        ob_start();
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }
}

