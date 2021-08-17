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
        $userRepo = New UserRepository();
        $user = $userRepo->searchUserByMail($_SESSION['email']);
        $picture = $user[0]->picture;
        return new Response(ob_get_clean());
    }

    public function savePicture(Request $request)
    {
        ob_start();
        $uploaddir = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR;
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        $repo = New UserRepository();
        $userToModify = $repo->searchUserByMail($request->request->get('user'));
        $repo->update("picture",basename($_FILES['file']['name']),$userToModify[0]);


        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
           avec succès.\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
        }

//        print_r($_FILES);


        include __DIR__ . '/../pages/Profil/profil.php';
        return new Response(ob_get_clean());
    }


}