<?php
ob_start(); // buffer

session_start();
if (isset($_SESSION['username'])){ // pregunta si la sesión esta iniciada para redireccionarte a bienvenido.php y no a las demas
 $url='../vistas/bienvenido.php';
header("Location: $url");
}

ob_end_flush(); //buffer
?>
