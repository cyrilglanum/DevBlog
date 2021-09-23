<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
?>

<!-- Masthead-->
<header class="masthead" id="home">
    <div class="container">
        <div class="masthead-subheading">Edition DE POST</div>
        <!--        <div class="masthead-heading text-uppercase">DevBlog, l'informatique au quotidien !</div>-->
    </div>
</header>

<!-- Body-->
<div class="container pt-3">
    <form method="POST" action="../editPostValidation" enctype="multipart/form-data">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">

                    <?php dd($comments); ?>
                    <? foreach ($comments as $comment){
                       dd($comment);
                       $comment;
                    }?>

                </div>
            </div>
            <div class="col-md-6">
<!--            --><?php
//            if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
<!--                     <img src ="../public/images/post/--><?//= $postToEdit['photo'] ?><!--">-->
<!--                    --><?php //} else { ?>
<!--                      <img src ="../../public/images/post/--><?//= $postToEdit['photo'] ?><!--">-->
<!--                --><?php //} ?>


                </div>
            </div>
        </div>
        <div class="text-center">
            <div id="success"></div>
            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Modifier le Post</button>
        </div>
    </form>
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
