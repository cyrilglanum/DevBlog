<?php
require __DIR__ .'/partials/header.php';
?>
<header class="masthead" id="home" style="padding-bottom: 40px!important;padding-top:40px">
    <div class="container">
    </div>
</header>
<section>
    <div class="container">
        <h1 class="pt-5">Post <?= $post['id'] ?></h1>
       <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class=" <?= $post['icon'] ?>  fa-stack-1x fa-inverse"></i></span>
                    <br><h4 class="my-3"> <?= $post['title'] ?> </h4>
       <img src ="../../public/images/post/<?= $post['photo'] ?>">
                    <br>

        <fieldset style=" max-width: 60%">
            <?= $post['content']?>
        </fieldset>
                    <br><a href="../comment-post/<?= $post['id']?>">Commenter le post</a></div>
        </div>
</section>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../../src/assets/js/scripts.js"></script>
</body>
</html>
