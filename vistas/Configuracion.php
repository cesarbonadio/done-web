<!--Pagina de configuracion / cambiar contraseña -->
<!DOCTYPE html>
<html>
<head>
  <title>Done! - cambiar contraseña</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../views/images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../views/styles/estiloPagTareas.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://use.fontawesome.com/5643167d36.js"></script>
  <link rel ="stylesheet" href="../views/styles/estilos.css"/>
</head>


<body style ="background-image:none; background-color: #D8D8D8;">



<!-- Container completo -->
<section class = "container">
  <nav id="fondo" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <!-- Logo -->
    <a id="logo" class="navbar-brand" href="bienvenido.php">Done!</a>
    <!-- Links del menu desplegable -->
    <ul class="navbar-nav">
      <!-- Menu desplegable -->
      <li class="nav-item dropdown" >
        <a class="objeto nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="Creartareas.php">Crear tarea</a>
          <a class="dropdown-item" href="Perfil.php">Ver perfil</a>
          <a class="dropdown-item" href="../controladores/logout_controller.php">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </nav>
</section>




<!-- Barra lateral -->
<div id="barra-lateral">
	<div id="logo-menu">
	</div>
	<div id="contenedor-logos-primero" class="contenedor-logos" >

    <a href ="bienvenido.php">
		<div class="logo-perfil">
			</div>
    </a>
    <p class ="title-menu"> <?php include("../controladores/usuario_menu_controller.php"); ?> </p>
	</div>
      <div class="contenedor-logos">
        <a href ="Ayuda.php">
      <div class="logo-ayuda">
      </div>
        </a>
        <p class="title-menu">ayuda</p>
     </div>
     <div class="contenedor-logos">
       <a href ="Configuracion.php">
     <div class="logo-config">
     </div>
      </a>
     <p class="title-menu">Configuración</p>
    </div>
</div>


<!---inicia el formulario-->
 <tr>
 <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
 </tr>
 <br>
 <br>
 <br>
<section class ="container">
  <table style= "margin-left: 15%;">
  <h2>Cambiar Contraseña</h2>
  <form  action="Configuracion.php" method="POST">
    <tr>
      <td id ="identificadorentrada">Contraseña Vieja</td>
      <td><label for="nombre_usuario"></label>
      <input type="password" name="contrasena_vieja" id="contrasena_vieja"  placeholder="Contraseña" autocomplete="off" required></td>
    </tr>
    <tr>
      <td id ="identificadorentrada">Contraseña Nueva</td>
      <td><label for="contrasena_usuario"></label>
      <input type="password" name="contrasena_usuario" id="constrasena_usuario"  placeholder="Constraseña" autocomplete="off" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td> <!--&nbsp crea un espacio horizontal-->
      <td>&nbsp;</td>
    </tr>
  <tr>
  <td colspan="2" align="center"><input name="enviando" type="submit" class="boton" value="Cambiar"/> <td>
  </tr>
     </form>
  </table>
 </section>
<!--termina el formulario-->

  <?php include("../controladores/cambiarcontrasena_controller.php"); ?>

</body>
</html>
