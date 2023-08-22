<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["idBattesimo"])){
    //Recupero i valori immessi nei campi di registrazione
    $idBattesimo=$_POST["idBattesimo"];
    if (isset($_POST["IDMorte"])){
      $IDMorte=$_POST['IDMorte'];
    }else{
      $IDMorteNuova=$_POST['IDMorteNuova'];
    }
    if (isset($_POST["morteIncerto"])){
  	  $morteIncerto = $_POST['morteIncerto'];
    }else{
      $morteIncertoNuova = $_POST['morteIncertoNuova'];
    }
    if (isset($_POST["IDMatrimonio"])){
      $IDMatrimonio = $_POST['IDMatrimonio'];
    }else{
      $IDMatrimonioNuova = $_POST["IDMatrimonioNuova"];
    }
    if (isset($_POST["matrimonioIncerto"])){
      $matrimonioIncerto = $_POST['matrimonioIncerto'];
    }else{
      $matrimonioIncertoNuova = $_POST["matrimonioIncertoNuova"];
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["IDMorteNuova"])){
          $IDMorteNew=$_POST["IDMorteNuova"];
          //inserisco tutto nel database
          $qIDMorteNuova = "UPDATE battesimomorte SET IDMorte='$IDMorteNew' WHERE IDBattesimo='$idBattesimo'";
          $qIDMorteNuovaE = mysqli_query($conn,$qIDMorteNuova);
        }
        if (isset($_POST["morteIncertoNuova"])){
          $morteIncertoNew=$_POST["morteIncertoNuova"];
          $qmorteIncertoNuova = "UPDATE battesimomorte SET MorteIncerto='$morteIncertoNew' WHERE IDBattesimo='$idBattesimo'";
          $qmorteIncertoNuovaE = mysqli_query($conn,$qmorteIncertoNuova);
        }
        if (isset($_POST["IDMatrimonioNuova"])){
          $IDMatrimonioNew=$_POST["IDMatrimonioNuova"];
          $qIDMatrimonioNuova= "UPDATE battesimomorte SET IDMatrimonio='$IDMatrimonioNew' WHERE IDBattesimo='$idBattesimo'";
          $qIDMatrimonioNuovaE = mysqli_query($conn,$qIDMatrimonioNuova);
        }
        if (isset($_POST["matrimonioIncertoNuova"])){
          $matrimonioIncertoNew=$_POST["matrimonioIncertoNuova"];
          $qmatrimonioIncertoNuova= "UPDATE battesimomorte SET MatrimonioIncerto='$matrimonioIncertoNew' WHERE IDBattesimo='$idBattesimo'";
          $qmatrimonioIncertoNuovaE = mysqli_query($conn,$qmatrimonioIncertoNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
