<!--Formulario de prueba-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Done! - Iniciar Sesión</title>

<!--fuentes de google-->
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"/> <!--font-family: 'Quicksand', sans-serif;-->
<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"/> <!--font-family: 'Space Mono', monospace;-->
<link href="https://fonts.googleapis.com/css?family=Megrim" rel="stylesheet"/> <!--font-family: 'Megrim', cursive;-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/> <!--font-family: 'Roboto', sans-serif;-->


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<link rel ="stylesheet" href="estilos.css"/>


</head>
<style type="text/css">
  .ubicacion{
    /*position: absolute;
    left:25%;
    top:-335px;*/
    padding:5px;
		width: 20%;
		/*margin-right: 6%;*/
    border-radius: 0px 0px 20px 20px;
    /*margin: 20px auto;*/
		margin-bottom: 20px;
  }
</style>
<body>



  <header>
    <section class ="container">
     <h3 class="titulo text-center">Done!</h3>
     <h1>Recupera tu contraseña</h1>
    </section>
  </header>



<!---inicia el formulario-->
<section class ="container">
  <h2>Recuperar Contraseña</h2>
  <form  action="recuperarcontrasena.php" method="POST">
   <table align = "center" style ="background-color: rgba(255, 255, 255  , 0.2);">
     <tr>
       <td id ="identificadorentrada">E-mail</td>
       <td><label for="email_usuario"></label>
       <input type="email" name="email_usuario" id="email_usuario" placeholder="Introduzca un email válido">
         </a></td>
     </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <tr>
  <td colspan="2" align="center"><input name="Enviarmail" type="submit" value="Enviar email"/> <td>
  </tr>
</table>
</form>
</section>



<section class="container">
<ul>
<li><img id ="icono" src="code.svg" height="40" width="40"/><b id="descripcion_icon">Si olvidaste tu contraseña ingresa tu email de registro.</b><p id = "descripcion_icon" style ="text-align:none;"> Con tu email de registro podremos saber cual es tu contraseña, tu nueva contraseña será enviada a tu correo.</p></li>
</ul>
</section>


</body>




<?php


function enviarcontrasena($contrasena){ // manda la contrasena generada a los de rest y ellos la cambian en el usuario
  //generar arreglo
  $data = array(
    'password' => $contrasena,
  );

  $json = json_encode($data);
  $url = 'https://intense-lake-39874.herokuapp.com/usuarios/login';


  //Iniciar cURL
  $ch = curl_init($url);
  //Decir a curl que se quiere mandar un POST
  curl_setopt($ch, CURLOPT_POST, 1);
  //Adjuntar el json string al POST
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  //Configurar el content type a application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


  curl_exec($ch);
  if (!curl_errno($ch)) {
    switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
      case 200: #OK
        break;
      case 400: echo '<br> Bad request';
        break;
      case 404: echo '<br> Not found';
        break;
      default: echo '<br> Código http inesperado: ', $http_code, "\n";
    }
  }

else {
  echo "error con el servidor";
}
  echo curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
}





function randomString($tipo){
  //generar la longitud
  $longitud = rand(10,50);
  // Seleccionamos el tipo de caracteres que deseas que devuelva el string
     switch ($tipo) {
         case 'num':
             // Solo cuando deseas que devuelva numeros.
             $carac = '1234567890';
             break;
         case 'lower':
             // Solo cuando deseas que devuelva letras en minusculas.
             $carac = 'abcdefghijklmnopqrstuvwxyz';
             break;
         case 'upper':
             // Solo cuando deseas que devuelva letras en mayusculas.
             $carac = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
             break;
         default:
             //el default que dice que puede estar compuesta de letras mayusculas, minusculas y numeros
             $carac = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
             break;
     }
    $rand = '';
    $i = 0;
    while ($i < $longitud) {
        //Loop hasta que el string aleatorio contenga la longitud ingresada.
        $num = rand() % strlen($carac);
        $tmp = substr($carac, $num, 1);
        $rand = $rand.$tmp;
        $i++;
    }
    //Retorno del string aleatorio.
    return $rand;
}



?>


<?php

include("Correo.php"); //incluir la clase Correo.php para mandar el mail
if (isset($_POST['email_usuario'])){ // si introducido email

$email=$_POST["email_usuario"]; //aqui se supone que se debe mandar el email al usuario con la nueva contrasena


$correo = new Correo($email);
$correo->enviarNuevaContrasena(randomString(""));


$nuevacontra = randomString("");
enviarcontrasena($nuevacontra);
}



?>





</html>
