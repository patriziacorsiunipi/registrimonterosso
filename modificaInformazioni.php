<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if(isset($_POST["idInfoMod"])){
    $idInfo = $_POST["idInfoMod"];
    //Recupero i valori immessi nei campi di registrazione
    if (isset($_POST["infoMod"])){
  	  $infoMod = $_POST['infoMod'];
    }else{
      $infoModNuova = $_POST['infoModNuova'];
    }

    //se non ci sono errori
    if ($erroreReg=="false"){
        if (isset($_POST["infoModNuova"])){
          $infoNew=$_POST["infoModNuova"];
          $qordAnnoNuova = "UPDATE infopersona SET Informazioni='$infoNew' WHERE IdPersona='$idInfo'";
          $qordAnnoNuovaE = mysqli_query($conn,$qordAnnoNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
