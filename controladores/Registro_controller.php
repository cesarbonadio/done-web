
<?php
session_start();
if (isset($_SESSION['username'])){ // pregunta si la sesión esta iniciada para redireccionarte a bienvenido.php y no a las demas
 $url='../vistas/bienvenido.php';
header("Location: $url");
}
include("../modelos/Usuario.php");
include("../modelos/Token.php");
include("../vistas/scripts/Alerta.php");
include("../Correo.php");


if (isset($_POST["enviando"])) {

  $_SESSION["email_usuario"] = $email;
  $_SESSION["fecha_nacimiento"] = $nacimiento;
  $_SESSION["nombre_persona"] = $nombrep;
  $_SESSION["apellido_persona"] = $apellido;
  $_SESSION["nombre_usuario"] = $nombre;
  $_SESSION["contrasena_usuario"] = $pass;
  $_SESSION["contrasena_usuario_repetir"] = $pass2;
  if ($pass!=$pass2){
    $alert = new Alerta ("No puedes registrarte,", "Las contraseñas no coinciden");
    $alert->mostrar();
    unset($_SESSION["contrasena_usuario_repetir"]);
  }
  else
  {
  $usuario = new Usuario();
  $usuario = Usuario::conRegistro($nombrep,$apellido,$nombre,$pass,$pass2,$email,$nacimiento);
  $codigo = $usuario->transformToJson_registro();


  switch ($codigo) {

    case '4':
    #USUARIO YA EXISTE
    $alert = new Alerta("No puedes registrarte,", "Ese usuario ya existe");
    $alert->mostrar();
    unset($_SESSION["nombre_usuario"]);
    break;

    case '24':
    #MENOR A 18
    $alert = new Alerta("No puedes registrarte,", "Eres menor de edad");
    $alert->mostrar();
    unset($_SESSION["fecha_nacimiento"]);
    break;

    case '5':
    #CORREO EN USO
    $alert = new Alerta ("No puedes registrarte,", "Ese correo ya está en uso");
    $alert->mostrar();
    unset($_SESSION["email_usuario"]);
    break;

    case '10':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Muchos caracteres en el nombre de usuario");
    $alert->mostrar();
    unset($_SESSION["nombre_usuario"]);
    break;

    case '17':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Muchos caracteres en el nombre");
    $alert->mostrar();
    unset($_SESSION["nombre_persona"]);
    break;

    case '20':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Muchos caracteres en el apellido");
    $alert->mostrar();
    unset($_SESSION["apellido_persona"]);
    break;

    case '13':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Esa Contraseña es demasiado larga");
    $alert->mostrar();
    unset($_SESSION["contrasena_usuario"]);
    unset($_SESSION["contrasena_usuario_repetir"]);
    break;

    case '9':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Ese correo es muy largo");
    $alert->mostrar();
    unset($_SESSION["email_usuario"]);
    break;

    case '15':
    #LIMITE CARACTERES
    $alert = new Alerta ("No puedes registrarte,", "Contraseña debe ser mayor a 8 caracteres");
    $alert->mostrar();
    unset($_SESSION["contrasena_usuario"]);
    unset($_SESSION["contrasena_usuario_repetir"]);
    break;

    case '0':
    #OK...
    $usuario = NULL;
    session_destroy(); //destruye la sesion que mantiene el formulario de registro lleno

    $usuario = new Usuario();
    $usuario = Usuario::conInicio($nombre,$pass);
    $codigo = $usuario->transformtoJson_inicio();

    session_start(); // comienza la sesion de inicio se sesion como tal
    $_SESSION['username'] = $nombre;
    $_SESSION['token'] = $codigo[1];


    $token = new Token($_SESSION['token']);
    $data = $token->ConsultarDatosUsuario();
    $correo = new Correo($data[1]);
    $correo->enviarCorreo_registro($data[3],$data[4],$data[2],$pass);



    $url='../vistas/bienvenido.php';
    header("Location: $url");
    /*$url='../vistas/Inicio.php';
    header("Location: $url");*/
    break;

    default:
    $alert = new Alerta ("Algo salió mal :(", ", Los servicios de Done no están disponibles");
    break;
  }
}

}

?>
