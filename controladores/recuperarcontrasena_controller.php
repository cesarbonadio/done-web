<?php


include("../Correo.php"); //incluir la clase Correo.php para mandar el mail
include("../modelos/Token.php");


if (isset($_POST['enviando_mail'])){ // si introducido email


$email=$_POST["email_usuario"];

$correo = new Correo($email);
$token = new Token("NoToken");

$nueva = $token->CambiarClave_recuperada($email);

$correo->enviarNuevaContrasena_generada($nueva);

}


?>
