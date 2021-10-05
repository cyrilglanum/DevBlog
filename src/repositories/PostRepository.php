<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\Post;
use PDO;


class PostRepository extends BaseRepository implements RepositoryInterface
{

    protected $db;

    public function __construct()
    {
        return parent::__construct();
    }

    /**
     * Récupérer un post par id.
     *
     * @return Post
     */
    public function findById($id)
    {
        $req = $this->db->prepare("SELECT * FROM posts WHERE id LIKE '$id'");
        $req->execute();

        return $req->fetch();
    }

    /**
     * Récupérer un post par id.
     *
     * @return Post
     */
    public function find($id)
    {
        $req = $this->db->prepare("SELECT * FROM posts WHERE id LIKE '$id'");
        $req->execute();

        return $req->fetch();
    }

    /**
     * Récupérer tous les posts.
     *
     * @return Post
     */
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM posts ORDER BY id DESC");
        $req->execute();
        $posts = $req->fetchAll(PDO::FETCH_CLASS, Post::class);

        return $posts;
    }

    /**
     * .
     *
     * @return void
     */
    public function save(object $post)
    {

    }

    /**
     * Récupérer tous les commentaires valides d'un post.
     *
     * @return string
     */
    public function remove($table, $postId)
    {
        return parent::remove($table, $postId);
    }

#region méthodes

    /**
     * Sauvegarder un post.
     *
     * @return
     */
    public function savePost(Post $post)
    {
        date_default_timezone_set('Europe/Paris');
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $insertmbr = $this->db->prepare("INSERT INTO posts (title,author,content,post_date,photo,id_statut,id_user) VALUES(?,?,?,?,?,?,?)");
        $insertmbr->execute(array($post->title, $post->author, $post->content, $date, $post->photo, 1, 1));

        return $post;
    }

    /**
     * Récupérer tous les commentaires valides d'un post.
     *
     * @return
     */
    public function update(Post $post)
    {
        if ($post->photo != null) {
            $insertToken = $this->db->prepare("UPDATE posts SET title =?,author =?,content =?, photo=? WHERE id LIKE ?");
            $insertToken->execute(array($post->title, $post->author, $post->content, $post->photo, $post->id));

            return true;
        } elseif ($post->photo == null) {
            $insertToken = $this->db->prepare("UPDATE posts SET title =?,author =?,content =? WHERE id LIKE ?");
            $insertToken->execute(array($post->title, $post->author, $post->content, $post->id));

            return true;
        } else {
            return false;
        }

    }

}