<?php
require __DIR__ .'./partials/header.php';
?>


<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 40px!important;padding-top:40px">
    <div class="container">
    </div>
</header>
<div class="container">
    <h1>Espace Administrateur</h1><hr>

    <h3>Section Utilisateurs</h3>
<?php
foreach ($users as $user){
  echo $user->email.' - '. $user->last_name.' - '. $user->first_name.' - '. $user->created_at.
      ' <a href="./deleteUser/' . $user->id . '"<button>Delete</button></a><br>';
}
?>
    <hr>
<h3>Section Posts</h3>

<?php
//foreach ($posts as $post){
//  echo $post->title.' - '.
//      ' <a href="./deletePost/' . $post->id . '"<button>Delete</button></a><br>';
//}
////?>
</div>
<style>
    .nav-link {
        color: black
    }

</style>
