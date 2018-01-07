<?php

//usos del php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'PHPMailer/vendor/autoload.php';
include_once("vistas/scripts/Alerta.php");




class Correo {


 //atributos
 /*Estas son direcciones de correo electrónico*/
 private $receptor;
 private $emisor;
 private $soporte;



  function Correo($receptor){
    $this->receptor = $receptor;
    $this->emisor = 'notreply@doneapp.com';
    $this->soporte = 'donewebapp@gmail.com';
  }





  function enviarNuevaContrasena_generada($contrasena){ //constrasena generada aleatoriamente al olvidar la anterior

    $mail = new PHPMailer(true); // Passing `true` enables exceptions

    try {
        //Server settings
        //$mail->SMTPDebug = 1;//Enable verbose debug output
        $mail->isSMTP();//Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';//Specify main and backup SMTP servers
        $mail->SMTPAuth = true;//Enable SMTP authentication
        $mail->Username = getenv('SMTP_USERNAME');
        $mail->Password = getenv('SMTP_PASSWORD');
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
        $mail->Subject = 'New password';

        //cuerpo de mensaje en vista normal
        $mail->Body    = '<h2> Tu nueva contrase&ntilde;a ha sido <b>generada</b> </h2> <br>
                          <br> Tu nueva contrase&ntilde;a es:  <br>' .$contrasena.
                          '<br>Contacto: doneeeapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        //cuerpo del mensaje en vista básica
        $mail->AltBody = 'Tu nueva contrase&ntilde;a ha sido <b>generada</b>
                          <br> Tu nueva contrase&ntilde;a es:  <br>' .$contrasena.
                          '<br>Contacto: doneeeapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        $mail->send();


        $alert = new Alerta("Su contraseña fue cambiada", ", Revise su correo");
        $alert->mostrar();

    } catch (Exception $e) { // una excepcion (cualquier error que se pueda presentar en el php mailer, como correo no existe o falla de conexión al cliente web)

      $alert = new Alerta("Algo salió mal :(", ", Revise su correo y su conexión a internet");
      $alert->mostrar();
      /*  echo 'Message could not be sent.';*/
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  } //end






  function enviarNuevaContrasena_cambiada($vieja,$nueva){ //constraseña cambiada voluntariamente con la sesión abierta


    $mail = new PHPMailer(false); // Passing `true` enables exceptions

        //Server settings
        //$mail->SMTPDebug = 1;//Enable verbose debug output
        $mail->isSMTP();//Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';//Specify main and backup SMTP servers
        $mail->SMTPAuth = true;//Enable SMTP authentication
        $mail->Username = getenv('SMTP_USERNAME');
        $mail->Password = getenv('SMTP_PASSWORD');
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
        $mail->Subject = 'New password';

        //cuerpo de mensaje en vista normal
        $mail->Body    = '<h2> Tu contrase&ntilde;a de Done ha sido <b>cambiada</b> recientemente </h2> <br>
                          <br> Tu contrase&ntilde;a anterior: ' .$vieja.
                         '<br> Tu nueva contrase&ntilde;a: ' .$nueva.
                          '<br>Contacto: donewebapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        //cuerpo del mensaje en vista básica
        $mail->AltBody = '<h2> Tu contrase&ntilde;a de Done ha sido <b>cambiada</b> recientemente </h2> <br>
                          <br> Tu contrase&ntilde;a anterior: ' .$vieja.
                         '<br> Tu nueva contrase&ntilde;a: ' .$nueva.
                         '<br>Contacto: donewebapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        $mail->send();


  }





  function enviarCorreo_registro($nombre,$apellido,$nombreu,$contra){ //constraseña cambiada voluntariamente con la sesión abierta


    $mail = new PHPMailer(false); // Passing `true` enables exceptions

        //Server settings
        //$mail->SMTPDebug = 1;//Enable verbose debug output
        $mail->isSMTP();//Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';//Specify main and backup SMTP servers
        $mail->SMTPAuth = true;//Enable SMTP authentication
        $mail->Username = getenv('SMTP_USERNAME');
        $mail->Password = getenv('SMTP_PASSWORD');
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
        $mail->Subject = 'Registro - Done';

        //cuerpo de mensaje en vista normal
        $mail->Body    = '<h2 style="color:blue;"> Gracias '.$nombre.' por registrarte en Done </h2> <br>
                          <br> <h3>Aqui alguna de tus credenciales de registro: </h3>
                          <br> Nombre: ' .$nombre.
                         '<br> Apellido: '.$apellido.
                         '<br> Nombre de usuario: '. $nombreu.
                         '<br> Contrase&ntilde;a :'. $contra.
                         '<br>Contacto: donewebapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        //cuerpo del mensaje en vista básica
        $mail->AltBody = '<h2 style="color:blue;"> Gracias '.$nombre.' por registrarte en Done </h2> <br>
                          <br> <h3>Aqui alguna de tus credenciales de registro: </h3>
                          <br> Nombre: ' .$nombre.
                         '<br> Apellido: '.$apellido.
                         '<br> Nombre de usuario: '. $nombreu.
                         '<br> Contrase&ntilde;a :'. $contra.
                         '<br>Contacto: donewebapp@gmail.com</br>
                          <br>No responder a este correo</br>';

        $mail->send();
  }





}
?>
