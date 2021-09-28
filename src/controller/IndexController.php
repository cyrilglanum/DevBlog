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

    public function redirect(Request $request)
    {
        dd('hi');

    }

    public function contact(Request $request)
    {
        ob_start();
        $name = $request->attributes->get('name');
        include __DIR__ . '/../pages/contactus.php';
        return new Response(ob_get_clean());
    }

    public function contactus(Request $request): Response
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $messageContact = $request->get('message');

        $messageToSave = new Message([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $messageContact,
        ]);

        $repo = new MessageRepository();
        $repo->saveMessage($messageToSave);
mail('cyril@glanum.com', 'test', 'test');
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp-pulse.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'cyril@glanum.com';                     //SMTP username
            $mail->Password = '24teg7XqSK6pBP';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        dd($mail->smtpConnect());
//        ob_start();
//        include __DIR__ . '/../pages/validation/redirectHome.php';
//        return new Response(ob_get_clean());

    }
}