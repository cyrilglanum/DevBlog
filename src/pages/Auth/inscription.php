<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
include $dir . 'src/pages/validation/token.php';
?>

<!-- Masthead-->
<header class="masthead" id="home">
    <div class="container">
        <h2>Inscription</h2>
    <form method="POST" action="inscription/add-user">
                              <input class="input--style-3" id="email" type="email"
                                     placeholder="Email" name="email" required value="<?php if(isset($pseudo)){echo $pseudo;} ?>">

                              <input class="input--style-3" type="password"
                                     placeholder="Mot de passe" name="password" required minlength="4">

                              <input class="input--style-3" type="password"
                                     placeholder="Verif mot de passe" name="passwordConfirmation" required minlength="4">

                          <div class="p-t-10 pt-3">

                              <button class="btn btn-warning" type="submit" name="submit">S'inscrire</button>

                              <a href="../index.php"><button type="button" class="btn btn-light">Menu</button></a>

<!-- envoyer une erreur si les champs ne sont pas complétés -->

  <?php

if (isset($erreur)){

    echo '<font color="red">'.$erreur.'</font>';

}



?>



                          </div>

                      </form>
    </div>
</header>

<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                Copyright &copy; Your Website
                <!-- This script automatically adds the current year to your website footer-->
                <!-- (credit: https://updateyourfooter.com/)-->
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!">
                    <i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!">
                    <i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!">
                    <i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>

<!--                --><?php
//                $userRepo = new UserRepository();
//                $user = $userRepo->searchUserByMail($_SESSION['email']);
//
//                if ($user[0]->role_id == 10) {
//                    if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
<!--                        <li class="nav-item"><a class="nav-link"-->
<!--                                                href="./index.php/admin?email=--><?//= $_SESSION['email'] ?><!--">Espace-->
<!--                                admin</a></li>-->
<!--                    --><?php //} elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') {
//                        ?>
<!--                        <li class="nav-item"><a class="nav-link"-->
<!--                                                href="../../index.php/admin?email=--><?//= $_SESSION['email'] ?><!--">Espace-->
<!--                                admin</a></li>-->
<!--                        --><?php
//                    } else { ?>
<!--                        <a class="link-dark text-decoration-none" href="./admin?email=--><?//= $_SESSION['email'] ?><!--">Espace-->
<!--                            admin</a>-->
<!--                    --><?php //} ?>
<!--                --><?php //} ?>


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



