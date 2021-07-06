<?php


namespace App\repositories;

use App\interfaces\UserRepositoryInterface;
use App\models\User;
use PDO;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    #region méthodes construct
    public function selectByTable($columns, $table)
    {
        return parent::findByTable($columns, $table);
    }

    public function selectByTableById($columns, $table, $id)
    {
        return parent::findById($columns, $table, $id);
    }

    public function saveUser(User $user)
    {
        return parent::saveUser($user);
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
        $req = $db->prepare("SELECT * FROM users");
        $req->execute();
        $users = $req->fetchAll();

        return $users;
    }

    public function find($id)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE id LIKE '$id' ");
        $req->execute();
        $user = $req->fetch();
        return $user;
    }

    public function searchIfMailExists($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $reqmail->execute(array($email));
        $mailexist = $reqmail->rowCount();
        return $mailexist;
    }

    public function connectUser($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $reqmail->execute(array($email));
        $user = $reqmail->fetchAll(PDO::FETCH_CLASS, User::class);
        return $user;
    }

    public function searchUserByMail($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $reqmail->execute(array($email));
        $user = $reqmail->fetchAll(PDO::FETCH_CLASS, User::class);
        return $user;
    }

    public function updateCookies($email)
    {
        date_default_timezone_set('Europe/Paris');
        $date = new \DateTime();
        $userinfo['token_session'] = $date->getTimestamp() . $email;
        $date->modify('+1 hour');
        $userinfo['token_expire'] = $date->getTimestamp();
        $insertToken = $this->db->prepare("UPDATE users SET token_session =?,token_expire =? WHERE email LIKE ?");
        $insertToken->execute(array($userinfo['token_session'], $userinfo['token_expire'], $email));
    }
    public function deleteTokenSession($email)
    {
        $requser = $this->db->prepare("UPDATE users SET token_session = '' WHERE email = '$email'");
        $requser->execute();
    }



#endregion

}