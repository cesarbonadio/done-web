
<?php


	include("../vistas/scripts/Alerta.php");

	if (isset($_SESSION['token'])){
   	 $token = new Token($_SESSION['token']);
     if (isset($_POST['borrando_tarea'])){
   			 $error = $token->EliminarTarea($_POST['borrando_tarea']);
   			 $alert = new Alerta("Su Tarea ha sido eliminada correctamente,","Actualice la lista para ver el cambio");
             $alert->mostrar();
     }
     if (isset($_POST['completada_tarea'])){
     	$error = $token->CompletarTarea($_POST['completada_tarea'],true);
     	$alert = new Alerta("Su tarea ha sido completada correctamente,","Actualice la lista para ver el cambio");
     	$alert->mostrar();
     }
     if (isset($_POST['descompletada_tarea'])){
     	$error = $token->CompletarTarea($_POST['descompletada_tarea'],false);
     	$alert = new Alerta("Su tarea ha sido descompletada correctamente,","Actualice la lista para ver el cambio");
     	$alert->mostrar();
     }
		 if (isset($_POST['modificando_tarea'])){
			 $id = $_POST['modificando_tarea'];
			 header('Location: ../vistas/EditarTarea.php?id='.$id);
		 }
	}


?>
