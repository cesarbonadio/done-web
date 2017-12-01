<?php

//usos del php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/vendor/autoload.php';



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
        $mail->SMTPDebug = 1;//Enable verbose debug output
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
        $mail->Subject = 'Nueva contraseña';
        $mail->Body    = 'Tu nueva contraseña ha sido <b>generada</b>
                          <br> Tu nueva contraseña es: '.$contrasena' <br>
                          <br>Contacto: doneeeapp@gmail.com</br>
                          <br>No responder a este correo</br>';
        $mail->AltBody = 'This is the HTML message body<b>in bold!</b> <br>Not reply this</br> <br>Contact us: doneeeapp@gmail.com</br>';

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