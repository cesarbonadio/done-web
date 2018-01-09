<?php
include("../modelos/Usuario.php");
include("../vistas/scripts/Alerta.php");




 if (isset($_POST["enviando"])) { // si presiono para iniciar sesión

  $nombre=$_POST["nombre_usuario"];
  $clave=$_POST["contrasena_usuario"];


  $usuario = new Usuario();
  $usuario = Usuario::conInicio($nombre,$clave);
  $codigo = $usuario->transformtoJson_inicio();


  switch ($codigo[0]) {

    case '1':
      # code...
      $alert = new Alerta("Usuario no registrado", ", Revise e intentelo de nuevo");
      $alert->mostrar();
      break;

    case '2':
      # code...
      $alert = new Alerta("Contraseña incorrecta", ", Revise e intentelo de nuevo");
      $alert->mostrar();
      break;

    case '3':
      # code...
      $alert = new Alerta("Usuario Bloqueado", ", Necesita recuperar su contraseña ");
      $alert->mostrar();
      break;

    case '0':
      # code...
      session_start();
      $_SESSION['username'] = $nombre;
      $_SESSION['token'] = $codigo[1];
      $url='../vistas/bienvenido.php';
      header("Location: $url");
      break;

    default:
      # code...
      $alert = new Alerta("Algo salió mal :(", ", Los servicios de Done no están disponibles");
      $alert->mostrar();
      break;
  }
 }


 else if (isset($_POST["olvidecontra"])){// si presiono para recuperar contraseña
 $url ="../vistas/recuperarcontrasena.php";
 header("Location: $url");
 }
?>
