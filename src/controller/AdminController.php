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
        $repo = new UserRepository(parent::connect());
        $users = $repo->selectByTable('*','users',User::class);
        $postRepo = new PostRepository(parent::connect());
        $posts  = $postRepo->selectByTable('*', 'posts',Post::class);
        include __DIR__ . '/../pages/admin.php';
        return new Response(ob_get_clean());
    }

    public function deleteUser($id)
    {
        ob_start();
        //function ajax pour deleter user
        $repo = new UserRepository(parent::connect());
        $userToDelete = $repo->remove('users',$id);
        $users = $repo->selectByTable('*','users',User::class);
        include __DIR__ . '../../pages/validation/deleteUser.php';
        return new Response(ob_get_clean());
    }

    public function deletePost($id)
    {
        ob_start();
        //function ajax pour deleter user
        $repo = new PostRepository(parent::connect());
        $postToDelete = $repo->remove('posts',$id);
        $post = $repo->selectByTable('*','posts',Post::class);
        include __DIR__ . '../../pages/validation/deleteUser.php';
        return new Response(ob_get_clean());
    }




}