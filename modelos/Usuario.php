<?php

/*Esta clase se usa para:
*
* Instanciar un objeto usuario para mandarlo a registrarse o para chequear su inicio se sesion
*/


class Usuario {




//atributos
  private $id;
  private $edad;
  private $contrasena;
  private $contrasena_2;
  private $email;
  private $nacimiento;
  private $genero;
  private $nombrep;
  private $apellido;





//constructores
public function __construct() {}





 function conRegistro($nombrep, $apellido, $id,$contrasena,$contrasena2,$email,$nacimiento){
  /*constructor para cuando quiere registrarse*/

 $instance = new self();

     $instance->nombrep = $nombrep;
     $instance->apellido = $apellido;
     $instance->id = $id;
     $instance->contrasena= $contrasena;
     $instance->contrasena_2= $contrasena2;
     $instance->email = $email;
     $instance->nacimiento= $nacimiento;

return $instance;


}



function conInicio($id,$contrasena){

/*constructor si quiere iniciar sesion*/
 $instance = new self();

    $instance->id = $id;
    $instance->contrasena = $contrasena;

return $instance;
}





//metodos

/*registrarse*/
function transformToJson_registro(){

  $data = array(
    'email' => $this->email,
    'username' => $this->id,
    'password' => $this->contrasena,
    'nombre' => $this->nombrep,
    'apellido' => $this->apellido,
    'fechaDeNacimiento' => $this->nacimiento,
    'formaDeRegistro' => 'Web'
  );


     $json = json_encode($data);
     $url = 'https://intense-lake-39874.herokuapp.com/usuarios';
     //Iniciar cURL
     $ch = curl_init($url);
     //Decir a curl que se quiere mandar un POST
     curl_setopt($ch, CURLOPT_POST, 1);
     //Adjuntar el json string al POST
     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
     //Configurar el content type a application/json
     curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $mensaje = curl_exec($ch);
          $http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);


          if ($http_info!=200){
            $co = print_r($mensaje,true);

            $bandera=TRUE;
            $longitud=strlen($co);
            $error='';
            $n=0;
            while (($longitud>$n)&($bandera)) {
              if (substr($co,$n,8)=='codigo":'){
                $n = $n +8;
                $bandera=false;
                while (substr($co,$n,1)!=','){
                  $error = $error.$co[$n];
                  $n++;
                }
              }
              $n++;
            }
          }
          else{
            $co = json_decode($mensaje);
            $error = $co->codigo;
          }

          //echo $header;
          //$http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          //}
          //curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          return ($error);


}


/*verficar inicio de sesion*/
function transformtoJson_inicio(){
  $array = array(-1,0);

  $data = array(
            'username' => $this->id,
            'password' => $this->contrasena
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
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $json = curl_exec($ch);

          if ($json!=NULL){

          $co =json_decode($json);

          $token='';


          //$codigo = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          if ($co->codigo=='0'){
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            $response = curl_exec($ch);
            $header=print_r($response,TRUE);
            $bandera=TRUE;
            $longitud=strlen($header);
            $n=0;
            $c=0;
            $token='';
            while (($longitud>$n)&($bandera)) {
              if (substr($header,$n,8)=='X-Auth: '){
              $n= $n +8;
              $bandera=FALSE;
                while (substr($header,$n,12)!='Content-Type') {
                  $token = $token.$header[$n];
                  $n ++;
                }
            }
            $n ++;
           }
          }
          //curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          $array = array($co->codigo,$token);
          return($array);
        }
}












function imprimirDatosUsuario(){ /*funcion extra para verificar que datos se estan mandando*/
  echo "<br><br>Lo que se registro:";
  echo "<br> Nombre del usuario: ". $this->id."<br>";
  echo "<br> Constraseña del usuario: ".$this->contrasena."<br>";
  echo "<br> Contrasena del usuario (intento 2): ".$this->contrasena_2."<br>";
  echo "<br> Email: ".$this->email."<br>";
  echo "<br> Nacimiento: ".$this->nacimiento."<br>";
}








/*getters y setters*/
function getnombre(){
  return $this->nombre;
}

function getcontrasena(){
  return $this->contrasena;
}

function getcontrasena_2(){
  return $this->contrasena_2;
}

function getemail(){
  return $this->email;
}

function getnacimiento(){
  return $this->nacimiento;
}


}
?>
