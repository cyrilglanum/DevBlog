<?php

namespace App\controller;

use App\models\Post;
use App\repositories\BaseRepository;
use App\repositories\CommentRepository;
use App\repositories\PostRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends BaseRepository
{

    public function showCommentsByPostId(Request $request)
    {
//        dd($request,$request->get('id'));
        $postId = $request->get('id');
        $repo = new CommentRepository();
        ob_start();
        $comments = $repo->findByPostId($postId);
        include __DIR__ . '/../pages/post/editComments.php';
    }


}

