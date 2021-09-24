<?php

namespace App\controller;

use App\models\Comment;
use App\models\Post;
use App\repositories\BaseRepository;
use App\repositories\CommentRepository;
use App\repositories\PostRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends BaseRepository
{

    public function commentPost(Request $request)
    {
        ob_start();
        $repo = new PostRepository();
        $post = $repo->findById('*', 'posts', $request->attributes->get('id'));
        include __DIR__ . '../../pages/commentPost.php';
        return new Response(ob_get_clean());
    }

    public function addComment(Request $request)
    {
        ob_start();
        $email = $request->request->get('email');
        $commentRepo = new CommentRepository();
        $postId = $request->request->get('postId');
        $comment = $request->request->get('content');
        $commentRepo->addComment($postId, $comment,$email);
        include __DIR__ . '../../pages/validation/historyBack2x.php';

        return new Response(ob_get_clean());
    }

    public function showCommentsByPostId(Request $request)
    {
        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user[0]->role_id;
            if ($role == 10) {
                $postId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comments = $repo->findByPostId($postId);
                include __DIR__ . '/../pages/post/editComments.php';
                return new Response(ob_get_clean());
            }
        } else {
            include __DIR__ . '/../pages/my403.php';
        }
    }


    public function deleteComm(Request $request)
    {
//        dd($request->get('id'));

        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user[0]->role_id;
            if ($role == 10) {
                $commentId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comment = $repo->findById('*', 'comments', $commentId);
                $repo->remove('comments', $comment['id']);
                include __DIR__ . '/../pages/validation/redirectHome.php';
                return new Response(ob_get_clean());
            }
        } else {
            include __DIR__ . '/../pages/my403.php';
        }
    }

}

