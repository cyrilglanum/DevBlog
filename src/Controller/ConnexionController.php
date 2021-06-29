<?php

namespace App\Controller;

use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnexionController extends BaseController
{
    public function login(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/login.php';
        return new Response(ob_get_clean());
    }

    public function connexion(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/connexion.php';
        return new Response(ob_get_clean());
    }

     public function inscription(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/inscription.php';
        return new Response(ob_get_clean());
    }

    public function deconnexion(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/deconnexion.php';
        return new Response(ob_get_clean());
    }

}