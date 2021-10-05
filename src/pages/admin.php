<?php

//require __DIR__ . './partials/header.php';
//en ligne
require __DIR__ . '/partials/header.php';
?>


<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 0px">
    <div class="container">
    </div>
</header>
<div class="container">
    <h1>Espace Administrateur</h1>
    <hr>

    <h3>Section Utilisateurs</h3>
    <div class=row>
        <?php
        foreach ($users as $user) {
            echo '<div class="col-md-6"> '
                . $user->email . ' - ' . $user->last_name . ' - ' . $user->first_name . ' - ' . $user->created_at .' </div>
                <div class="col-md-6">
                <a href="./deleteUser/' . $user->id . '"<button>Supprimer</button></a><br></div>';
        }
        ?></div>
    <hr>
    <h3>Section Posts</h3>
    <div class=row>
        <?php
        foreach ($posts as $post) {
            echo '<div class="col-md-6"> '
                . $post->title .' </div>
                <div class="col-md-3">
                <a href="./deletePost/' . $post->id . '"<button>Supprimer </button></a></div>
                <div class="col-md-3">
                <a href="./Post/' . $post->id . '"<button> Voir</button></a>
                
                <br></div>';
        }
        ?>
    </div>
</div>
<style>
    .nav-link {
        color: black
    }

</style>
