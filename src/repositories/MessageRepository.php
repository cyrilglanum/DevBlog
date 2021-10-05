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

    /**
     * Sauvegarder un message.
     *
     * @return void
     */
    public function saveMessage(Message $message)
    {
        date_default_timezone_set('Europe/Paris');
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $insertmbr = $this->db->prepare("INSERT INTO messages (name, email,subject,message,created_at) VALUES(?,?,?,?,?)");
        $insertmbr->execute(array($message->name, $message->email, $message->subject, $message->message, $date));
    }

    /**
     * Sauvegarder un message.
     *
     * @return void
     */
    public function deleteMessage(Message $message)
    {
        $insertmbr = $this->db->prepare("INSERT INTO messages (name, email,subject,message,created_at) VALUES(?,?,?,?,?)");
        $insertmbr->execute(array($message->name, $message->email, $message->subject, $message->message, $date));
    }

    #endregion

    #region méthodes
    /**
     * .
     *
     * @return void
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * .
     *
     * @return void
     */
    public function findAll()
    {

    }
}