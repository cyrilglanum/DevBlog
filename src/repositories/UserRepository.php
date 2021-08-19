<?php


namespace App\repositories;

use App\interfaces\RepositoryInterface;
use App\models\User;
use PDO;

class UserRepository extends BaseRepository implements RepositoryInterface
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


    public function saveUser(User $user)
    {
        $user->actif = 1;
        $user->role_id = 1;
        $user->password = sha1($user->password);
        $date = new \DateTime();
        $date->modify('+2 hour');
        $date = $date->format('Y-m-d H:i:s');
        $insertmbr = $this->db->prepare("INSERT INTO users (email, password,token_session,token_expire,actif,role_id,created_at) VALUES(?,?,?,?,?,?,?)");
        $insertmbr->execute(array($user->email, $user->password, $user->token_session, $user->token_expire, $user->actif, $user->role_id, $date));

        return $user;
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
        $req = $this->db->prepare("SELECT * FROM users WHERE id LIKE '$id'");
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

    public function update($property, $data, $email)
    {
        $updateData = $this->db->prepare("UPDATE users SET $property = '$data' WHERE email = '$email->email'");
        $updateData->execute();
    }

    public function CheckPicture(User $user)
    {
        if ($user->picture) {
            return $user->picture;
        } else {
            return false;
        }
    }

    public function CheckRole($email)
    {

        $user = $this->searchUserByMail($email);

        if ($user[0]->role_id == 10)  {
            return true;
        } else {
            return false;
        }
    }

#endregion

}