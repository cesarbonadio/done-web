
<?php
class Usuario{
//atributos
  private $id;
  private $edad;
  private $contrasena; private $contrasena_2;
  private $email;
  private $nacimiento;
  private $genero;
  private $nombrep;
  private $apellido;
//constructor
 function Usuario($nombrep, $apellido, $id,$contrasena,$contrasena2,$email,$nacimiento){
     $this->nombrep = $nombrep;
     $this->apellido = $apellido;
     $this->id = $id; // $post es una variable superglobal de psp (array)
     $this->contrasena= $contrasena;
     $this->contrasena_2= $contrasena2;
     $this->email = $email;
     $this->nacimiento= $nacimiento;
     /*con las dos lineas de codigo anteriores lo que estamos haciendo es
      *asignarle a una variable local de php lo que el usuario introdujo
      *en el nombre_usuario, que es almacenado automaticamente en el
      *$POST_*/
}
//metodos
function ImprimirDatosUsuario(){
  echo "<br><br>Lo que se registro:";
  echo "<br> Nombre del usuario: ". $this->id."<br>";
  echo "<br> Constraseña del usuario: ".$this->contrasena."<br>";
  echo "<br> Contrasena del usuario (intento 2): ".$this->contrasena_2."<br>";
  echo "<br> Email: ".$this->email."<br>";
  echo "<br> Nacimiento: ".$this->nacimiento."<br>";
}
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
        function transformToJson(){
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
          $json = curl_exec($ch);
          $co =json_decode($json);
          //if (!curl_errno($ch)) {
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
           echo $header;
           echo $token;
          }
          //$http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          //}
          //curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          return ($co->codigo);

        }


}
?>