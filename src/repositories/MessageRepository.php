<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\Message;

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

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }
}