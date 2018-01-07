<?php
  $nameErr = $namepErr = $apellidoErr =$passwordErr = $password2Err ="";
  $nombrep = $apellido =$nombre = $email = $pass = $pass2 = "";
  $nacimiento = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email_usuario"];
    $nacimiento = $_POST["fecha_nacimiento"];
    if(empty($_POST["nombre_persona"])){
      $namepErr = "Se requiere su nombre";
    } else{
      $nombrep = comprobar($_POST["nombre_persona"],$namepErr);
    }
    if(empty($_POST["apellido_persona"])){
      $apellidoErr = "Se requiere su apellido";
    } else{
      $apellido = comprobar($_POST["apellido_persona"],$apellidoErr);
    }
    if(empty($_POST["nombre_usuario"])){
      $nameErr = "Se requiere un nombre de usuario";
    } else{
      $nombre = comprobar($_POST["nombre_usuario"], $nameErr);
    }
    if (empty($_POST["contrasena_usuario"])){
      $passwordErr = "Se requiere una contraseña";
    } else{
      $pass = comprobar($_POST["contrasena_usuario"], $passwordErr);
    }
    if(empty($_POST["contrasena_usuario_repetir"])){
      $password2Err = "Se requiere que repita la contraseña";
    } else{
      $pass2 = comprobar($_POST["contrasena_usuario_repetir"], $password2Err); 
      $password2Err = validarContrasenas($_POST["contrasena_usuario"],$_POST["contrasena_usuario_repetir"]);
    }
  }
  function comprobar($dato, &$err){
    if(strlen($dato) <= 50){
      $err = "";
      return $dato;
    } else{
    $err = "El campo no puede ser mayor a 50 caracteres";
      return "";
    }
  }
  function validarContrasenas($contra1, $contra2){
    if($contra1 === $contra2){
      return "";
    } else{
      return "Las contrasenas no coinciden";
    }
  }
?>
