<?php

namespace App\repositories;

use App\models\User;
use PDO;
use PHPUnit\Util\Exception;

class BaseRepository
{
    protected function connect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=devblog;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $db;
    }

    public function findByTable($columns, $table)
    {
        $req = $this->db->prepare("SELECT $columns FROM $table");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_CLASS,User::class);
        return $users;
    }

    public function findById($columns, $table, $id)
    {
        $req = $this->db->prepare("SELECT $columns FROM $table WHERE id LIKE $id");

        $req->execute();
        $user = $req->fetch();
        return $user;
    }

    public function save(Object $data)
    {

    }

    public function saveUser(User $user)
    {
        $user->actif = 1;
        $user->role_id = 1;
        $user->password = sha1($user->password);
        $date = new \DateTime();
        $date->modify('+2 hour');
        $date = $date->format('Y-m-d H:i:s');
        $insertmbr = $this->db->prepare("INSERT INTO users (email, password,token_session,token_expire,actif,role_id,created_at) VALUES(?,?,?,?,?,?,?)");
        $insertmbr->execute(array($user->email, $user->password, $user->token_session, $user->token_expire, $user->actif, $user->role_id,$date));

        return $user;
    }

    public function remove($table, $dataId)
    {
        $requser = $this->db->prepare("DELETE FROM $table WHERE id = $dataId");
        if($requser == null){
            include __DIR__ .'/../pages/about.php';
        }else{
            $requser->execute();
        }
        return $table.' / '.$dataId;
    }


}