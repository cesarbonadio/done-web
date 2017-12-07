<!DOCTYPE html>
<html>
<head>
	<title>Done!</title>
</head>
<body>
	
	<?php 
	
	session_start();
	
	if (isset($_SESSION['username'])){
	  echo 'welcome'.$_SESSION['username'];
	}else{
	  header('Location: Inicio.php');
	}
	
	
	

	
	?>
	
	<a href="Logout.php">Cerrar Sesión</a>
	
  <h1>Bienvenido a Done</h1>
</body>
</html>
