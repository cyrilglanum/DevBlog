<?php
$dir = strrpos(__DIR__, 'src');
$dir = substr(__DIR__, 0, $dir);

require $dir . 'src/pages/validation/token.php';
require $dir . 'src/pages/partials/header.php';

if(!isset($_SESSION['email']) || $_SESSION['email'] == null ){
    ?> <p>Vous n'avez pas accès à cette page si vous n'êtes pas connectés.</p><br><br><br>
    <p style="padding-top: 100px">Veuillez vous connecter ici
        <a href="./login">Connexion</a></p>
    <?php
    }else{


?>
<!-- Masthead-->
<header class="masthead" id="home" style="padding-bottom: 80px!important;padding-top:80px">
    <div class="container">
    </div>
</header>
<div class="container">
    <h1>Votre profil</h1>

    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                   aria-controls="v-pills-home" aria-selected="true">Informations</a>
                <?php if($_SESSION['email'] == "test@test.fr"){ ?>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                   aria-controls="v-pills-messages" aria-selected="false">Messages</a> <?php } ?>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                   aria-controls="v-pills-settings" aria-selected="false">Photo</a>
            </div>
        </div>

        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <form action="savePassword" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   aria-describedby="emailHelp" value="<?= $_SESSION['email'] ?>">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas ces
                                données.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe actuel</label>
                            <input type="password" name="oldpassword" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" name class="btn btn-primary">Soumettre</button>
                    </form>

                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <img src="../src/assets/img/about/1.jpg" alt="..." class="img-thumbnail"></a>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <?php
                    foreach ($messages as $message) {
                        ?>
                       Nom du contact : <?= $message->name ?><br>
                       Email : <?= $message->email ?><br>
                        Objet du message : <?= $message->subject ?><br>
                        <?= $message->message ?><br>
                        <a href="deleteMessage/<?= $message->id ?>?email=<?= $_SESSION['email'] ?>">Supprimer le message</a>
                        <hr>
                    <?php }
                    ?>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                    <form action="savePicture" method="POST" enctype="multipart/form-data">
                        <label for="file">Fichier</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                        <input type="hidden" name="user" value="<?= $_SESSION['email'] ?>">
                        <input type="file" name="file">
                        <button type="submit">Enregistrer</button>

                    </form>
                    <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                        <img src="../public/images/<?= $picture ?>" alt="..." class="img-thumbnail"></a>
                        </li><?php } else { ?>
                        <img src="../../public/images/<?= $picture ?>" alt="..." class="img-thumbnail"></a>
                    <?php } ?>
                    <!--                    <img src="../src/assets/img/about/1.jpg" alt="..." class="img-thumbnail"></a>-->

                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .nav-link {
        color: black
    }

</style>
<?php } ?>