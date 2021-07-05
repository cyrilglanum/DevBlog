<?php

namespace App\repositories;

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

}