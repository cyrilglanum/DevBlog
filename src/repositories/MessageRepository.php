<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\Comment;
use App\models\Message;
use Cassandra\Date;
use PDO;

class MessageRepository extends BaseRepository implements RepositoryInterface
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


    public function saveMessage(Message $message)
    {
        $insertmbr = $this->db->prepare("INSERT INTO messages (name, email,subject,message) VALUES(?,?,?,?)");
        $insertmbr->execute(array($message->name, $message->email, $message->subject, $message->message));
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
        $user = $req->fetch();
        return $user;
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