<?php
  include("../vistas/scripts/Alerta.php");

if (isset($_SESSION['token'])){
    $token = new Token($_SESSION['token']);


      if (isset($_POST['editando_tarea'])){

          $titulo = $_POST['titulo_tarea'];
          $descripcion = $_POST['descripcion_tarea'];
          $fecha = $_POST['fecha_tarea'];
          $categoria = ucfirst($_POST['categoria_tarea']);

          $token->EditarTarea($id,$titulo,$descripcion,$fecha,$categoria);

          
          $alert = new Alerta("Correcto,","Su tarea se ha modificado");
          $alert->mostrar();

          sleep(4);
          echo "<script>window.location.href='bienvenido.php'</script>";

      }

}





?>
