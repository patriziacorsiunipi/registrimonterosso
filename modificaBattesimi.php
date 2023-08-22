<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["idBattesimo"])){
    //Recupero i valori immessi nei campi di registrazione
    $idBattesimo=$_POST["idBattesimo"];
    if (isset($_POST["annoMod"])){
      $annoMod=$_POST['annoMod'];
    }else{
      $annoModNuova=$_POST['annoModNuova'];
    }
    if (isset($_POST["ordAnnoMod"])){
  	  $ordAnnoMod = $_POST['ordAnnoMod'];
    }else{
      $ordAnnoModNuova = $_POST['ordAnnoModNuova'];
    }
    if (isset($_POST["trascImmMod"])){
      $trascImmMod = $_POST['trascImmMod'];
    }else{
      $trascImmModNuova = $_POST["trascImmModNuova"];
    }
    if (isset($_POST["numRegMod"])){
      $numRegMod = $_POST['numRegMod'];
    }else{
      $numRegModNuova = $_POST["numRegModNuova"];
    }
    if (isset($_POST["ordRegMod"])){
      $ordRegMod = $_POST['ordRegMod'];
    }else{
      $ordRegModNuova = $_POST["ordRegModNuova"];
    }
    if (isset($_POST["sessoMod"])){
      $sessoMod = $_POST['sessoMod'];
    }else{
      $sessoModNuova = $_POST["sessoModNuova"];
    }
    if (isset($_POST["cognomeMod"])){
      $cognomeMod = $_POST['cognomeMod'];
    }else{
      $cognomeModNuova = $_POST["cognomeModNuova"];
    }
    if (isset($_POST["nomeMod"])){
      $nomeMod = $_POST['nomeMod'];
    }else{
      $nomeModNuova = $_POST["nomeModNuova"];
    }
    if (isset($_POST["nomePadreMod"])){
      $nomePadreMod = $_POST['nomePadreMod'];
    }else{
      $nomePadreModNuova = $_POST["nomePadreModNuova"];
    }
    if (isset($_POST["cognMadreMod"])){
      $cognMadreMod = $_POST['cognMadreMod'];
    }else{
      $cognMadreModNuova = $_POST["cognMadreModNuova"];
    }
    if (isset($_POST["nomeMadreMod"])){
      $nomeMadreMod = $_POST['nomeMadreMod'];
    }else{
      $nomeMadreModNuova = $_POST["nomeMadreModNuova"];
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["annoModNuova"])){
          $annoNew=$_POST["annoModNuova"];
          //inserisco tutto nel database
          $qAnnoNuova = "UPDATE battesimo SET Anno='$annoNew' WHERE IDBattesimo='$idBattesimo'";
          $qAnnoNuovaE = mysqli_query($conn,$qAnnoNuova);
        }
        if (isset($_POST["ordAnnoModNuova"])){
          $ordAnnoNew=$_POST["ordAnnoModNuova"];
          $qordAnnoNuova = "UPDATE battesimo SET OrdineAnno='$ordAnnoNew' WHERE IDBattesimo='$idBattesimo'";
          $qordAnnoNuovaE = mysqli_query($conn,$qordAnnoNuova);
        }
        if (isset($_POST["trascImmModNuova"])){
          $trascrImmNew=$_POST["trascImmModNuova"];
          $qtrascImmNuova= "UPDATE battesimo SET TrascrizioneImmagine='$trascrImmNew' WHERE IDBattesimo='$idBattesimo'";
          $qtrascImmNuovaE = mysqli_query($conn,$qtrascImmNuova);
        }
        if (isset($_POST["numRegModNuova"])){
          $numRegNew=$_POST["numRegModNuova"];
          $qnumRegNuova= "UPDATE battesimo SET NumRegistro='$numRegNew' WHERE IDBattesimo='$idBattesimo'";
          $qnumRegNuovaE = mysqli_query($conn,$qnumRegNuova);
        }
        if (isset($_POST["ordRegModNuova"])){
          $ordRegNew=$_POST["ordRegModNuova"];
          $qordRegNuova= "UPDATE battesimo SET OrdineRegistro='$ordRegNew' WHERE IDBattesimo='$idBattesimo'";
          $qordRegNuovaE = mysqli_query($conn,$qordRegNuova);
        }
        if (isset($_POST["sessoModNuova"])){
          $sessoNew=$_POST["sessoModNuova"];
          $qsessoNuova= "UPDATE battesimo SET Sesso='$sessoNew' WHERE IDBattesimo='$idBattesimo'";
          $qsessoNuovaE = mysqli_query($conn,$qsessoNuova);
        }
        if (isset($_POST["cognomeModNuova"])){
          $cognomeNew=$_POST["cognomeModNuova"];
          $qcognomeNuova= "UPDATE battesimo SET Cognome='$cognomeNew' WHERE IDBattesimo='$idBattesimo'";
          $qcognomeNuovaE = mysqli_query($conn,$qcognomeNuova);
        }
        if (isset($_POST["nomeModNuova"])){
          $nomeNew=$_POST["nomeModNuova"];
          $qnomeNuova= "UPDATE battesimo SET Nome='$nomeNew' WHERE IDBattesimo='$idBattesimo'";
          $qnomeNuovaE = mysqli_query($conn,$qnomeNuova);
        }
        if (isset($_POST["nomePadreModNuova"])){
          $padreNew=$_POST["nomePadreModNuova"];
          $qpadreNuova= "UPDATE battesimo SET NomePadre='$padreNew' WHERE IDBattesimo='$idBattesimo'";
          $qpadreNuovaE = mysqli_query($conn,$qpadreNuova);
        }
        if (isset($_POST["cognMadreModNuova"])){
          $cognMadreNew=$_POST["cognMadreModNuova"];
          $qcognMadreNuova= "UPDATE battesimo SET CognomeMadre='$cognMadreNew' WHERE IDBattesimo='$idBattesimo'";
          $qcognMadreNuovaE = mysqli_query($conn,$qcognMadreNuova);
        }
        if (isset($_POST["nomeMadreModNuova"])){
          $nomeMadreNew=$_POST["nomeMadreModNuova"];
          $qnomeMadreNuova= "UPDATE battesimo SET NomeMadre='$nomeMadreNew' WHERE IDBattesimo='$idBattesimo'";
          $qnomeMadreNuovaE = mysqli_query($conn,$qnomeMadreNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
