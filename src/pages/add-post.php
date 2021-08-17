<?php require __DIR__ . '/partials/header.php';
?>

<!-- Masthead-->
<header class="masthead" id="home">
    <div class="container">
        <div class="masthead-subheading">AJOUT DE POST</div>
        <!--        <div class="masthead-heading text-uppercase">DevBlog, l'informatique au quotidien !</div>-->
    </div>
</header>

<!-- Body-->
<div class="container pt-3">
    <form method="POST" action="postForm" enctype="multipart/form-data">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="title" name="title" type="text" placeholder="Titre du post"
                           required="required"/>
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group"><a target="_blank"
                                           href="https://fontawesome.com/v5.15/icons?d=gallery&p=2">Icon</a>
                    <input class="form-control" id="icon" name="icon" type="input" placeholder="fab fa-500px"
                           required="required"/>
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" id="author" name="author" type="input" placeholder="Auteur"
                           required="required"/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" id="content" name="content" placeholder="Your Message *"
                                  required="required"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="col-md-6">
                <label for="file">Fichier</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                <input type="hidden" name="user" value="<?= $_SESSION['email'] ?>">
                <input type="file" name="file">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
        <div class="text-center">
            <div id="success"></div>
            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Envoyer le Post</button>
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
