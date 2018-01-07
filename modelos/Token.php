<?php


 class Token{


 	private $tokenid;

 	public function Token($id){
 		$this->tokenid = $id;
 	}



public function ConsultarDatosUsuario(){
 	$url = 'https://intense-lake-39874.herokuapp.com/usuarios/me';
    //Iniciar cURL
    $ch = curl_init($url);
    $curl_headers = array();
		$curl_headers[] = 'X-AUTH: '.$this->tokenid;
		curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
		$co =json_decode($json);
    curl_close($ch);
    $datos = array($co->_id,$co->email,$co->username,$co->nombre,$co->apellido,$co->fechaDeNacimiento);
    return $datos;
 	}
public function ConsultarTareas(){
    $url = 'https://intense-lake-39874.herokuapp.com/tareas';
    //Iniciar cURL
    $ch = curl_init($url);
    $curl_headers = array();
    $curl_headers[] = 'X-AUTH: '.$this->tokenid;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
     $co =json_decode($json);
     $datos = array($co->tarea);
      curl_close($ch);
      return $datos;
  }


  ///////////////////////////////////////////////
public function PostTareas($titulo, $descripcion, $fecha, $categoria){

      $data = array(
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'fechaParaSerCompletada' => $fecha,
        'categoria' => $categoria
      );
      $json = json_encode($data);
      $url = 'https://intense-lake-39874.herokuapp.com/tareas';
      //el url del curl
      $ch = curl_init($url);
  $this->tokenid = substr($this->tokenid,0,-2);
  $tokenid = $this->tokenid;
  $st2 = "x-auth: ".$tokenid;
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        $st2
      )
    ));
    $response = curl_exec($ch);

    if ($response!=NULL){
    $respuesta = json_decode($response);


    $tipo = gettype($respuesta);

 switch ($tipo) {
  case 'object':
    # code...
    $error = $respuesta->codigo;
    break;
  case 'array':
    # code...
    $error = $respuesta[0]->codigo;
    break;
}
     curl_close($ch);
     return $error;
   }
}
///////////////////////////////////////////





public function BorrarToken(){
  $url = 'https://intense-lake-39874.herokuapp.com/usuarios/me';
  //Iniciar cURL
  $ch = curl_init($url);
  $curl_headers = array();
  $curl_headers[] = 'X-AUTH: '.$this->tokenid;
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
  curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
  $json = curl_exec($ch);
  $co =json_decode($json);
  curl_close($ch);
 }

public function CambiarClave($vieja,$nueva){
  $data = array(
        'passwordViejo' => $vieja,
        'password' => $nueva
      );

      $json = json_encode($data);
      $url = 'https://intense-lake-39874.herokuapp.com/usuarios/me/pass';

      //el url del curl
      $ch = curl_init($url);

  $this->tokenid = substr($this->tokenid,0,-2);
  $tokenid = $this->tokenid;
  $st2 = "x-auth: ".$tokenid;
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PATCH',
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        $st2
      )
    ));
  $response = curl_exec($ch);
  $respuesta = json_decode($response);
  $error = $respuesta->codigo;
  curl_close($ch);
  return $error;
 }


public function CambiarClave_recuperada($email){

 $data = array(
   'email' => $email
 );

 $json = json_encode($data);

 $url = 'https://intense-lake-39874.herokuapp.com/usuarios/pass';

 //el url del curl
 $ch = curl_init();

 curl_setopt_array($ch, array(
   CURLOPT_URL => $url,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'PATCH',
   CURLOPT_POSTFIELDS => $json,
   CURLOPT_HTTPHEADER => array(
     'Content-Type: application/json'
   )
 ));

 $response = curl_exec($ch);
 $respuesta = json_decode($response);

 $http_info = curl_getinfo($ch, CURLINFO_HTTP_CODE);

 curl_close($ch);
 return $response;
}




//////////////////////////////////////////
public function EditarTarea($id,$cambio){


      $data = array(
         'titulo' => $cambio
      );

      $json = json_encode($data);
      $url = 'https://intense-lake-39874.herokuapp.com/tareas/'.$id;

      //el url del curl
      $ch = curl_init($url);

  $this->tokenid = substr($this->tokenid,0,-2);
  $tokenid = $this->tokenid;
  $st2 = "x-auth: ".$tokenid;

    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PATCH',
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        $st2
      )
    ));
  $response = curl_exec($ch);

echo $response;

  $respuesta = json_decode($response);

  print_r($respuesta);

  curl_close($ch);
}

 public function PostCategoria($nombre){
    $data = array(
        'categoria' => $nombre
      );
      $json = json_encode($data);
      $url = 'https://intense-lake-39874.herokuapp.com/categorias';
      //el url del curl
      $ch = curl_init($url);
  $this->tokenid = substr($this->tokenid,0,-2);
  $tokenid = $this->tokenid;
  $st2 = "x-auth: ".$tokenid;
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $json,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        $st2
      )
    ));
    $response = curl_exec($ch);
    echo $response;
    curl_close($ch);
 }
 public function GetCategoria(){
    $url = 'https://intense-lake-39874.herokuapp.com/categorias';
    //Iniciar cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
     $co =json_decode($json);
     $datos = array($co);
     curl_close($ch);
     $categorias = array();
     for ($i=0; $i < sizeof($datos[0]); $i++) {
        $categorias[$i] = $datos[0][$i]->categoria;
     }
     return $categorias;
 }
 public function GetTareaCategoria($categoria){
    $url = 'https://intense-lake-39874.herokuapp.com/tareas/'.$categoria;
    //Iniciar cURL
    $ch = curl_init($url);
    $curl_headers = array();
    $curl_headers[] = 'X-AUTH: '.$this->tokenid;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $json = curl_exec($ch);
     $co =json_decode($json);
     $datos = array($co->tarea);
      curl_close($ch);
      return $datos;
  }





}
?>
