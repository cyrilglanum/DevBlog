<?php

namespace App\controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseController {

    public function about(){

        parent::connect();
    ob_start();
    include __DIR__ .'/../pages/about.php';
    return new Response(ob_get_clean());
    }

}

