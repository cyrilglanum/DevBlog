<?php


namespace App\models;


class Comment
{
    public $id;
    public $content;
    public $author;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}