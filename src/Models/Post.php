<?php


namespace App\Models;


use App\Controller\BaseController;

class Post extends BaseController
{
    function getPost()
    {
        $db = parent::connect();
        $post = array();
        $req = $db->query('SELECT * FROM clients');

        return $req;
    }

    function getPostById($id)
    {
        $db = parent::connect();
        $req = $db->query("SELECT * FROM clients WHERE id = '$id'");
        $res = $req->fetch();

        return $res;
    }
}