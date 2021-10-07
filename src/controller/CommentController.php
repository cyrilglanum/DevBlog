<?php

namespace App\controller;

use App\repositories\BaseRepository;
use App\repositories\CommentRepository;
use App\repositories\PostRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends BaseRepository
{

    public function commentPost(Request $request):Response
    {
        ob_start();
        $repo = new PostRepository();
        $post = $repo->selectByTableById('*', 'posts', $request->attributes->get('id'));
        include __DIR__ . '../../pages/commentPost.php';
        return new Response(ob_get_clean());
    }

    public function addComment(Request $request):Response
    {
        ob_start();
        $email = htmlspecialchars($request->request->get('email'));
        $commentRepo = new CommentRepository();
        $postId = htmlspecialchars($request->request->get('postId'));
        $comment = htmlspecialchars($request->request->get('content'));
        $commentRepo->addComment($postId, $comment,$email);
        include __DIR__ . '../../pages/validation/historyBack2x.php';

        return new Response(ob_get_clean());
    }

    public function showCommentsByPostId(Request $request):Response
    {
        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user->role_id;
            if ($role == 10) {
                $postId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comments = $repo->findByPostId($postId);
                include __DIR__ . '/../pages/post/editComments.php';
                return new Response(ob_get_clean());
            }
        } else {
            ob_start();
            include __DIR__ . '/../pages/my403.php';
            return new Response(ob_get_clean());
        }
    }

    public function validCommentsByPostId(Request $request)
    {
        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user->role_id;
            if ($role == 10) {
                $postId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comments = $repo->findInvalidCommentsByPostId($postId);
                include __DIR__ . '/../pages/post/validComments.php';
                return new Response(ob_get_clean());
            }
        } else {
            include __DIR__ . '/../pages/my403.php';
        }
        return false;
    }


    public function deleteComm(Request $request)
    {
        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user->role_id;
            if ($role == 10) {
                $commentId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comment = $repo->selectByTableById('*', 'comments', $commentId);
                $repo->remove('comments', $comment['id']);
                include __DIR__ . '/../pages/validation/redirectHome.php';
                return new Response(ob_get_clean());
            }
        } else {
            include __DIR__ . '/../pages/my403.php';
        }
        return false;
    }

    public function validComm(Request $request)
    {
        $repo = new UserRepository();
        if ($request->query->get('email')) {
            $user = $repo->searchUserByMail($request->query->get('email'));
            $role = $user->role_id;
            if ($role == 10) {
                $commentId = $request->get('id');
                $repo = new CommentRepository();
                ob_start();
                $comment = $repo->selectByTableById('*', 'comments', $commentId);
                $repo->validComm($comment['id']);
                include __DIR__ . '/../pages/validation/redirectHome.php';
                return new Response(ob_get_clean());
            }
        } else {
            include __DIR__ . '/../pages/my403.php';
        }
        return false;
    }

}

