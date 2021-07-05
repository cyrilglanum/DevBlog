<?php

namespace App\controller;

use App\interfaces\UserRepositoryInterface;
use App\repositories\BaseRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseRepository {

    public function about(){

        parent::connect();
    ob_start();
    $user =
    include __DIR__ .'/../pages/about.php';
    return new Response(ob_get_clean());
    }

     public function test(){

    ob_start();
    $users = new UserRepository(parent::connect());
    $users = $users->findAll();
    $user = new UserRepository(parent::connect());
    $user = $user->find(8);

    include __DIR__ .'/../pages/test.php';
    return new Response(ob_get_clean());
    }

}

