<?php

namespace App\controller;

use App\models\Message;
use App\models\Post;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\MessageRepository;
use App\repositories\PostRepository;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseRepository
{
    public function home(Request $request)
    {
        ob_start();
        //retrouver les données avec postrepo
        $repo = new PostRepository();
        //récupération des posts
        $posts = $repo->findAll();
        $name = $request->attributes->get('name');
        $user = new User();
        include __DIR__ . '/../pages/home.php';
        return new Response(ob_get_clean());
    }

    public function contact(Request $request)
    {
        ob_start();
        $name = htmlspecialchars($request->attributes->get('name'));
        include __DIR__ . '/../pages/contactus.php';
        return new Response(ob_get_clean());
    }

    public function contactus(Request $request): Response
    {
        if($request->get('antibot') != 'antibot'){
           ob_start();
        include __DIR__ . '/../pages/my403.php';
        return new Response(ob_get_clean());
        }
        $name = htmlspecialchars($request->get('name'));
        $email = htmlspecialchars($request->get('email'));
        $subject = htmlspecialchars($request->get('subject'));
        $messageContact = htmlspecialchars($request->get('message'));

        $messageToSave = new Message([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $messageContact,
        ]);

        $repo = new MessageRepository();
        $repo->saveMessage($messageToSave);

        mail('cyril@glanum.com', $subject, $messageContact,["From" => "$email"]);

        ob_start();
        include __DIR__ . '/../pages/validation/redirectHome.php';
        return new Response(ob_get_clean());

    }
}