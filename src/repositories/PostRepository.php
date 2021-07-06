<?php


namespace App\repositories;

use App\interfaces\UserRepositoryInterface;
use PDO;


class PostRepository extends BaseRepository implements UserRepositoryInterface
{
    public function find($id){

    }
    public function findAll(){}
    public function save($user){}
    public function remove($table,$postId){}

}