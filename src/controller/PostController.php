<?php

namespace App\controller;

use App\models\Post;
use App\repositories\BaseRepository;
use App\repositories\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseRepository
{

    public function postById(Request $request)
    {
        ob_start();
        $id = $request->attributes->get('id');
        $repo = new PostRepository();
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
        $title = htmlspecialchars($request->request->get('title'));
        $icon = htmlspecialchars($request->request->get('icon'));
        $author = htmlspecialchars($request->request->get('author'));
        $content = htmlspecialchars($request->request->get('content'));

        $uploaddir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR;
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo '';
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
        }

        $repo = new PostRepository();
        $postToSave = new Post([
            'title'=> $title,
            'icon' => $icon,
            'author' => $author,
            'content' => $content,
            'photo' => basename($_FILES['file']['name']),
        ]);
        $req = $repo->savePost($postToSave);

        if($req){
            ob_start();
            $dir = substr(__DIR__, 0,-11);
            include  $dir.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.'validation'.DIRECTORY_SEPARATOR.'validAddPost.php';
            return new Response(ob_get_clean());
        }else{
            die();
        }
    }

     public function blogSpace(Request $request)
    {
        ob_start();
        $repo = New PostRepository();
        $posts = $repo->findAll();
//        dd($posts);
        include __DIR__ . '/../pages/post/blogSpace.php';
        return new Response(ob_get_clean());
    }

    public function bye()
    {
        ob_start();
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }
}

