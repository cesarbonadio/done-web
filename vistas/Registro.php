<!doctype html>
<html lang="es-VE">



<head>
<link rel="shortcut icon" href="../views/images/favicon.ico">
<title>Done! - Registrarse</title>
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
<script src="https://use.fontawesome.com/5643167d36.js"></script>
<link rel ="stylesheet" href="../views/styles/estilos.css"/>
<?php //include("../controladores/session_controller.php") //pregunta si la sesión esta abierta?>
</head>





<body>

  <header>
    <section class ="container">
      <h3 class="titulo text-center">Done!</h3>
        <h1>Registrarse</h1>


<form action="../controladores/nav_button_controller.php" method="POST" class="text-center" style="display:inline; margin:0; padding:0;">
    <input name="homepag" type="submit" class="btn boton" id="botonav" value="Home" />
    <input name="registrarsepag" type="submit" class="btn boton" id="botonav" value="Registrarse"/>
    <input name="iniciopag" type="submit" class="btn btn-primary boton" id="botonav" value="Iniciar Sesión"/>
</form>
<!---->
    </section>
  </header>




<?php include("../controladores/Registro_controller_2.php") //validador ?>

<?php include("../controladores/Registro_controller.php") //controlador del registro de usuario ?>



<!-- -inicia el formulario-->
<section class ="container">
<h2>Reg&iacute;strate en Done!</h2>
<form method="post" name="datos_usuario" id="datos_usuario" autocomplete="off" action="Registro.php">
  <table align = "center">
    <tr>
      <td id="identificadorentrada">Nombre</td>
      <td>
        <label for="nombre_persona"></label>
        <input type="text" name="nombre_persona" id="nombre_persona" placeholder="Introduzca su nombre" value="<?php if (isset($_SESSION['nombre_persona'])){ echo $_SESSION['nombre_persona'];} ?>" required><a href="#" data-toggle="tooltip" title="<?php echo $namepErr; ?>">
        </a>
      </td>
    </tr>
    <tr>
      <td id="identificadorentrada">Apellido</td>
      <td>
        <label for="apellido_persona"></label>
        <input type="text" name="apellido_persona" id="apellido_persona" placeholder="Introduzca su apelldo" value="<?php if (isset($_SESSION['apellido_persona'])){ echo $_SESSION['apellido_persona'];} ?>" required>
        <a href="#" data-toggle="tooltip" title="<?php echo $apellidoErr; ?>">
        </a>
      </td>
    </tr>
    <tr>
      <td id ="identificadorentrada">E-mail</td>
      <td><label for="email_usuario"></label>
      <input type="email" name="email_usuario" id="email_usuario" placeholder="Introduzca un email válido" value="<?php if (isset($_SESSION['email_usuario'])){ echo $_SESSION['email_usuario'];} ?>"><a href="#" data-toggle="tooltip" title="" required>
        </a></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Nombre de usuario</td>
      <td><label for="nombre_usuario"></label>
      <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Elija nombre de usuario" value="<?php if (isset($_SESSION['nombre_usuario'])){ echo $_SESSION['nombre_usuario'];} ?>" required><a href="#" data-toggle="tooltip" title="<?php echo $nameErr; ?>">
        </a></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Contraseña</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="contrasena_usuario" placeholder="Elija constraseña" value="<?php if (isset($_SESSION['contrasena_usuario'])){ echo $_SESSION['contrasena_usuario'];} ?>" required=""><a href="#" data-toggle="tooltip" title="<?php echo $passwordErr; ?>">
        </a></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Repetir contraseña</td>
      <td><label for="contrasena_usuario_repetir"></label>
      <input type="password" name="contrasena_usuario_repetir" id="constrasena_usuario_repetir" placeholder="Verificar contraseña" value="<?php if (isset($_SESSION['contrasena_usuario_repetir'])){ echo $_SESSION['contrasena_usuario_repetir'];} ?>" required><a href="#" data-toggle="tooltip" title="<?php echo $password2Err; ?>">
        </a></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Fecha de nacimiento</td>
      <td><label for="fecha_nacimiento"></label>
      <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php if (isset($_SESSION['fecha_nacimiento'])){ echo $_SESSION['fecha_nacimiento'];} ?>" ><a href="#" data-toggle="tooltip" title="">
        </a></td>
    </tr>
    <tr>
      <td>&nbsp;</td> <!-- &nbsp crea un espacio horizontal -->
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit"  name="enviando" id="enviando" value="Registrarse"></td>
    </tr>
  </table>
</form>
</section>
<!-- -termina el formulario-->




<?php //include("../controladores/Registro_controller.php") //controlador del registro de usuario ?>


<!--Cosas de presentacion-->
<section class="container" >
<br><br>
<ul>
<li><img id ="icono" src="../views/images/plus.svg" height="40" width="40"/><b id="descripcion_icon">Añade tareas por hacer.</b> <p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/error.svg" height="40" width="40"/><b id="descripcion_icon">Elimina tareas añadidas.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/success.svg" height="40" width="40"/><b id="descripcion_icon">Marca tus tareas como completadas.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/laptop.svg" height="40" width="40"/><b id="descripcion_icon">Disponible en web.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/smartphone.svg" height="40" width="40"/><b id="descripcion_icon">Disponible en dispositivos Android.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
<li><img id ="icono" src="../views/images/list.svg" height="40" width="40"/><b id="descripcion_icon">Categoriza tus tareas.</b><p id = "descripcion_icon" style ="text-align:none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sagittis, lorem quis cursus ullamcorper, leo leo pharetra risus, et fermentum nibh augue sed mauris. Nunc quis sapien id augue dignissim pellentesque eu ac lacus. Etiam vel diam nec augue pharetra gravida at vel odio.</p></li>
</ul>
<br><br>
</section>


<footer>
  <br>
  doneapp
</footer>

</body>



</html>
