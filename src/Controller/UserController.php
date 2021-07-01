<?php

namespace App\Controller;

use App\Models\Post;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    public function profil(Request $request)
    {
        ob_start();
        $db = parent::connect();
        $user = new User();
        $user = $user->getUserByCookie($request);
        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }



}