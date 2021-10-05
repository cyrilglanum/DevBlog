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
        $insertmbr = $this->db->prepare("INSERT INTO messages (name, email,subject,message) VALUES(?,?,?,?)");
        $insertmbr->execute(array($message->name, $message->email, $message->subject, $message->message));
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