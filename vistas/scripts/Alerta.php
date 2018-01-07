<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel ="stylesheet" href="estilos.css"/>
</head>

<style type="text/css">
  .ubicacion{
    position:relative;
    left:25%;
    top:70%;
    text-align:center;
  }
</style>



<?php

/*esta clase es usada cada vez que se muestra un mensaje de error*/

  class Alerta {

    //atributos
    private $mensajebold;
    private $mensajenormal;



 function Alerta($mensajebold,$mensajenormal){
     $this->mensajebold = $mensajebold;
     $this->mensajenormal = $mensajenormal;
 }


function mostrar(){
  ?>
  <div class="container">
    <div class="ubicacion">
     <div class="col-md-6">
      <div class="alert alert-info alert-dismissable">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong><?php echo $this->mensajebold ?></strong> <?php  echo $this->mensajenormal ?>
         </div>
       </div>
     </div>
   </div>
  <?php
}


}

?>
