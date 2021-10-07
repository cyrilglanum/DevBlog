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

    /**
     * Sauvegarder un utilisateur.
     *
     * @return User
     */
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

    /**
     * supprimer un utilisateur.
     *
     * @return void
     */
    public function remove($table, $id)
    {
        return parent::remove($table, $id);
    }
    #endregion

    #region méthodes
    /**
     * Trouver tous les utilisateurs.
     *
     * @return User
     */
    public function findAll()
    {
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM users");
        $req->execute();
        $users = $req->fetchAll();

        return $users;
    }

    /**
     * Trouver un utilisateur par id.
     *
     * @return User
     */
    public function find($id)
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE id LIKE '$id'");
        $req->execute();
        $user = $req->fetch();

        return $user;
    }

    /**
     * Regarder si un utilisateur existe.
     *
     * @return string
     */
    public function searchIfMailExists($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $reqmail->execute(array($email));
        $mailexist = $reqmail->rowCount();

        return $mailexist;
    }

    /**
     * Rechercher un utilisateur par mail.
     *
     * @return string
     */
    public function searchUserByMail($email)
    {
        $reqmail = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $reqmail->execute(array($email));
        $user = $reqmail->fetchAll(PDO::FETCH_CLASS, User::class);

        return $user[0];
    }

    /**
     * Rafraichir les cookies.
     *
     * @return void
     */
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

    /**
     * Regarder si un utilisateur existe.
     *
     * @return void
     */
    public function deleteTokenSession($email)
    {
        $requser = $this->db->prepare("UPDATE users SET token_session = '' WHERE email = '$email'");
        $requser->execute();
    }

    /**
     * Regarder si un utilisateur existe.
     *
     * @return void
     */
    public function update($property, $data, $email)
    {
        $updateData = $this->db->prepare("UPDATE users SET $property = '$data' WHERE email = '$email->email'");
        $updateData->execute();
    }

    /**
     * Regarder si un utilisateur existe.
     *
     * @return boolean
     */
    public function CheckPicture(User $user)
    {
        if ($user->picture) {
            return $user->picture;
        } else {
            return false;
        }
    }

    /**
     * Regarder si un utilisateur existe.
     *
     * @return boolean
     */
    public function CheckRole($email)
    {

        $user = $this->searchUserByMail($email);

        if ($user->role_id == 10) {
            return true;
        } else {
            return false;
        }
    }

#endregion

}