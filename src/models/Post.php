<?php


namespace App\models;


class Post
{
    public $id;
    public $title;
    public $author;
    public $content;
    public $photo;

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
    public function setTitle($title)
    {
        $this->title = $title;
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

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setPost_date($date)
    {
        $this->date = $date;
    }

    /**
     * Setter / hydrate.
     *
     * @return void
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}