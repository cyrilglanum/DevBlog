<?php


namespace App\models;


use App\repositories\UserRepository;

class User
{
    public $email;
    public $password;
    public $token_session;
    public $token_expire;
    public $picture;

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