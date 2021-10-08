<?php

namespace App\controller;


use App\models\Post;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\PostRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends BaseRepository
{
    public function admin(Request $request)
    {
        ob_start();
        $userRepo = new UserRepository();
        $user = $userRepo->searchUserByMail($request->query->get('email'));
        if ($user->role_id == 10) {
            $repo = new UserRepository();
            $users = $repo->selectByTable('*', 'users', User::class);
            $postRepo = new PostRepository();
            $posts = $postRepo->selectByTable('*', 'posts', Post::class);
            include __DIR__ . '/../pages/admin.php';
            return new Response(ob_get_clean());
        } else {
            ob_start();
            include __DIR__ . '/../pages/my404.php';
            return new Response(ob_get_clean());
        }
    }

    public function deleteUser($id)
    {
        ob_start();
        //function ajax pour deleter user
        $repo = new UserRepository();
        $userToDelete = $repo->remove('users', $id);
        $users = $repo->selectByTable('*', 'users', User::class);
        include __DIR__ . '../../pages/validation/deleteUser.php';
        return new Response(ob_get_clean());
    }



}