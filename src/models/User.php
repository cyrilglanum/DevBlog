<?php


namespace App\models;

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

    /**
     * hydratation de l'instance .
     *
     * @return void
     */
    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setTokenSession($token_session)
    {
        $this->token_session = $token_session;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setTokenExpire($token_expire)
    {
        $this->token_expire = $token_expire;
    }


}