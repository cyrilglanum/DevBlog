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
        $repo = new UserRepository();
        if($request->query->get('email')){
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user[0]->role_id;
            if($role == 10){
                $postId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comments = $repo->findByPostId($postId);
                include __DIR__ . '/../pages/post/editComments.php';
                return new Response(ob_get_clean());
            }
            }else{
                include __DIR__ . '/../pages/my403.php';
        }
    }


}

