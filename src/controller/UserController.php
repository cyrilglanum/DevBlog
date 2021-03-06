<?php

namespace App\controller;

use App\models\Message;
use App\models\Post;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\MessageRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseRepository
{
    public function profil(Request $request)
    {
        ob_start();
        $userRepo = new UserRepository();

        if (gettype($request->query->get('email')) != "string") {
            ob_start();
            include __DIR__ . '/../pages/my404.php';
            return new Response(ob_get_clean());
        }
        if ($request->query->get('email')) {
            $user = $userRepo->searchUserByMail($request->query->get('email'));
            if (!$user || $user == []) {
                ob_start();
                include __DIR__ . '/../pages/my404.php';
                return new Response(ob_get_clean());
            }
        }

        if ($user->role_id = !10) {
            ob_start();
            include __DIR__ . '/../pages/my403.php';
            return new Response(ob_get_clean());
        }
        //nom de l'image = id + nom de l'image pour ne pas effacer les images des autres.
        $picture = $user->id . $user->picture;
        $messageRepo = new MessageRepository();
        $messages = $messageRepo->selectByTable('*', 'messages', Message::class);
        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }

    public function cv()
    {
        ob_start();
        include __DIR__ . '/../pages/Profil/cv.php';
        return new Response(ob_get_clean());
    }

    public function savePicture(Request $request)
    {
        ob_start();

        $uploaddir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
        $repo = new UserRepository();

        $userToModify = $repo->searchUserByMail($request->request->get('user'));

        $check = $repo->CheckPicture($userToModify);
        $repo->update("picture", $userToModify->id . basename($_FILES['file']['name']), $userToModify);
        $uploadfile = $uploaddir . $userToModify->id . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a ??t?? t??l??charg??
           avec succ??s.\n";
        } else {
            echo "Attaque potentielle par t??l??chargement de fichiers.
          Voici plus d'informations :\n";
        }

        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }

    public function savePassword(Request $request)
    {
        $repo = new UserRepository();
        if ($request->request->get('email') != null) {
            $user = $repo->searchUserByMail($request->request->get('email'));
            if ($user->password == htmlspecialchars(sha1($request->request->get('oldpassword')))) {
                $user->password = sha1($request->request->get('oldpassword'));
            } else {
                ob_start();
                echo "Votre mot de passe n'est pas correct";
                include __DIR__ . '/../pages/my404.php';
                return new Response(ob_get_clean());
            }
        }
        ob_start();
        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }


}