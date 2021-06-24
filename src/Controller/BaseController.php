<?php


namespace App\Controller;


use PDO;
use PHPUnit\Util\Exception;

class BaseController
{
    protected function connect()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=expressfood;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $db;
    }

}