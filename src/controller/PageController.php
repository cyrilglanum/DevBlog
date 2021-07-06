<?php

namespace App\controller;

use App\interfaces\UserRepositoryInterface;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseRepository {

    public function about(){

        parent::connect();
    ob_start();
    include __DIR__ .'/../pages/about.php';
    return new Response(ob_get_clean());
    }

     public function test(){

    ob_start();
    $repo = new UserRepository(parent::connect());
    //directement appeler la fonction sur le repo
    $users = $repo->findAll();
    //ou en 2 temps
    $user1 = $repo->selectByTable('*','users');
    //équivaut à la query : "Select * from users" et renvoie le résultat.
    //fonction sur baseRepository
    $user7 = (new UserRepository(parent::connect()))->selectByTableById('*','users',7);
//    $user = $user->find(8);

//         $user2 = new User([
//             'email'=>'cyr@gl.com',
//             'password'=>'70c881d4a26984ddce795f6f71817c9cf4480e79',
//             'token_session' => '0',
//             'token_expire'=> 0,
//             ]);
//         $userSave = $repo->save($user2);

        $user = $repo->find(16);

        if($user != false){
            $repo->remove('users',$user['id']);
        }


    include __DIR__ .'/../pages/test.php';
    return new Response(ob_get_clean());
    }

}

