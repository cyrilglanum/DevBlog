<?php


namespace App\repositories;

use App\interfaces\UserRepositoryInterface;
use PDO;


class PostRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find($id){
        $req = $this->db->prepare("SELECT * FROM posts WHERE id LIKE '$id'");
        $req->execute();
        return $req->fetch();
    }
    public function findAll(){
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM posts");
        $req->execute();
        $posts = $req->fetchAll();

        return $posts;
    }
    public function save($user){}
    public function remove($table,$postId){}

#region méthodes
    public function selectByTable($columns, $table)
    {
        return parent::findByTable($columns, $table);
    }

    public function selectByTableById($columns, $table, $id)
    {
        return parent::findById($columns, $table, $id);
    }
}