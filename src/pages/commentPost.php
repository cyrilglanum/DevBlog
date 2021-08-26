<?php
require __DIR__ . '/partials/header.php';


?>
<header class="masthead" id="home" style="padding-bottom: 40px!important;padding-top:40px">

</header>
<div class="container" style="padding-top: 100px">
    <form method="POST" action="postComment" enctype="multipart/form-data">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <?= $post->id ?>
                    <input class="form-control" id="content" name="content" type="text"
                           placeholder="Contenu du commentaire"
                           required="required"/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div id="success"></div>
            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Envoyer le commentaire
            </button>
        </div>
    </form>


</div>

<style>
    .nav-link {
        color: black
    }

</style>
