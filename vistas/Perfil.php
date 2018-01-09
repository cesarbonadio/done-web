<!--Pagina de ayuda con sesión iniciada -->
<!DOCTYPE html>
<html>
<head>
  <title>Done! - Ver Perfil</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../views/images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
  <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../views/styles/estiloPagTareas.css">
  <link rel="stylesheet" type="text/css" href="../views/styles/estilosPerfil.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://use.fontawesome.com/5643167d36.js"></script>
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
     <p class="title-menu">configuracion</p>
      </div>
</div>





<div id="body" class = "container">
			<div id="texto">
				<p id="texto-contenedor-1">Perfil de Usuario</p>
        <img id="imagenPerfil" src ="../views/images/userp.svg" height="150" width="150"/>
        <p id="texto-contenedor-1" style = "font-size:20px; background-color: rgba(250, 250, 250  , 0.5);">

        <?php



           if (isset($_SESSION['token'])){

             $token = new Token($_SESSION['token']);
             $DatosUsuario = $token->ConsultarDatosUsuario();

             echo "Nombre: ".$DatosUsuario[3]. "<br>";
             echo "Apellido: ".$DatosUsuario[4]. "<br>";
             echo "ID: ".$DatosUsuario[0]. "<br>";
             echo "Correo de registro: ".$DatosUsuario[1]. "<br>";
             echo "Nombre de Usuario: ".$DatosUsuario[2]. "<br>";
             echo "Fecha de Nacimiento: ".substr($DatosUsuario[5], 0, -14). "<br>";
           }

         ?>
        </p>
      </div>
</div>



</body>
</html>
