<?php


namespace App\Models;


use App\Controller\BaseController;

class Post extends BaseController
{
    function getPosts()
    {
        $db = parent::connect();
        $post = array();
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