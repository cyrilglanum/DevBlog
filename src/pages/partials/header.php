<?php

use App\repositories\UserRepository;

session_start();
if (isset($_SESSION['email'])) {
    if ($_SESSION['email'] != null) {
        echo 'connecté sous : ' . $_SESSION['email'];
        $userRepo = new UserRepository();
        $user = $userRepo->searchUserByMail($_SESSION['email']);
        $picture = $user->picture;

        $repo = new UserRepository();
        $email = $repo->searchUserByMail($_SESSION['email']);
        $role = $repo->checkRole($email->email);
        if ($role == true) {
            $admin = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Le blog du dev</title>
    <link rel="shortcut icon" href="../../assets/img/logos/favicon-32x32.png">
    <link rel="apple-touch-icon" href="../../assets/img/logos/favicon-32x32.png"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../src/assets/css/styles.css" rel="stylesheet"/>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="padding-top: 50px;">
    <div class="container">
        <img src="../../src/assets/img/logos/logo.png" alt="..." style="width: 100px"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <?php
                if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/INDEX.PHP') {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <?php
                } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item"><a class="nav-link"
                                            href="./home">Home</a></li><?php
                } ?>
                <?php if (isset($_SESSION['email'])) { ?>
                    <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/' && $_SESSION['email'] == 'test@test.fr') { ?>
                        <li class="nav-item"><a class="nav-link" href="./index.php/add-post">Ajout d'un post</a></li>
                    <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/' &&$_SESSION['email'] == 'test@test.fr') { ?>
                        <li class="nav-item"><a class="nav-link" href="../../index.php/add-post">Ajout d'un post</a>
                        </li>
                        <?php
                    } else { ?>
                            <?php if ($_SESSION['email'] == 'test@test.fr') { ?>
                        <li class="nav-item"><a class="nav-link" href="./add-post">Ajout d'un post</a></li>
                    <?php }} ?>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon compte
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="./index.php/profil?email=<?= $_SESSION['email'] ?>">
                                <img src="<?= '../../public/images' . DIRECTORY_SEPARATOR . $picture; ?>"
                                     class="img-thumbnail"></a>
                            <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') {
                                if ($_SESSION['email'] == 'test@test.fr') { ?>
                                    <a class="dropdown-item"
                                       href="./index.php/blogSpace?email=<?= $_SESSION['email'] ?>">Mon
                                        espace Blog</a> <?php
                                } ?>

                                <a class="dropdown-item" href="./index.php/profil<?= $_SESSION['email'] ?>">Profil</a>
                                <a class="dropdown-item"
                                   href="./index.php/deconnexion/<?php echo($_SESSION['email']) ?>">Deconnexion</a>
                            <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') {
                                if ($_SESSION['email'] == 'test@test.fr') { ?>
                                <a class="dropdown-item"
                                   href="../../index.php/blogSpace?email=<?= $_SESSION['email'] ?>">Mon espace
                                        Blog</a><?php } ?>
                                <a class="dropdown-item" href="../../index.php/profil?email=<?= $_SESSION['email'] ?>">Profil</a>
                                <a class="dropdown-item"
                                   href="../../index.php/deconnexion/<?php echo($_SESSION['email']) ?>">Deconnexion</a>
                                <?php
                            } else { ?>
                                <a class="dropdown-item" href="./blogSpace?email=<?= $_SESSION['email'] ?>">Mon espace
                                    Blog</a>
                                <a class="dropdown-item" href="./profil?email=<?= $_SESSION['email'] ?>">Profil</a>
                                <a class="dropdown-item"
                                   href="./deconnexion/<?php echo($_SESSION['email']) ?>">Deconnexion</a>
                            <?php } ?>

                        </div>
                    </div>
                <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                    <li class="nav-item"><a class="nav-link" href="./index.php/login">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="./index.php/inscription">Inscription</a></li>

                    <?php
                } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') { ?>
                    <li class="nav-item"><a class="nav-link" href="../../index.php/login">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../index.php/inscription">Inscription</a></li>
                    <?php
                } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./index.php/login">Connexion</a></li>
                    <li class="nav-item"><a class="nav-link" href="./index.php/inscription">Inscription</a></li>
                <?php } ?>

                <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                    <li class="nav-item"><a class="nav-link" href="./index.php/contact">Contact</a>
                <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') { ?>
                    <li class="nav-item"><a class="nav-link" href="../../index.php/contact">Contact</a></li>
                    <?php
                } else { ?>
                    <li class="nav-item"><a class="nav-link" href="./contact">Contact</a></li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
