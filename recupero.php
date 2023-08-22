<?php
  session_start();
  include'connect.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  require "PHPMailer/src/PHPMailer.php";
  require "PHPMailer/src/SMTP.php";
  require "PHPMailer/src/Exception.php";
  require 'vendor/autoload.php';

  if(isset($_POST['email'])){
  	$errore=0;
  	if($_POST['email']==""){
      $errore=1;
  		header("Location: recuperoForm.php?risposta=err1");
  	}else{
      $email=$_POST['email'];
      $qRecEmail = "SELECT IDUtente, Password, Nome FROM utente WHERE Email='$email'";
      $qRecEmailE = mysqli_query($conn,$qRecEmail);
      $contaEmail = mysqli_num_rows($qRecEmailE);
  		if($contaEmail>0){
  			$row=mysqli_fetch_array($qRecEmailE);
  			$selector=$row[0];
        $token=$row[1];
  		}else{
        $errore=1;
  			header("Location: recuperoForm.php?risposta=err2");
      }
  	}
    //se non ci sono stati errori, invio l’email all’utente con il link da confermare
  	if($errore==0){

      $mail = new PHPMailer(true);

      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;
          $mail->isSMTP();
          $mail->Host       = 'smtp.gmail.com';
          $mail->SMTPAuth   = true;
          $mail->Username   = 'registrimonterosso@gmail.com';
          $mail->Password   = 'registriMonterosso2021';
          $mail->SMTPSecure = 'tls';
          $mail->Port       = 587;

          //Recipients
          $mail->setFrom('registrimonterosso@gmail.com', 'Registri parrocchiali Monterosso');
          $mail->addAddress($_POST['email']);
   


          // Attachments


          // Content
          $mail->isHTML(true);
          $mail->Subject = 'Recupero password - Registri parrocchiali Monterosso';
          $mail->Body    = '
          <h1>Recupero password</h1>
          <p>Gentile '.$row[2].',</p><br>
          Clicca sul <a href="http://localhost/Monterosso/nuovaPassword.php?sl='.$selector.'&&tk='.$token.'">link</a> per creare una nuova password.<br /> Se il link non è visibile, copia la riga qui sotto e incollala sul tuo browser: <br /> http://localhost/Monterosso/nuovaPassword.php?sl='.$selector.'&&tk='.$token.'
          <br><br>
          <p>A presto,</p>
          <p>Il team</p>
          <p class="">Registri parrocchiali Monterosso</p>
          ';

          header("Location: recuperoForm.php?risposta=1");
          $mail->send();
      } catch (Exception $e) {
          echo "Errore: {$mail->ErrorInfo}";
      }
  	}
  }


  mysqli_close($conn);
  ?>
