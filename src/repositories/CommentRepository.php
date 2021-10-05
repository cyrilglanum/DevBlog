<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\Comment;
use Cassandra\Date;
use PDO;

class CommentRepository extends BaseRepository implements RepositoryInterface
{
    public function __construct()
    {
        return parent::__construct();
    }

    #region méthodes

    /**
     * Validation d'un commentaire
     *
     * @return boolean
     */
    public function validComm($id)
    {
        $req = $this->db->prepare("UPDATE comments SET valid =? WHERE id LIKE ?");
        $req->execute(array(1, $id));

        return true;
    }
    #endregion

    #region méthodes
    /**
     * Trouver tous les commentaires validés
     *
     * @return void
     */
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM comments WHERE valid = 1");
        $req->execute();
        $comments = $req->fetchAll();

        return $comments;
    }

    /**
     * Trouver un commentaire par id
     *
     * @return Comment
     */
    public function find($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE id LIKE '$id'");
        $req->execute();
        $comment = $req->fetch();

        return $comment;
    }

    /**
     * Trouver tous les commentaires qui appartiennent à un Post
     *
     * @return Comment
     */
    public function findByPostId($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id LIKE '$id' AND valid LIKE 1 ORDER BY id DESC");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    /**
     * Trouver tous les commentaires qui appartiennent à un Post qui ne sont pas encore validés.
     *
     * @return Comment
     */
    public function findInvalidCommentsByPostId($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id LIKE '$id' AND valid LIKE 0 ORDER BY id DESC");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    /**
     * Ajouter un commentaire à faire valider.
     *
     * @return void
     */
    public function addComment($postId, $comment, $author)
    {
        $created_at = date("Y-m-d H:i:s");
        $insertmbr = $this->db->prepare("INSERT INTO comments (post_id, content,author,created_at, valid) VALUES(?,?,?,?,?)");
        $insertmbr->execute(array($postId, $comment, $author, $created_at, '0'));
    }


#endregion

    /**
     * Récupérer tous les commentaires valides d'un post.
     *
     * @return void
     */
    public function withComments($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id = ? AND valid = 1 ORDER BY id DESC");
        $req->execute(array($id));
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

}