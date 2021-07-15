<?php


namespace App\models;


use App\controller\BaseController;

class Post extends BaseController
{
    function getPosts()
    {
        $db = parent::connect();
        $req = $db->query('SELECT * FROM posts');

        return $req;
    }

    function getPostById($id)
    {
        $db = parent::connect();
        $req = $db->query("SELECT * FROM posts WHERE id = '$id'");
        $res = $req->fetch();

        return $res;
    }
}