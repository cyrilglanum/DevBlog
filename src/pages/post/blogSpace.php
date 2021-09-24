<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
?>

<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 80px!important;padding-top:80px">
    <div class="container">
        Blogspace
    </div>
</header>



    <div class="container pt-3">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Vos posts</h2>
            <h3 class="section-subheading text-muted">Section administrateur</h3>
        </div>
        <div class="row text-center">

            <?php
            //Récupération de tout les posts
            foreach ($posts as $post) {
                ?>
                <div class="col-md-4">
                    <br><h4 class="my-3"> <?= $post->title ?> </h4>
                    <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                        <img width="100%" src="../public/images/post/<?= $post->photo ?>">
                    <?php } else { ?>
                        <img width="100%" src="../../public/images/post/<?= $post->photo ?>">
                    <?php } ?>

                    <br><?= $post->content ?>

                    <br><a href="./post/<?= $post->id ?>">Voir le post</a>
                    <br><a href="./delete-post/<?= $post->id ?>?email=<?= $_SESSION['email'] ?>">Supprimer le post</a>
                    <br><a href="./edit-post/<?= $post->id ?>?email=<?= $_SESSION['email'] ?>">Modifier le post</a>
                    <br><a href="./edit-comments/<?= $post->id ?>?email=<?= $_SESSION['email'] ?>">Modifier les
                        commentaires</a>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
