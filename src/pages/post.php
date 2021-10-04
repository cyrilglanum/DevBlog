<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
?>

    <!-- Masthead-->
    <header class="masthead" id="home" style="padding-bottom: 80px!important;padding-top:80px">
        <div class="container">
        </div>
    </header>
    <section>
        <?php if (!$post){
            echo "<div class ='container'>L'article que vous cherchez a été supprimé</div>";
        }else{ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="pt-5">Post <?= $post['id'] ?></h1>
                    <br><h4 class="my-3"> <?= $post['title'] ?> </h4>
                    <img src="../../public/images/post/<?= $post['photo'] ?>" style="width: 60%">
                    <br>
                    <fieldset style=" max-width: 60%" class="pt-3">
                        <?= $post['content'] ?>
                    </fieldset>
                    <br>
                    Posté le <?= $post['post_date'] ?>
                    <?php
                    if (isset($_SESSION['email'])){
                    if ($_SESSION['email'] != null){ ?>
                    <br><a href="../comment-post/<?= $post['id'] ?>">Commenter le post</a></div>
                <?php
                }
                } ?>
                <div class="col-md-6">
                    <?php
                    foreach ($comments as $comment) {
                        ?>
                        <?= $comment->content ?><br>
                        <?php
                        if ($comment->author != null) {
                            ?>
                            <em style="font-size: smaller">Ecrit par
                            <?= $comment->author;
                        } ?>
                        <?php if ($comment->created_at != null) { ?>
                            le
                            <?= $comment->created_at;
                        } ?><br></em>
                        <hr>
                        <?php
                    }
                    ?>
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
<?php } ?>