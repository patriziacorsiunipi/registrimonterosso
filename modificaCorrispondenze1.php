<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["idMorte"])){
    //Recupero i valori immessi nei campi di registrazione
    $idMorte=$_POST["idMorte"];
    if (isset($_POST["idBattesimo"])){
      $idBattesimo=$_POST['idBattesimo'];
    }else{
      $idBattesimoNuova=$_POST['idBattesimoNuova'];
    }
    if (isset($_POST["battesimoIncerto"])){
  	  $battesimoIncerto = $_POST['battesimoIncerto'];
    }else{
      $battesimoIncertoNuova = $_POST['battesimoIncertoNuova'];
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["idBattesimoNuova"])){
          $idBattesimoNuovaNew=$_POST["idBattesimoNuova"];
          //inserisco tutto nel database
          $qIDBattesimoNuova = "UPDATE mortebattesimo SET IDBattesimo='$idBattesimoNuovaNew' WHERE IDMorte='$idMorte'";
          $qIDBattesimoNuovaE = mysqli_query($conn,$qIDBattesimoNuova);
        }
        if (isset($_POST["battesimoIncertoNuova"])){
          $battesimoIncertoNew=$_POST["battesimoIncertoNuova"];
          $qbattesimoIncertoNuova = "UPDATE mortebattesimo SET BattesimoIncerto='$battesimoIncertoNew' WHERE IDMorte='$idMorte'";
          $qbattesimoIncertoNuovaE = mysqli_query($conn,$qbattesimoIncertoNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
