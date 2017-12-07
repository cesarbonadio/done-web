<!DOCTYPE html>
<html>
<head>
  <title>Done!</title>
  <meta charset="utf-8">

</head>
<body>

	
	
	<p style="margin-bottom: 20%;">
	
	<?php 
	
	session_start();
	
	if (isset($_SESSION['username'])){
	  echo 'Sesión iniciada como '.$_SESSION['username'];
	}else{
	  header('Location: Inicio.php');
	}
	
	
	

	
	?>
	
	<a href="Logout.php">Cerrar Sesión</a>
	
  <h1>Bienvenido a Done</h1>
	
	</p>

</body>
</html>
