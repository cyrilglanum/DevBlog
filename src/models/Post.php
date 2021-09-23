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

    public function hydrate($data)
    {
        foreach ($data as $attribut => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $attribut)));
            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

//    public function setIcon($icon)
//    {
//        $this->icon = $icon;
//    }

    public function setPost_date($date)
    {
        $this->date = $date;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
}