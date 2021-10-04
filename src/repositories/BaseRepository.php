<?php

namespace App\repositories;

use PDO;
use PHPUnit\Util\Exception;

class BaseRepository
{
    protected $db;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=devblog;charset=utf8', 'root', '');
//            $this->db = new PDO('mysql:host=ventouxiwephare.mysql.db;dbname=ventouxiwephare;charset=utf8', 'ventouxiwephare', 'Requine86');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function selectByTable($columns, $table, $classe)
    {
        $req = $this->db->prepare("SELECT $columns FROM $table");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_CLASS, $classe);

        return $users;
    }

    public function selectByTableById($columns, $table, $id)
    {
        $req = $this->db->prepare("SELECT $columns FROM $table WHERE id LIKE $id");
        $req->execute();
        $data = $req->fetch();

        return $data;
    }

    public function save(Object $data)
    {
    }

    public function remove($table, $dataId)
    {
        $req = $this->db->prepare("DELETE FROM $table WHERE id = $dataId");
        if($req == null){
            include __DIR__ .'/../pages/my404.php';
        }else{
            $req->execute();
        }
        return $table.' / '.$dataId;
    }


}