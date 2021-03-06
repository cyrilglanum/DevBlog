<?php

namespace App\controller;

use App\models\Post;
use App\repositories\BaseRepository;
use App\repositories\CommentRepository;
use App\repositories\PostRepository;
use App\repositories\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends BaseRepository
{

    public function postById(Request $request): Response
    {
        ob_start();
        $id = $request->attributes->get('id');
        $repo = new PostRepository();
        //récupération des information du post en question.
        $post = $repo->find($id);
        $commentRepo = new CommentRepository();
        $comments = $commentRepo->withComments($id);
        include __DIR__ . '/../pages/post.php';
        return new Response(ob_get_clean());
    }

    public function addPost(Request $request): Response
    {
        ob_start();
        include __DIR__ . '/../pages/add-post.php';
        return new Response(ob_get_clean());
    }

    public function postForm(Request $request)
    {
        $title = htmlspecialchars($request->request->get('title'));
        $author = htmlspecialchars($request->request->get('author'));
        $content = htmlspecialchars($request->request->get('content'));

        $uploaddir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'post' . DIRECTORY_SEPARATOR;
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo '';
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
        }

        $repo = new PostRepository();
        $postToSave = new Post([
            'title' => $title,
            'author' => $author,
            'content' => $content,
            'photo' => basename($_FILES['file']['name']),
        ]);
        $req = $repo->savePost($postToSave);

        if ($req) {
            ob_start();
            $dir = substr(__DIR__, 0, -11);
            include $dir . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'validation' . DIRECTORY_SEPARATOR . 'validAddPost.php';
            return new Response(ob_get_clean());
        } else {
            die();
        }
    }

    public function blogSpace(Request $request): Response
    {
        ob_start();
        $user = $request->query->get('email');
        $repo = new UserRepository();
        $role = $repo->checkRole($user);
        if ($role == true) {
            $repo = new PostRepository();
            $posts = $repo->findAll();
            include __DIR__ . '/../pages/post/blogSpace.php';
            return new Response(ob_get_clean());
        } else {
            http_response_code(404);
            include __DIR__ . '/../pages/my404.php';
            die();

        }
    }

    public function deletePostById(Request $request): Response
    {
        ob_start();
        if ($request->attributes->get('id') && $request->query->get('jeton')) {
            $idPostToDelete = $request->attributes->get('id');
            $mail = $request->query->get('email');
            $repo = new UserRepository();
            $user = $repo->searchUserByMail($request->query->get('email'));
            if ($request->query->get('jeton') == $user->token_session) {
                $role = $repo->checkRole($mail);
                if ($role == true) {
                    $postRepo = new PostRepository();
                    $postToDelete = $postRepo->remove('posts', $idPostToDelete);
                    include __DIR__ . '../../pages/validation/redirectHome.php';
                    return new Response(ob_get_clean());
                } else {
                    http_response_code(404);
                    include __DIR__ . '/../pages/my404.php';
                    die();
                }
            }
        }
    }

    public function editPostById(Request $request): Response
    {
        ob_start();
        if ($request->attributes->get('id') && $request->query->get('jeton')) {
            $idPostToEdit = $request->attributes->get('id');
            $mail = $request->query->get('email');
            $repo = new UserRepository();
            $user = $repo->searchUserByMail($request->query->get('email'));
            if ($request->query->get('jeton') == $user->token_session) {
                $role = $repo->checkRole($mail);
                if ($role == true) {
                    $postRepo = new PostRepository();
                    $postToEdit = $postRepo->selectByTableById('*', 'posts', $idPostToEdit);
                    include __DIR__ . '../../pages/validation/editPost.php';
                    return new Response(ob_get_clean());
                } else {
                    http_response_code(404);
                    include __DIR__ . '/../pages/my404.php';
                    die();
                }
            }
        }
    }

    public function commentPost(Request $request): Response
    {
        ob_start();
        $repo = new PostRepository();
        $post = $repo->selectByTableById('*', 'posts', $request->attributes->get('id'));
        include __DIR__ . '../../pages/commentPost.php';
        return new Response(ob_get_clean());
    }

    public function addComment(Request $request): Response
    {
        ob_start();
        $email = $request->request->get('email');
        $commentRepo = new CommentRepository();
        $postId = $request->request->get('postId');
        $comment = $request->request->get('content');
        $commentRepo->addComment($postId, $comment, $email);
        include __DIR__ . '../../pages/validation/historyBack2x.php';

        return new Response(ob_get_clean());
    }

    public function editPostValidation(Request $request): Response
    {
        $uploaddir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'post' . DIRECTORY_SEPARATOR;
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo '';
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
        }

        $repo = new PostRepository();

        $post = new Post([
            'id' => $request->request->get('id'),
            'title' => $request->request->get('title'),
            'author' => $request->request->get('author'),
            'content' => $request->request->get('content'),
            'photo' => basename($_FILES['file']['name']),
        ]);

        $req = $repo->update($post);

        if ($req == true) {
            ob_start();
            $dir = substr(__DIR__, 0, -11);
            include $dir . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'validation' . DIRECTORY_SEPARATOR . 'validAddPost.php';
            return new Response(ob_get_clean());
        } else {
            die();
        }


    }
}

