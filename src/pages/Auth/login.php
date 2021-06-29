<?php
?>

<h2>Login</h2>

<?php
  // si il y a validation du formulaire
  if(isset($_POST['formconnexion'])){
      $mailconnect= htmlspecialchars($_POST['mailconnect']);
      $mdpconnect = sha1($_POST['mdpconnect']);
// si les champs ne sont pas vides
      if(!empty($mailconnect) AND (!empty($mdpconnect))){
          $requser = $bdd ->prepare ("SELECT * FROM client WHERE mailutilisateur = ? AND mdp =?");
          $requser ->execute(array($mailconnect, $mdpconnect));
          $userexist = $requser->rowCount();
// si l utilisateur existe alors on rentre dans son profil
          if ($userexist==1)
          {

            $userinfo= $requser->fetch();
            $_SESSION['mailutilisateur']= $userinfo['mailutilisateur'];
            $_SESSION['connect']  = true;
            header("Location:inscriptionrestaurant.php");
          }
          else
          {
            $_SESSION['connect']  = false;
            $erreur = "mauvais mot de passe ou identifiant";
          }
      }
      else{
          $erreur ="tout les champs doivent etre complétés";
      }
  }
   ?>