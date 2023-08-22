<?php
session_start();
include 'connect.php';
if (isset($_POST["nuovaPassword"])) {
  $selector=$_POST["selector"];
  $token=$_POST["token"];
  $passwordNuova=$_POST["passwordNuova"];
  $passwordConferma=$_POST["passwordConferma"];
  if ($passwordNuova!==$passwordConferma){
    header("Location: nuovaPassword.php?sl=$selector&&tk=$token&&np=err1");
  }else{
    $qCheck = "SELECT * FROM utente WHERE IDUtente='$selector' AND Password='$token'";
    $qCheckE = mysqli_query($conn,$qCheck);
    $contaCheck = mysqli_num_rows($qCheckE);
    if($contaCheck>0){
      $info=mysqli_fetch_array($qCheckE);
      //se la password è minore di 8 o maggiore di 12 caratteri stampo errore
      if(strlen($passwordNuova)<8||strlen($passwordNuova)>12){
        header("Location: nuovaPassword.php?sl=$selector&&tk=$token&&np=err2");
      }else{
        $cryptPassword=crypt($passwordNuova, '$2a$07$cdacvdfgZZMALJsdrhaeQQQPPPDASFDGSDFG$');
        $qResetPass = "UPDATE utente SET Password='$cryptPassword 'WHERE IDUtente='$selector'";
        $qResetPassE = mysqli_query($conn,$qResetPass);
        $_SESSION['emailUtente'] = $info[1];
        $_SESSION['nome'] = $info[2];
        $_SESSION['loginUtente'] = "true";
        header("Location: index.php");
      }
    }
  }

}else{
  header("Location: index.php");
}

mysqli_close($conn);

 ?>
