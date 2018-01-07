<?php

//include("../vistas/scripts/Alerta.php");
include("../Correo.php");
//include("../modelos/Token.php");

if (isset($_POST["enviando"])) {

   $viejaclave=$_POST["contrasena_vieja"];
   $nuevaclave=$_POST["contrasena_usuario"];

   if (isset($_SESSION['token'])){
     $token = new Token($_SESSION['token']);
     $respuesta = $token->CambiarClave($viejaclave,$nuevaclave);
     switch ($respuesta) {
       case '2':
       # code...
       $alert = new Alerta("Vieja Contraseña incorrecta", ", Revise e intentelo de nuevo");
       $alert->mostrar();
         break;
       case '16':
        #LIMITE CARACTERES
       $alert = new Alerta ("Error,", "La nueva Contraseña debe ser menor a 50 caracteres");
       $alert->mostrar();
         break;
       case '15':
        #LIMITE CARACTERES
       $alert = new Alerta ("Error,", "La nueva Contraseña debe ser mayor a 8 caracteres");
       $alert->mostrar();
         break;
       case '0':
       #ok
       $alert = new Alerta ("Correcto,", "Su contraseña ha sido cambiada correctamente");
       $alert->mostrar();
       $data = $token->ConsultarDatosUsuario();
       $correo = new Correo($data[1]);
       $correo->enviarNuevaContrasena_cambiada($viejaclave,$nuevaclave);
      break;
      default:
         $alert = new Alerta ("Algo salió mal :(", ", Los servicios de Done no están disponibles");
      break;
     }
   }
}
?>
