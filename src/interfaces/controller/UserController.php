<?php

namespace App\controller;

use App\models\Post;
use App\models\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    public function profil(Request $request)
    {
        ob_start();
        $db = parent::connect();
//        $user = new User();
//        $user = $user->find($request);
        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }



}