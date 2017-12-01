<?php

//usos del php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/vendor/autoload.php';



/* Nota IMPORTANTE:
 * El host de SMTP es un host de los servicios proporcionados por Sendgrid.net
 * Para usar dichos servicios fue necesario la creación de un usuario en la plataforma
 * El usuario: doneapp , la contrasena: doneapp123456
 * El correo doneeeapp@gmail.com existe y es de soporte
 * El correo notreply@doneapp.com no existe y tampoco es necesario que exista, ya que el correo es enviado a través de Sendgrid
 */



class Correo {

 //atributos

 /*Estas son direcciones de correo electrónico*/
 private $receptor;
 private $emisor;
 private $soporte;




  function Correo($receptor){
    $this->receptor = $receptor;
    $this->emisor = 'notreply@doneapp.com';
    $this->soporte = 'doneeeapp@gmail.com';
  }



  function enviarNuevaContrasena($contrasena){

    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {


        //Server settings
        //$mail->SMTPDebug = 1;//Enable verbose debug output
        $mail->isSMTP();//Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';//Specify main and backup SMTP servers
        $mail->SMTPAuth = true;//Enable SMTP authentication
        $mail->Username = 'doneapp';//SMTP username
        $mail->Password = 'doneapp123456';//SMTP password
        $mail->SMTPSecure = 'tls';//Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;//TCP port to connect to


        //Recipients
        $mail->setFrom($this->emisor,'Doneapp');
        $mail->addAddress($this->receptor);//Add a recipient
        //$mail->addAddress('ellen@example.com');//Name is optional
        $mail->addReplyTo($this->soporte,'Contacto');
        /*$mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');*/


        //Attachments
        /*$mail->addAttachment('/var/tmp/file.tar.gz');//Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');//Optional name*/


        //Content
        $mail->isHTML(true);//Set email format to HTML
        $mail->Subject = 'Nueva contrase&ntilde;a';
        $mail->Body    = 'Tu nueva contrase&ntilde;a ha sido <b>generada</b>
                          <br> Tu nueva contrase&ntilde;a es:  <br>' .$contrasena.
                          '<br>Contacto: doneeeapp@gmail.com</br>
                          <br>No responder a este correo</br>';
        $mail->AltBody = 'Tu nueva contrase&ntilde;a ha sido <b>generada</b>
                          <br> Tu nueva contrase&ntilde;a es:  <br>' .$contrasena.
                          '<br>Contacto: doneeeapp@gmail.com</br>
                          <br>No responder a este correo</br>';
 
        $mail->send();
        echo 'Message has been sent';


    } catch (Exception $e) { // una excepcion (cualquier error que se pueda presentar en el php mailer, como correo no existe o falla de conexión al cliente web)

  /*  ?>

       <div class="ubicacion">
       <div class="container">
       <div class="col-md-6">
       <div class="alert alert-info alert-dismissable">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
       <strong>Algo salió mal</strong> , el correo no pudo ser enviado
       </div>
       </div>
       </div>
       </div>

    <?php*/

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }


  }


}




?>
