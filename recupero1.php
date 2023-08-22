<?php
session_start();
include'connect.php';
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
  if($errore==0){
    //get data from form
    $email= $_POST['email'];
    $message= '<h1>Recupero password</h1>
    <p>Gentile '.$row[2].',</p><br>
    Clicca sul <a href="https://registrimonterosso.labcd.unipi.it/nuovaPassword.php?sl='.$selector.'&&tk='.$token.'">link</a> per creare una nuova password.<br /> Se il link non è visibile, copia la riga qui sotto e incollala sul tuo browser: <br /> https://registrimonterosso.labcd.unipi.it/nuovaPassword.php?sl='.$selector.'&&tk='.$token.'
    <br><br>
    <p>A presto,</p>
    <p>Il team</p>
    <p class="">Registri parrocchiali Monterosso</p>
    ';
    $to = $email;
    $subject = "Recupero password - Registri parrocchiali Monterosso";
    $headers = "From: registrimonterosso@gmail.com\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    if($email!=NULL){
        mail($to,$subject,$message,$headers);
    }
    //redirect
    header("Location: recuperoForm.php?risposta=1");
  }
}
mysqli_close($conn);
?>
