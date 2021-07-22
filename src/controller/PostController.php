<?php

namespace App\controller;

use App\models\Post;
use App\repositories\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseController
{

    public function postById(Request $request)
    {
        ob_start();
        $id = $request->attributes->get('id');
        $repo = new PostRepository(parent::connect());
        //récupération des information du post en question.
        $post = $repo->find($id);
        include __DIR__ . '/../pages/post.php';
        return new Response(ob_get_clean());
    }

     public function addPost(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/add-post.php';
        return new Response(ob_get_clean());
    }

    public function postForm(Request $request)
    {
        $title = $request->request->get('title');
        $icon = $request->request->get('icon');
        $author = $request->request->get('author');
        $content = $request->request->get('content');

        $repo = new PostRepository(parent::connect());
        $postToSave = new Post([
            'title'=> $title,
            'icon' => $icon,
            'author' => $author,
            'content' => $content,
        ]);
        $req = $repo->savePost($postToSave);
        dd($req);
        if($req){

        }
    }

    public function bye()
    {
        parent::connect();
        ob_start();
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }
}

