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
    public function selectByTable($columns, $table, $classe)
    {
        return parent::findByTable($columns, $table, $classe);
    }

    public function selectByTableById($columns, $table, $id)
    {
        return parent::findById($columns, $table, $id);
    }


    public function saveComment(Comment $comment)
    {
//        $user->actif = 1;
//        $user->role_id = 1;
//        $user->password = sha1($user->password);
//        $date = new \DateTime();
//        $date->modify('+2 hour');
//        $date = $date->format('Y-m-d H:i:s');
//        $insertmbr = $this->db->prepare("INSERT INTO users (email, password,token_session,token_expire,actif,role_id,created_at) VALUES(?,?,?,?,?,?,?)");
//        $insertmbr->execute(array($user->email, $user->password, $user->token_session, $user->token_expire, $user->actif, $user->role_id, $date));

        return $comment;
    }

    public function remove($table, $id)
    {
        return parent::remove($table, $id);

    }
    #endregion

    #region méthodes
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM comments");
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
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id LIKE '$id' ORDER BY id DESC");
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

    public function addComment($postId, $comment,$author)
    {

        $created_at = date("Y-m-d H:i:s");
        $insertmbr = $this->db->prepare("INSERT INTO comments (post_id, content,author,created_at) VALUES(?,?,?,?)");
        $insertmbr->execute(array($postId, $comment,$author,$created_at));
    }


#endregion
    public function withComments($id)
    {
        $req = $this->db->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC");
        $req->execute(array($id));
        $comments = $req->fetchAll(PDO::FETCH_CLASS, Comment::class);

        return $comments;
    }

}