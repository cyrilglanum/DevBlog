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

    public function validComm($id)
    {
        $req = $this->db->prepare("UPDATE comments SET valid =? WHERE id LIKE ?");
        $req->execute(array(1, $id));

        return true;
    }
    #endregion

    #region méthodes
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM comments WHERE valid = 1");
        $req->execute();
        $users = $req->fetchAll();

        return $users;
    }

    public function find($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE id LIKE '$id'");
        $req->execute();
        $comment = $req->fetch();

        return $comment;
    }

    public function findByPostId($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id LIKE '$id' AND valid LIKE 1 ORDER BY id DESC");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    public function findInvalidCommentsByPostId($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id LIKE '$id' AND valid LIKE 0 ORDER BY id DESC");
        $req->execute();
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

    public function searchIfMailExists($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM comments WHERE email = ?");
        $reqmail->execute(array($email));
        $mailexist = $reqmail->rowCount();

        return $mailexist;
    }

    public function connectUser($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM comments WHERE email = ?");
        $reqmail->execute(array($email));
        $user = $reqmail->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $user;
    }

    public function searchUserByMail($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM comments WHERE email = ?");
        $reqmail->execute(array($email));
        $user = $reqmail->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $user;
    }

    public function addComment($postId, $comment, $author)
    {
        $created_at = date("Y-m-d H:i:s");
        $insertmbr = $this->db->prepare("INSERT INTO comments (post_id, content,author,created_at, valid) VALUES(?,?,?,?,?)");
        $insertmbr->execute(array($postId, $comment, $author, $created_at, '0'));
    }


#endregion
    public function withComments($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id = ? AND valid = 1 ORDER BY id DESC");
        $req->execute(array($id));
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

}