<?php
session_start();
?>

<html>
  <head>
    <script type="text/javascript">
      function RedirectionJavascript(){
        window.history.back();
      }
   </script>
  </head>
  <body onLoad="setTimeout('RedirectionJavascript()', 1500)">
     <div class="container"> <div style="color: green"><h2>Deconnexion</h2>
             Vous êtes bien déconnecté !
         vous allez être redirigé !</div></div>
  </body>
</html>

<?php
session_destroy();?>