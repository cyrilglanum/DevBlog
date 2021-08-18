<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/partials/header.php';
?>
<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 40px!important;padding-top:40px">
    <div class="container">
    </div>
</header>


<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Sujets</h2>
            <h3 class="section-subheading text-muted">Dans ce blog nous vous proposons des articles sur</h3>
        </div>
        <div class="row text-center">

            <?php
            //Récupération de tout les posts
            foreach ($posts as $post){
                ?>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class=" <?= $post->icon ?>  fa-stack-1x fa-inverse"></i></span>
                    <br><h4 class="my-3"> <?= $post->title ?> </h4>
                    <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                     <img src ="../public/images/post/<?= $post->photo ?>">
                    <?php } else { ?>
                     <img src ="../../public/images/post/<?= $post->photo ?>">
                <?php } ?>

                    <br><?= $post->content ?>

                    <br><a href="./post/<?= $post->id ?>">Voir le post</a>
                    <br><a href="./delete-post/<?= $post->id ?>">Supprimer le post</a>
                    <br><a href="./edit-post/<?= $post->id ?>">Modifier le post</a></div>
            <?php
            }
            ?>


        </div>
    </div>
</section>