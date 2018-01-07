<?php
//el nombre de usuario en el menu lateral es la manera de controlar si ha iniciado sesion
include("../modelos/Usuario.php");
include("../modelos/Token.php");


session_start();
if (isset($_SESSION['token'])){
  //si ya tiene el token guardado, es porque inicio sesion, busca el nombre de usuario y lo imprime
  $token = new Token($_SESSION['token']);
  $DatosUsuario = $token->ConsultarDatosUsuario();
  echo $DatosUsuario[2];
}else{
  //si no, te manda a iniciar sesion
  header('Location: Inicio.php');
}
?>
