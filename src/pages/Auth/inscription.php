    <form method="POST" action="inscription/add-user">
                      <div class="input-group">

                              <input class="input--style-3" id="email" type="email" placeholder="Email" name="email" required value="<?php if(isset($pseudo)){echo $pseudo;} ?>">

                          </div>

<!--                          <input type="button" onclick="testcarac()" value="controler" style="background-color:black; color:white;" >-->

                          <div class="input-group">

<!--                              <input class="input--style-3" type="email" placeholder="Retapez votre mail" name="pseudo2" value ="--><?php //if(isset($pseudo)){echo $pseudo;} ?><!--">-->

                          </div>



                          <!-- texte ajouté avvec la verif en js -->

                          <!-- <input type="text" id="text" onkeypress="verifierCaracteres(event); return false;"> -->

                            

                            <!-- fin du texte ajouté -->



                          <div class="input-group">

                              <input class="input--style-3" type="password" placeholder="Mot de passe" name="password" required minlength="4">

                          </div>

                          <div class="input-group">

                              <input class="input--style-3" type="password" placeholder="Verif mot de passe" name="passwordConfirmation" required minlength="4">

                          </div>

                          <div class="input-group">

<!--                              <input class="input--style-3 js-datepicker" type="text" placeholder="Date de naissance" name="birthday" value ="--><?php //if(isset($birthday)){echo $birthday;} ?><!--">-->

                              <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>

                          </div>

                          <div class="p-t-10">

                              <button class="btn btn--pill btn--green" type="submit" name="submit">Submit</button>

                              <a href="./home"><button type="button" class="btn btn-light">Menu</button></a>

                             

                             

                   



<!-- envoyer une erreur si les champs ne sont pas complétés -->

  <?php 

if (isset($erreur)){

    echo '<font color="red">'.$erreur.'</font>';

}



?>



                          </div>

                      </form>