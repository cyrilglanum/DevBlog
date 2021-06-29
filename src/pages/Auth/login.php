<?php
?>

<h2>Login</h2>
<form method="POST" action="./connexion">

    <div class="input-group">

        <input class="input--style-3" type="email" placeholder="Email" name="email" value="test@test.fr ">

    </div>

    <div class="input-group">

        <input class="input--style-3" type="password" placeholder="Mot de passe" name="password" onerror="class ='danger'">

    </div>

    <div class="p-t-10">

        <button class="btn btn--pill btn--green" type="submit" name="formconnexion">Se connecter</button>

        <a href="./home">
            <button type="button" class="btn btn-light">Menu</button>
        </a>

    </div>


</form>