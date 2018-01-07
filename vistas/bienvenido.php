<!DOCTYPE html>


<html>
<head>
  <title>Done!</title>
  <meta charset="utf-8">
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
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <script src="scripts/overflow_marquee.js"></script>
  <script src="https://use.fontawesome.com/5643167d36.js"></script>



</head>
<body>



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
          <a class="dropdown-item" href="Creartareas.php">Crear tarea</a>
          <a class="dropdown-item" href="#">Crear lista de tareas</a>
          <a class="dropdown-item" href="#">Ver lista de tareas</a>
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
</div>





<div id="body" class = "container">
			<div id="texto">
				 <p id="texto-contenedor-1">Lista actual de tareas</p>
         <form method="post" name="elegir_categoria" action="bienvenido.php">
           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           <tr>
              <td>Categorías</td>
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
             <option value="Todas"> Todas </option>
            </select>
           </tr>
            <tr>
           <td colspan="2" align="center"><input name="eligiendo_categoria" type="submit" class="boton" value="Elegir"/> <td>
           </tr>
         </form>

 <p id ="texto-contenedor-1" style="background-color:white; font-size:20px;">

        <?php
         if (isset($_SESSION['token'])){

          //$token = new Token($_SESSION['token']);
          $DatosUsuario = $token->ConsultarDatosUsuario();
          if (isset($_POST['eligiendo_categoria'])){

            $Categoria = ucfirst($_POST['categoria_tarea']);
            echo $Categoria;
            echo "<br>";
            echo "<br>";
          if ($Categoria=="Todas"){
           $datos = $token->ConsultarTareas();
          }
          else{
            $datos = $token->GetTareaCategoria($Categoria);
          }
 ?></p><?php

         if (sizeof($datos[0])==0){
            echo "- Aun no tiene tareas registradas :( "."<br>";
            echo "Ve al menu y presiona crear tarea para agregar una tarea";
           } else{
         for ($i = 0; $i<sizeof($datos[0]); $i++){

         ?><p id="texto-contenedor-2" style = "font-size:20px;" ><?php

         echo "<br>";
         echo "* Tarea ".($i+1)."<br>";
         echo "Titulo: ". $datos[0][$i]->titulo. "<br>";
         echo "Descripcion: ". $datos[0][$i]->descripcion. "<br>";
          if ($datos[0][$i]->completado==false){
            echo "Completado: no";
          }else{ echo "Completado: sí";}
         echo "<br><br>";

       } ?> </p> <?php
        }
      }
    //$token->EditarTarea("5a4c5cd1e6092500142f7d06","cambio");
   }
?>

         </p>
      </div>
</div>



</body>
</html>
