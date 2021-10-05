<?php

namespace App\controller;

use App\models\Message;
use App\models\User;
use App\repositories\BaseRepository;
use App\repositories\MessageRepository;
use App\repositories\PostRepository;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends BaseRepository
{
    public function home(Request $request): Response
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

    public function contact(Request $request): Response
    {
        ob_start();
        $name = htmlspecialchars($request->attributes->get('name'));
        include __DIR__ . '/../pages/contactus.php';
        return new Response(ob_get_clean());
    }

    public function contactus(Request $request): Response
    {
        if ($request->get('antibot') != 'antibot') {
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

        require 'PHPMailer/src/PHPMailer.php';
        require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';


        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = 2;
            $mail->IsSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.welred.ie';                 // Specify main and backup server
            $mail->Port = 465;                                    // Set the SMTP port
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'contact@welred.ie';                // SMTP username
            $mail->Password = 'Password';                  // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

            $mail->From = 'contact@welred.ie';
            $mail->FromName = 'Wel Red';
            $mail->AddAddress($email);  // Add a recipient

//        mail('cyril@glanum.com', $subject, $messageContact,["From" => "$email"]);

            ob_start();
            include __DIR__ . '/../pages/validation/redirectHome.php';
            return new Response(ob_get_clean());

        }catch (Exception $exception){
        }
    }
}