<?php

namespace App\controller;

use App\models\Post;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseRepository
{
    public function profil(Request $request)
    {
        ob_start();
        include __DIR__ . '/../pages/Profil/profil.php';
        $userRepo = new UserRepository();
        $user = $userRepo->searchUserByMail($_SESSION['email']);
        //nom de l'image = id + nom de l'image pour ne pas effacer les images des autres.
        $picture = $user[0]->id. $user[0]->picture;
        return new Response(ob_get_clean());
    }

    public function savePicture(Request $request)
    {
        ob_start();

        $uploaddir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
        $repo = new UserRepository();
        $userToModify = $repo->searchUserByMail($request->request->get('user'));

        $check = $repo->CheckPicture($userToModify[0]);
        $repo->update("picture", $userToModify[0]->id. basename($_FILES['file']['name']), $userToModify[0]);
        $uploadfile = $uploaddir . $userToModify[0]->id . basename($_FILES['file']['name']);

            if ($uploaddir . $check  != null) {
                unlink($uploaddir . $check );
            }
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
           avec succès.\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
        }

        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }


}