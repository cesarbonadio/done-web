<?php

if(isset($_POST['homepag'])){ // te lleva a la pagina index
$url = '../index.php';
header("Location:$url");
}
else if(isset($_POST['registrarsepag'])){ //te lleva a la pagina de registro
$url = '../vistas/Registro.php';
header("Location:$url");
}
else if(isset($_POST['iniciopag'])){ // te lleva a la pagina de inicio de sesión
$url = '../vistas/Inicio.php';
header("Location:$url");
}

?>
