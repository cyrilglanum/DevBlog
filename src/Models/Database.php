<?php


namespace App\models;


use Symfony\Component\HttpFoundation\Request;

class User
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





    public function getUserByCookie(Request $request)
    {
        $db = parent::connect();
        if ($cookie = $request->attributes->get('_cookie')) {
            $userinfo = $db->prepare("SELECT * from users WHERE token_session LIKE '$cookie'");
            $userinfo->execute();


            if($user != null){
                return $user[0];
            }

        }
        return '';
    }


}