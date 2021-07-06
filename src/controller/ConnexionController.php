<?php

namespace App\controller;

use App\models\Post;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConnexionController extends BaseRepository
{
    public function login(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/login.php';
        return new Response(ob_get_clean());
    }

    public function connexion(Request $request)
    {
        session_start();
        ob_start();
        $db = parent::connect();
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        if (!empty($email) and (!empty($password))) {
            //Mettre les requetes dans un repo (userRepository) $requser = userRepository->findByEmailAndPassword($email, sha1($password);
            $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND password =?");
            $requser->execute(array($email, sha1($password)));
            $userExist = $requser->rowCount();
            if ($userExist != 0) {
                date_default_timezone_set('Europe/Paris');
                $date = new \DateTime();
                $userinfo = $requser->fetch();
                $_SESSION['email'] = $email;
                if ($request->cookies->get('PHPSESSID')) {
                    $userinfo['token_session'] = $request->cookies->get('PHPSESSID');
                } else {
                    $userinfo['token_session'] = $date->getTimestamp() . $email;
                }
                $date->modify('+1 hour');
                $userinfo['token_expire'] = $date->getTimestamp();
                $insertToken = $db->prepare("UPDATE users SET token_session =?,token_expire =? WHERE email LIKE ?");
                $insertToken->execute(array($userinfo['token_session'], $userinfo['token_expire'], $userinfo['email']));
//                $user = new User();
//                $user = $user->getUserByCookie($request);
                include __DIR__ . '/../pages/Auth/connexion.php';
                return new Response(ob_get_clean());
            } else {
                header("Location: ./loginError");
            }
        }
    }

    public function loginError(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/loginError.php';
        return new Response(ob_get_clean());
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
        $repo = new UserRepository(parent::connect());
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $passwordConfirmation = $request->request->get('passwordConfirmation');
        if ($email && strlen($password) >= 4 && $password === $passwordConfirmation) {
            $user = new User();
            $user->email = $email;
            $reqmail = $db->prepare("SELECT * FROM users WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if ($mailexist == 0) {
                // insere l utilisateur dans la table
                $user = new User([
                    'email' => $email,
                    'password' => $password,
                    'token_session' => '0',
                    'token_expire' => 0,
                ]);
                $repo->saveUser($user);
            }
        }

        header("Location: ../login");
    }

    public function deconnexion(Request $request)
    {
        ob_start();
        $db = parent::connect();
        $cookie = $request->cookies->get('PHPSESSID');
        $requser = $db->prepare("UPDATE users SET token_session = '' WHERE token_session LIKE '$cookie'");
        $requser->execute();
        include __DIR__ . '/../pages/Auth/deconnexion.php';
        return new Response(ob_get_clean());
    }


}