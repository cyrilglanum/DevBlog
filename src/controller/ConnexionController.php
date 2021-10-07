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
    public function login(Request $request):Response
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/login.php';
        return new Response(ob_get_clean());
    }

    public function connexion(Request $request)
    {
        session_start();
        ob_start();
        $repo = new UserRepository();
        $email = htmlspecialchars($request->request->get('email'));
        $password = $request->request->get('password');
        if (!empty($email) and (!empty($password))) {
            $userExist = $repo->searchIfMailExists($email);
            if ($userExist != 0) {
                $userinfo = $repo->searchUserByMail($email);
                if ($userinfo->password == sha1($password)) {
                    $_SESSION['email'] = $email;
                    $repo->updateCookies($email);
                    include __DIR__ . '/../pages/Auth/connexion.php';
                    return new Response(ob_get_clean());
                } else {
                    header("Location: ./loginError");
                }
            }
            header("Location: ./loginError");
        }
        return "Vous n'êtes pas là ou vous devriez être :o !";
    }

    public function loginError(Request $request):Response
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/loginError.php';
        return new Response(ob_get_clean());
    }


    public function inscription(Request $request):Response
    {
        ob_start();
        include __DIR__ . '/../pages/Auth/inscription.php';
        return new Response(ob_get_clean());
    }

    public function AddUserToBdd(Request $request)
    {
        $repo = new UserRepository();
        $email = htmlspecialchars($request->request->get('email'));
        $password = htmlspecialchars($request->request->get('password'));
        $passwordConfirmation = $request->request->get('passwordConfirmation');
        if ($email && strlen($password) >= 4 && $password === $passwordConfirmation) {
            $user = new User();
            $user->email = $email;
            $user->password = sha1($password);
            $mailexist = $repo->searchIfMailExists($email);
            if ($mailexist == 0) {
                // insere l utilisateur dans la table
                $userToInsert = new User([
                    'email' => $email ,
                    'password' => $password ,
                    'token_session' => '0',
                    'token_expire' => 0,
                ]);
                $repo->saveUser($userToInsert);
            } else {
                header("Location: ../inscription");
                die();
            }
        }
        header("Location: ../login");
    }

    public function deconnexion($email,Request $request):Response
    {
        ob_start();
        $repo = new UserRepository();
        $repo->deleteTokenSession($email);
        include __DIR__ . '/../pages/Auth/deconnexion.php';
        return new Response(ob_get_clean());
    }


}