<html>
  <head>
    <script type="text/javascript">
      function RedirectionJavascript(){
        window.history.back();
      }
   </script>
  </head>
  <body onLoad="setTimeout('RedirectionJavascript()', 2000)">

<div class="container" style="background-color: #21242d"> <div style="color: green;font-size: 30px; padding-top: 15px">Votre action a bien été réalisée,
         vous allez être redirigé !</div></div>


    <div id="loader" style="width: 100%; height: 100%"></div>
    <div id="content">

    </div>
    <script>
      var preloader = document.getElementById('loader');
      function preLoaderHandler(){
          preloader.style.display = 'none';
      }
    </script>

  </body>
<style>#loader{
	position: fixed;
	width: 100%;
	height: 100vh;
	background: #21242d url('https://cssauthor.com/wp-content/uploads/2018/06/Bouncy-Preloader.gif') no-repeat center;
	z-index: 999;
}</style>
</html>