<!DOCTYPE html>
<html lang="es-VE">
<html>

<!--Este es el archivo donde comienza la pagina cuando se carga-->


<head>

   <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Done!</title>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />  <!--font-family: 'Quicksand', sans-serif;-->
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet" /><!--font-family: 'Space Mono', monospace;-->
  <link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet" /><!--font-family: 'Megrim', cursive;-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" /><!--font-family: 'Roboto', sans-serif;-->


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


  <link rel="stylesheet" href="estilos1.css" />
</head>

<body>
  <header>
    <!--<div id="logo">-->
    <h1 class="titulo text-center">Donee!</h1>
    <!--</div>-->
    <form action="index.php" method="POST" class="text-center">
      <input name="Registro" type="submit" class="btn boton" value="Registrar Usuario" />
      <input name="Inicio" type="submit" class="btn btn-primary boton" value="Iniciar Sesion" />
    </form>
  </header>

  <section class="container">
   <ul>

     <li><i class="fa fa-sort-amount-asc fa-3x izq" aria-hidden="true"></i>Organiza tus tareas</li>
     <li>No olvides tus cosas por hacer <i class="fa fa-ban fa-3x der" aria-hidden="true"></i></li>
     <li><i class="fa fa-cloud-upload fa-3x izq" aria-hidden="true"></i>Tus tareas se mantienen en la nube</li>
     <li>Lleva tus tareas contigo <i class="fa fa-map-pin fa-3x der" aria-hidden="true"></i></li>
    </ul>
  </section>

  <footer>
    <a href="app-release.apk"><img src="google-play-badge.png" class="img-google-play"/></a>
  </footer>


  <?php
   $url = '';
   if ( isset($_POST['Registro']) )
    $url = 'Registro.php';
   if ( isset($_POST['Inicio']) )
    $url = 'Inicio.php';
   header("Location: $url");
 ?>

</body>

</html>
