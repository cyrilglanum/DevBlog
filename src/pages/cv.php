<?php

use App\repositories\UserRepository;

require __DIR__ . '/partials/header.php';
include 'validation/token.php';
//dump($_SESSION['jeton'],$_SESSION['email']);
?>

<!-- Masthead-->
<header class="masthead" id="home">
    <div class="container">
        <div class="masthead-subheading">Bienvenue sur DevBlog!</div>
        <div class="masthead-heading text-uppercase">DevBlog, l'informatique au quotidien !</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Mes posts</a>
    </div>
</header>



<div class="col-lg-12 pt-5 pb-5">
<!--            <p onclick="hide()">Voir mon CV</p>-->
            <div class="cv" style="padding-left: 25%">
                <embed src=../../src/assets/cv.pdf width=1000 height=800 type='application/pdf'/>
            </div>
        </div>

<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="https://www.google.com/search?q=veille+informatique&ei=QCpMYczkFoyOlwTviZXgBA&oq=veille+informatique&gs_lcp=Cgdnd3Mtd2l6EAMyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjoHCAAQRxCwAzoHCAAQsAMQQzoNCC4QxwEQ0QMQsAMQQzoUCC4QgAQQsQMQgwEQxwEQ0QMQkwI6CwgAEIAEELEDEIMBOggIABCxAxCDAToOCC4QgAQQsQMQxwEQ0QM6EQguEIAEELEDEIMBEMcBENEDOgUILhCABDoICAAQgAQQsQM6EQguEIAEELEDEIMBEMcBEKMCOg4ILhCABBCxAxDHARCjAjoECAAQQzoKCAAQsQMQgwEQQzoHCC4QsQMQQ0oECEEYAFC2QlioVmD_VmgGcAJ4AIABuwGIAd0TkgEEMy4xNpgBAKABAcgBCsABAQ&sclient=gws-wiz&ved=0ahUKEwjMhNP9xpTzAhUMx4UKHe9EBUwQ4dUDCA4&uact=5"><img
                                class="img-fluid img-brand d-block mx-auto"
                                src="../../src/assets/img/logos/google.svg"
                                alt="..."/></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="https://www.facebook.com/cyriil.guittet"><img class="img-fluid img-brand d-block mx-auto"
                                                                           src="../../src/assets/img/logos/facebook.svg"
                                                                           alt="..."/></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                Copyright &copy; DevBlog
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/?lang=fr"><i
                            class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i
                            class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/home/?originalSubdomain=fr"><i
                            class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <!--                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>-->
                <!--                <a class="link-dark text-decoration-none" href="#!">Termes du contrat</a>-->

                <?php
                $userRepo = new UserRepository();
                if (isset($_SESSION['email'])) {
                    if ($_SESSION['email'] != []) {
                        $userEmail = $userRepo->searchUserByMail($_SESSION['email']);
                    }
                }

                if (isset($userEmail) != null) {
                    if ($userEmail != []) {
                        if ($userEmail->role_id == 10) {
                            if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                                <a class="nav-link" style="color: black"
                                   href="./index.php/admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                            <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') {
                                ?>
                                <a class="nav-link" style="color: black"
                                   href="../../index.php/admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                                <?php
                            } else { ?>
                                <a class="link-dark text-decoration-none" style="color: black"
                                   href="./admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                            <?php } ?>
                        <?php }

                    }
                }
                ?>

            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../../src/assets/js/scripts.js"></script>
</body>
</html>

