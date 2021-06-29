<?php

namespace App\Controller;

use App\Models\Post;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnexionController extends BaseController
{
    public function login(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/login.php';
        return new Response(ob_get_clean());
    }

    public function connexion(Request $request)
    {
        $db = parent::connect();
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        if(!empty($email) AND (!empty($password))) {
            $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND password =?");
            $requser->execute(array($email, sha1($password)));
            $userexist = $requser->rowCount();
            if ($userexist != 0) {
                $userinfo = $requser->fetch();
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['connect'] = true;

//            header("Location:index.php?mailutilisateur=".$_SESSION['mailutilisateur']);
                header("Location: ./home",['userinfo' => $userinfo]);
            } else {
                header("Location: ./login");
            }
        }
    }

     public function inscription(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/inscription.php';
        return new Response(ob_get_clean());
    }

    public function AddUserToBdd(Request $request)
    {
        $db = parent::connect();
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $passwordConfirmation = $request->request->get('passwordConfirmation');
        if($email && strlen($password)>=4 && $password === $passwordConfirmation ){
            $user = new User();
            $user->email = $email;
            $user->password = sha1($password);
            $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
                        $reqmail->execute(array($email));
                        $mailexist= $reqmail->rowCount();
                        if ($mailexist == 0){
                            // insere l utilisateur dans la table
                                $insertmbr = $db->prepare("INSERT INTO users (email, password) VALUES(?,?)");
                                $insertmbr->execute(array($email, $user->password));
                                $insertuser = $db->prepare("INSERT INTO users (role_id)VALUES(?)");
                                $insertuser->execute(array('1'));
                        }
        }

        header("Location: ../login");
    }

    public function deconnexion(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/deconnexion.php';
        return new Response(ob_get_clean());
    }

}