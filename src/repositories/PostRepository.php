<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\Post;
use PDO;


class PostRepository extends BaseRepository implements RepositoryInterface
{

    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function find($id){
        $req = $this->db->prepare("SELECT * FROM posts WHERE id LIKE '$id'");
        $req->execute();
        return $req->fetch();
    }
    public function findAll(){
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM posts");
        $req->execute();
        $posts = $req->fetchAll();

        return $posts;
    }
    public function save(Object $post){

    }

    public function remove($table,$postId){}

#region méthodes
    public function savePost(Post $post)
    {
        date_default_timezone_set('Europe/Paris');
        $date = new \DateTime();
        $insertmbr = $this->db->prepare("INSERT INTO posts (title, icon,author,content,post_date) VALUES(?,?,?,?,?)");
        $insertmbr->execute(array($post->title, $post->icon, $post->author, $post->content,$date));

        return $post;
    }

    public function selectByTable($columns, $table)
    {
        return parent::findByTable($columns, $table);
    }

    public function selectByTableById($columns, $table, $id)
    {
        return parent::findById($columns, $table, $id);
    }
}