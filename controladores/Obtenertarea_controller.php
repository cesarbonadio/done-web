<?php


if (isset($_SESSION['token'])){
  $token = new Token($_SESSION['token']);


echo "<script>console.log('$id');</script>";

  $datos = $token->GetTareaID($id);


   $datos[2] = substr($datos[2], 0, -14);
}
?>
