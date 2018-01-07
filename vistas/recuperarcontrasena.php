<!--Formulario de prueba-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Done! - Iniciar Sesión</title>
<link rel="shortcut icon" href="../views/images/favicon.ico">

<!--fuentes de google-->
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
<link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel ="stylesheet" href="../views/styles/estilos.css"/>
<?php include("../controladores/session_controller.php") //pregunta si la sesión esta abierta?>
</head>
<body>



  <header>
    <header>
      <section class ="container">
       <h3 class="titulo text-center">Done!</h3>
       <h1>Recupera tu contraseña</h1>
       <form action = "../controladores/nav_button_controller.php"method="POST" class="text-center" style="display:inline; margin:0; padding:0;">
         <input name="iniciopag" type="submit" class="btn boton" id="botonav" value="Atrás" />
       </form>
      </section>
    </header>
  </header>






<!---inicia el formulario-->
<section class ="container">
  <h2>Recuperar Contraseña</h2>
  <form  action="recuperarcontrasena.php" method="POST">
   <table align = "center" style ="background-color: rgba(255, 255, 255  , 0.2);">
     <tr>
       <td id ="identificadorentrada">E-mail</td>
       <td><label for="email_usuario"></label>
       <input type="email" name="email_usuario" id="email_usuario" placeholder="Introduzca un email válido" required>
         </a></td>
     </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <tr>
  <td colspan="2" align="center"><input name="enviando_mail" type="submit" class="boton" value="Enviar email"/> <td>
  </tr>
</table>
</form>
</section>


<?php include("../controladores/recuperarcontrasena_controller.php")?>


<section class="container">
<ul>
<li><img id ="icono" src="../views/images/code.svg" height="40" width="40"/><b id="descripcion_icon">Si olvidaste tu contraseña ingresa tu email de registro.</b><p id = "descripcion_icon" style ="text-align:none;"> Con tu email de registro podremos saber cual es tu contraseña, tu nueva contraseña será enviada a tu correo.</p></li>
</ul>
</section>


</body>
</html>
