<!DOCTYPE html>


<html>
<head>
  <title>Done!</title>
  <link rel="shortcut icon" href="../views/images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
  <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../views/styles/estiloPagTareas.css">
  <link rel="stylesheet" type="text/css" href="../views/styles/estilosCreartarea.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="https://use.fontawesome.com/5643167d36.js"></script>
</head>
<body>


<?php //obtener el id en el url
      $id=$_GET['id']; ?>




  <!-- Container completo -->
  <section class = "container">
    <nav id="fondo" class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <!-- Logo -->
      <a id="logo" class="navbar-brand" href="bienvenido.php">Done!</a>
      <!-- Links del menu desplegable -->
      <ul class="navbar-nav">
        <!-- Menu desplegable -->
        <li class="nav-item dropdown" >
          <a class="objeto nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="CrearTareas.php">Crear tarea</a>
            <a class="dropdown-item" href="Perfil.php">Ver perfil</a>
            <a class="dropdown-item" href="../controladores/logout_controller.php">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </nav>
  </section>




<!-- Barra lateral -->
<div id="barra-lateral">
			<div id="logo-menu">
			</div>
	<div id="contenedor-logos-primero" class="contenedor-logos" >
    <a href ="bienvenido.php">
		<div class="logo-perfil">
			</div>
    </a>
        <p class ="title-menu"> <?php include("../controladores/usuario_menu_controller.php"); ?> </p>
	</div>
      <div class="contenedor-logos">
        <a href ="Ayuda.php">
      <div class="logo-ayuda">
      </div>
       </a>
      <p class="title-menu">ayuda</p>
     </div>
     <div class="contenedor-logos">
       <a href ="Configuracion.php">
     <div class="logo-config">
     </div>
      </a>
     <p class="title-menu">configuracion</p>
    </div>
</div><!--Termina la barra lateral-->




<?php include("../controladores/Obtenertarea_controller.php")?>




<div id="body" class = "container">
			<div id="texto">
        <br>
				 <p id="texto-contenedor-1">Editar Tarea</p>
        <br>

    <!--comienza la tabla-->
    <table align ="center">
         <form method="post" name="editar_tarea_formulario" action="EditarTarea.php?id=<?php echo $_GET['id']; ?>">
           <tr>
             <td id="identificadorentrada">ID tarea</td>
             <td>
               <label for="id_tarea"></label>
               <input type="text" name="id_tarea" placeholder="Introduzca el id de su tarea" value="<?php echo $_GET['id']; ?>" required disabled>
             </td>
           </tr>
           <br>
           <tr>
             <td id="identificadorentrada">Titulo</td>
             <td>
               <label for="titulo_tarea"></label>
               <input type="text" name="titulo_tarea" placeholder="Introduzca un titulo para la tarea" value="<?php echo $datos[0]; ?>" autocomplete="off" required>
             </td>
           </tr>
           <br>
           <tr>
             <td id ="identificadorentrada">Descripcion</td>
             <td>
               <label for="descripcion_tarea"></label>
               <textarea  cols="40" rows="5" name="descripcion_tarea" placeholder="Describe tu tarea" autocomplete="off" required><?php echo $datos[1];?></textarea>
             </td>
           </tr>
           <br>
           <tr>
             <td id = "identificadorentrada">Fecha para completarla</td>
             <td>
               <label for="fecha_tarea"></label>
               <input type="date" name="fecha_tarea" placeholder="Fecha para ser completada"  value ="<?php echo $datos[2]; ?>" autocomplete="off" required>
             </td>
           </tr>
           <br>
           <tr>
              <td id = "identificadorentrada"> Categorías </td>
              <td>
              <label for="categoria_tarea"></label>
              <select id="categoria_tarea" name="categoria_tarea">
              <option value="">Escoja una Categoría</option>

            <?php
             $token = new token($_SESSION['token']);
             $categorias = $token->GetCategoria();
            foreach($categorias as $cat){
             ?>
             <option value="<?php echo strtolower($cat); ?>"><?php echo $cat; ?></option>
             <?php
             }
             ?>
           </select>
           </tr>

           <tr>
           <td colspan="2" align="center"><input name="editando_tarea" type="submit" class="boton" value="Guardar cambios"/> <td>
           </tr>
         </form>
       </table>
<!--termina la tabla-->


<?php include("../controladores/Editartarea_controller.php")?>

         <br>
         <br>
      </div>
</div>




</body>
</html>
