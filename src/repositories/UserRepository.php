<?php


namespace App\repositories;

use App\interfaces\UserRepositoryInterface;
use App\models\User;
use PDO;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    #region méthodes construct
    public function selectByTable($columns, $table)
    {
        return parent::findByTable($columns, $table);
    }

    public function selectByTableById($columns, $table, $id)
    {
        return parent::findById($columns, $table, $id);
    }

    public function saveUser(User $user)
    {
        return parent::saveUser($user);
    }

    public function remove($table, $id)
    {
        return parent::remove($table , $id);

    }
    #endregion

    #region méthodes
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM users");
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
#endregion

}