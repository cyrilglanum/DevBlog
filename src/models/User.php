<?php


namespace App\models;


use App\controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class User extends BaseController
{

    public function __construct($value = array())
    {
        if (!empty($value))
            $this->hydrate($value);
    }

    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    public function getUsers()
    {
        $db = parent::connect();
        $users = $db->query('SELECT * FROM user');

        return $users;
    }

    public function getUserById($id)
    {
        $db = parent::connect();
        $user = $db->query("SELECT * FROM user WHERE id = '$id'");

        return $user;
    }

    public function getUserByCookie(Request $request)
    {
        $db = parent::connect();
        if ($cookie = $request->attributes->get('_cookie')) {
            $userinfo = $db->prepare("SELECT * from users WHERE token_session LIKE '$cookie'");
            $userinfo->execute();
            $user = $userinfo->fetchAll();

            if($user != null){
                return $user[0];
            }

        }
        return '';
    }


}