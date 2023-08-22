<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["idMatrimonio"])){
    //Recupero i valori immessi nei campi di registrazione
    $idMatrimonio=$_POST["idMatrimonio"];
    if (isset($_POST["annoMod1"])){
      $annoMod1=$_POST['annoMod1'];
    }else{
      $annoMod1Nuova=$_POST['annoMod1Nuova'];
    }
    if (isset($_POST["ordAnnoMod1"])){
  	  $ordAnnoMod1 = $_POST['ordAnnoMod1'];
    }else{
      $ordAnnoMod1Nuova = $_POST['ordAnnoMod1Nuova'];
    }
    if (isset($_POST["trascImmMod1"])){
      $trascImmMod1 = $_POST['trascImmMod1'];
    }else{
      $trascImmMod1Nuova = $_POST["trascImmMod1Nuova"];
    }
    if (isset($_POST["numRegMod1"])){
      $numRegMod1 = $_POST['numRegMod1'];
    }else{
      $numRegMod1Nuova = $_POST["numRegMod1Nuova"];
    }
    if (isset($_POST["ordRegMod1"])){
      $ordRegMod1 = $_POST['ordRegMod1'];
    }else{
      $ordRegMod1Nuova = $_POST["ordRegMod1Nuova"];
    }
    if (isset($_POST["cognSposoMod"])){
      $cognSposoMod = $_POST['cognSposoMod'];
    }else{
      $cognSposoModNuova = $_POST["cognSposoModNuova"];
    }
    if (isset($_POST["nomeSposoMod"])){
      $nomeSposoMod = $_POST['nomeSposoMod'];
    }else{
      $nomeSposoModNuova = $_POST["nomeSposoModNuova"];
    }
    if (isset($_POST["padreSposoMod"])){
      $padreSposoMod = $_POST['padreSposoMod'];
    }else{
      $padreSposoModNuova = $_POST["padreSposoModNuova"];
    }
    if (isset($_POST["etasoMod"])){
      $etasoMod = $_POST['etasoMod'];
    }else{
      $etasoModNuova = $_POST["etasoModNuova"];
    }
    if (isset($_POST["cognSposaMod"])){
      $cognSposaMod = $_POST['cognSposaMod'];
    }else{
      $cognSposaModNuova = $_POST["cognSposaModNuova"];
    }
    if (isset($_POST["nomeSposaMod"])){
      $nomeSposaMod = $_POST['nomeSposaMod'];
    }else{
      $nomeSposaModNuova = $_POST["nomeSposaModNuova"];
    }
    if (isset($_POST["padreSposaMod"])){
      $padreSposaMod = $_POST['padreSposaMod'];
    }else{
      $padreSposaModNuova = $_POST["padreSposaModNuova"];
    }
    if (isset($_POST["etasaMod"])){
      $etasaMod = $_POST['etasaMod'];
    }else{
      $etasaModNuova = $_POST["etasaModNuova"];
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["annoMod1Nuova"])){
          $annoNew=$_POST["annoMod1Nuova"];
          //inserisco tutto nel database
          $qAnnoNuova = "UPDATE matrimonio SET Anno='$annoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qAnnoNuovaE = mysqli_query($conn,$qAnnoNuova);
        }
        if (isset($_POST["ordAnnoMod1Nuova"])){
          $ordAnnoNew=$_POST["ordAnnoMod1Nuova"];
          $qordAnnoNuova = "UPDATE matrimonio SET OrdineAnno='$ordAnnoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qordAnnoNuovaE = mysqli_query($conn,$qordAnnoNuova);
        }
        if (isset($_POST["trascImmMod1Nuova"])){
          $trascrImmNew=$_POST["trascImmMod1Nuova"];
          $qtrascImmNuova= "UPDATE matrimonio SET TrascrizioneImmagine='$trascrImmNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qtrascImmNuovaE = mysqli_query($conn,$qtrascImmNuova);
        }
        if (isset($_POST["numRegMod1Nuova"])){
          $numRegNew=$_POST["numRegMod1Nuova"];
          $qnumRegNuova= "UPDATE matrimonio SET NumRegistro='$numRegNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qnumRegNuovaE = mysqli_query($conn,$qnumRegNuova);
        }
        if (isset($_POST["ordRegMod1Nuova"])){
          $ordRegNew=$_POST["ordRegMod1Nuova"];
          $qordRegNuova= "UPDATE matrimonio SET OrdineRegistro='$ordRegNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qordRegNuovaE = mysqli_query($conn,$qordRegNuova);
        }
        if (isset($_POST["cognSposoModNuova"])){
          $cognSposoNew=$_POST["cognSposoModNuova"];
          $qcognSposoNuova= "UPDATE matrimonio SET CognomeSposo='$cognSposoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qcognSposoNuovaE = mysqli_query($conn,$qcognSposoNuova);
        }
        if (isset($_POST["nomeSposoModNuova"])){
          $nomeSposoNew=$_POST["nomeSposoModNuova"];
          $qnomeSposoNuova= "UPDATE matrimonio SET NomeSposo='$nomeSposoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qnomeSposoNuovaE = mysqli_query($conn,$qnomeSposoNuova);
        }
        if (isset($_POST["padreSposoModNuova"])){
          $padreSposoNew=$_POST["padreSposoModNuova"];
          $qpadreSposoNuova= "UPDATE matrimonio SET PadreSposo='$padreSposoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qpadreSposoNuovaE = mysqli_query($conn,$qpadreSposoNuova);
        }
        if (isset($_POST["etasoModNuova"])){
          $etasoNew=$_POST["etasoModNuova"];
          $qetaSposoNuova= "UPDATE matrimonio SET EtaSposo='$etasoNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qetaSposoNuovaE = mysqli_query($conn,$qetaSposoNuova);
        }
        if (isset($_POST["cognSposaModNuova"])){
          $cognSposaNew=$_POST["cognSposaModNuova"];
          $qcognSposaNuova= "UPDATE matrimonio SET CognomeSposa='$cognSposaNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qcognSposaNuovaE = mysqli_query($conn,$qcognSposaNuova);
        }
        if (isset($_POST["nomeSposaModNuova"])){
          $nomeSposaNew=$_POST["nomeSposaModNuova"];
          $qnomeSposaNuova= "UPDATE matrimonio SET NomeSposa='$nomeSposaNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qnomeSposaNuovaE = mysqli_query($conn,$qnomeSposaNuova);
        }
        if (isset($_POST["padreSposaModNuova"])){
          $padreSposaNew=$_POST["padreSposaModNuova"];
          $qpadreSposaNuova= "UPDATE matrimonio SET PadreSposa='$padreSposaNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qpadreSposaNuovaE = mysqli_query($conn,$qpadreSposaNuova);
        }
        if (isset($_POST["etasaModNuova"])){
          $etasaNew=$_POST["etasaModNuova"];
          $qetaSposaNuova= "UPDATE matrimonio SET EtaSposa='$etasaNew' WHERE IDMatrimonio='$idMatrimonio'";
          $qetaSposaNuovaE = mysqli_query($conn,$qetaSposaNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
