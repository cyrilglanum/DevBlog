<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GreetingController extends BaseController
{

    public function hello(Request $request)
    {

        ob_start();
        $db = parent::connect();
        $name = $request->attributes->get('name');

        include __DIR__ . '/../pages/hello.php';
        return new Response(ob_get_clean());
    }

    public function bye()
    {
        parent::connect();
        ob_start();
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }
}

