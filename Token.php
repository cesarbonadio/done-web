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




public function PostTarea($titulo,$descripcion,$fecha /*, $categoria*/){


   $data = array(
     'titulo' => $titulo,
     'descripcion' => $descripcion,
     'fechaParaSerCompletada' => $fecha
     //token' => $this->tokenid;
     //, "categoria" => $categoria
   );


   $json = json_encode($data);
   $url = 'https://intense-lake-39874.herokuapp.com/tareas';


   //Iniciar cURL
   $ch = curl_init($url);

  $curl_headers = array('X-AUTH: '.$this->tokenid, 'Content-Type: application/json');
  //$curl_headers[] = 'X-AUTH: '.$this->tokenid; //token



/*  curl_setopt($ch, CURLOPT_POST, 1);
  //Adjuntar el json string al POST
  //curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);*/

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);


   $json = curl_exec($ch);
   $respuesta = json_decode($json);

   curl_close($ch);

   print_r($respuesta);
   return $respuesta;
  }


///////////////////////////////////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////

  public function PostTareas($titulo, $descripcion){


    $data = array(
      "titulo" => $titulo,
      "descripcion" => $descripcion
    /*  'fechaParaSerCompletada' => $fecha*/
      //token' => $this->tokenid;
      //, "categoria" => $categoria
    );



    $json = json_encode($data);
    $url = 'https://intense-lake-39874.herokuapp.com/tareas';




    //Iniciar cURL
  $ch = curl_init($url);

 //$json = "{\n\t\"titulo\": \"hola\",\n\t\"descripcion\": \"holaaa\"\n}";
 print_r($json);

/*curl_setopt_array($ch, array(
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
    'X-AUTH: '.$this->tokenid
  )
));*/



curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json),
   'X-AUTH: '.$this->tokenid
));

print_r($this->tokenid);



$response = curl_exec($ch);

$err = curl_error($ch);

curl_close($ch);

  if ($err) {
     echo "cURL Error #:" . $err;
  } else {
     echo $response;
  }

}//end


 }
?>
