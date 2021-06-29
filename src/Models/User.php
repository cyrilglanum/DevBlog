<?php


namespace App\Models;


use App\Controller\BaseController;

class User extends BaseController
{

     public function __construct($value = array())
    {
        if(!empty($value))
            $this->hydrate($value);
    }

     public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set'.str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

     public function getUsers()
    {
        $db = parent::connect();
        $users =  $db->query('SELECT * FROM user');

        return $users;
    }

    public function getUserById($id)
    {
        $db = parent::connect();
        $users =  $db->query("SELECT * FROM user WHERE id = '$id'");

        return $users;
    }



}