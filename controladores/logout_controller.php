<?php
@session_start();
session_destroy();

include("../modelos/Token.php");


$token = new Token($_SESSION['token']);
$token->BorrarToken();

header("Location: ../index.php");
?>
