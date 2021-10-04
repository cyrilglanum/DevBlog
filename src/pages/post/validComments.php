<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
?>

<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 80px!important;padding-top:80px">
    <div class="container">
        Edition de commentaires
    </div>
</header>

<!-- Body-->
<div class="container pt-3">
    <div class="row align-items-stretch mb-5">
        <div class="col-md-6">
            <div class="form-group">

                <?php if(!$comments){
                ?>
                    <h3>Il n'y a pas de commentaires à valider sur ce post.</h3>
                    <a href="../blogSpace?email=<?= $_SESSION['email'] ?>">Retour au blogspace</a>
                    <?php }
                foreach ($comments as $comment) { ?>
                    <?= $comment->id ?><br>
                    <?= $comment->content ?><br>
                    <?= $comment->author ?><br>
                    <a href="../edit-comments/deleteComm/<?= $comment->id ?>?email=<?= $_SESSION['email'] ?>">Supprimer commentaire</a>
                    <a href="validate/<?= $comment->id ?>?email=<?= $_SESSION['email'] ?>">Valider commentaire</a>
                    <br>
                <?php }
                ?>

            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>


<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                Copyright &copy; Your Website
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
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
