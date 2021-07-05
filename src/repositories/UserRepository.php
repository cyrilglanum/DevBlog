<?php


namespace App\repositories;

use App\models\User;
use PDO;

class UserRepository extends BaseRepository
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users');
        $req->execute();
        $users = $req->fetchAll();
        return $users;
    }

    public function find($id)
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM users WHERE id LIKE '$id' ");
        $req->execute();
        $user = $req->fetch();
        return $user;
    }

    public function save(User $user)
    {
        $this->db->save($user, 'users');

    }

    public function remove(User $user)
    {
        $this->db->remove($user, 'users');

    }
}