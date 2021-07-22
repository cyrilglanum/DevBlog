<?php
require_once '../../vendor/autoload.php';
require __DIR__ .'./partials/header.php';

//rendu du template
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => '/path/to/compilation_cache',
]);
echo $twig->render('index.html.twig', ['the' => 'variables', 'go' => 'here']);

