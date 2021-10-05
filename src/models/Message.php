<?php


namespace App\models;


class Message
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public function __construct($value = array())
    {
        if (!empty($value))
            $this->hydrate($value);
    }

    /**
     * Hydratation de l'instance.
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
    public function setName($name)
    {
        $this->name = $name;
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
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}