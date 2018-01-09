<?php

  //include("../modelos/Usuario.php");
  include("../vistas/scripts/Alerta.php");
  //include("../modelos/Token.php");


if (isset($_SESSION['token'])){
    $token = new Token($_SESSION['token']);


      if (isset($_POST['creando_tarea'])){

          $titulo = $_POST['titulo_tarea'];
          $descripcion = $_POST['descripcion_tarea'];
          $fecha = $_POST['fecha_tarea'];
          $categoria = ucfirst($_POST['categoria_tarea']);


          $codigo = $token->PostTareas($titulo,$descripcion,$fecha,$categoria);




          switch ($codigo) {

            case '0':
              #ok
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("Correcto,","Tu tarea se envió correctamente. Puede verla en su lista de tareas");
              $alert->mostrar();
              break;

            case '28':
              #ERROR DE CARACTERES
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("No se pudo enviar tu tarea,","solo debe tener caracteres alfanuméricos");
              $alert->mostrar();
              break;

            case '31':
              #lIMITE DE CARACTERES
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("No se pudo enviar tu tarea,","la descripcion no debe pasar los 250 caracteres");
              $alert->mostrar();
              break;

            case '29':
              #lIMITE DE CARACTERES
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("No se pudo enviar tu tarea,","el titulo no debe pasar los 255 caracteres");
              $alert->mostrar();
              break;

            case '39':
              #lIMITE DE CARACTERES
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("No se pudo enviar tu tarea,","La fecha tiene que ser mayor o igual a la fecha actual");
              $alert->mostrar();
              break;


           case '37':
              #lIMITE DE CARACTERES
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("No se pudo enviar tu tarea,","La descripción contiene codigo script no permitido");
              $alert->mostrar();
              break;

            default:
              echo "<br><br><br><br><br><br><br><br>";
              $alert = new Alerta("Algo salio mal :(,","los servicios de Done no estan disponibles");
              $alert->mostrar();
              break;
          }


         echo "<script>console.log('$codigo');</script>";

      }

}


?>
