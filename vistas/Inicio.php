<!doctype html>
<html lang="es-VE">



<head>
<link rel="shortcut icon" href="../views/images/favicon.ico">
<title>Done! - Iniciar Sesión</title>
<!--fuentes de google-->
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
<link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
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
    <section class ="container">
     <h3 class="titulo text-center">Done!</h3>
     <h1>Iniciar sesión</h1>
     <form action="../controladores/nav_button_controller.php" method="POST" class="text-center" style="display:inline; margin:0; padding:0;">
       <input name="homepag" type="submit" class="btn boton" id="botonav" value="Home" />
       <input name="registrarsepag" type="submit" class="btn boton" id="botonav" value="Registrarse"/>
       <input name="iniciopag" type="submit" class="btn btn-primary boton" id="botonav" value="Iniciar Sesión"/>
     </form>
    </section>
  </header>





<!---inicia el formulario-->
<section class ="container">
  <h2>Entrar</h2>
  <form  action="Inicio.php" method="POST">
   <table align = "center">
    <tr>
      <td id ="identificadorentrada">Usuario/Correo</td>
      <td><label for="nombre_usuario"></label>
      <input type="text" name="nombre_usuario" id="nombre_usuario"  placeholder="Usuario" autocomplete="off" required></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Contraseña</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="constrasena_usuario"  placeholder="Constraseña" autocomplete="off" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
    </tr>
  <tr>
  <td colspan="2" align="center"><input name="enviando" type="submit" class="boton" value="Entrar"/> <td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input name="olvidecontra" type="submit" class="boton" value="Olvide mi contraseña"  formnovalidate/> <td>
  </tr>
     </form>
</table>
</section>



<?php include("../controladores/Inicio_controller.php") // controlador de inicio de sesion ?>



<section class="container">
<br><br>
<ul>
<li><img id ="icono" src="../views/images/cloud.svg" height="40" width="40"/><b id="descripcion_icon">Si ya tienes una cuenta inicia sesión para ver tus tareas.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/smartphone.svg" height="40" width="40"/><b id="descripcion_icon">Disponible en dispositivos Android.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
</ul>
<br><br>
</section>




<footer>
  <br>
  doneapp
</footer>
</body>




</html>
