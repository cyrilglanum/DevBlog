<?php


namespace App\models;


use App\Controller\BaseController;
use PDO;
use Symfony\Component\HttpFoundation\Request;

class User extends BaseController
{

    public $email;
    public $password;
    public $token_session;
    public $token_expire;

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
        if ($cookie = $request->cookies->get('PHPSESSID')) {
            $userinfo = $db->prepare("SELECT * from users WHERE token_session LIKE '$cookie'");
            $userinfo->execute();
            $user = $userinfo->fetchAll();

            if($user != null){
                return $user[0];
            }

        }
        return '';
    }

     public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setTokenSession($token_session)
    {
        $this->token_session = $token_session;
    }

    public function setTokenExpire($token_expire)
    {
        $this->token_expire = $token_expire;
    }


}