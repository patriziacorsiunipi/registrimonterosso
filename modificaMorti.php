<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["idMorte"])){
    //Recupero i valori immessi nei campi di registrazione
    $idMorte=$_POST["idMorte"];
    if (isset($_POST["annoBattMod"])){
      $annoBattMod=$_POST['annoBattMod'];
    }else{
      $annoBattModNuova=$_POST['annoBattModNuova'];
    }
    if (isset($_POST["annoMorteMod"])){
      $annoMorteMod=$_POST['annoMorteMod'];
    }else{
      $annoMorteModNuova=$_POST['annoMorteModNuova'];
    }
    if (isset($_POST["ordAnnoMod2"])){
  	  $ordAnnoMod2 = $_POST['ordAnnoMod2'];
    }else{
      $ordAnnoMod2Nuova = $_POST['ordAnnoMod2Nuova'];
    }
    if (isset($_POST["trascImmMod2"])){
      $trascImmMod2 = $_POST['trascImmMod2'];
    }else{
      $trascImmMod2Nuova = $_POST["trascImmMod2Nuova"];
    }
    if (isset($_POST["numRegMod2"])){
      $numRegMod2 = $_POST['numRegMod2'];
    }else{
      $numRegMod2Nuova = $_POST["numRegModNuova2"];
    }
    if (isset($_POST["ordRegMod2"])){
      $ordRegMod2 = $_POST['ordRegMod2'];
    }else{
      $ordRegMod2Nuova = $_POST["ordRegMod2Nuova"];
    }
    if (isset($_POST["sessoMod1"])){
      $sessoMod1 = $_POST['sessoMod1'];
    }else{
      $sessoMod1Nuova = $_POST["sessoMod1Nuova"];
    }
    if (isset($_POST["cognomeMod1"])){
      $cognomeMod1 = $_POST['cognomeMod1'];
    }else{
      $cognomeMod1Nuova = $_POST["cognomeMod1Nuova"];
    }
    if (isset($_POST["nomeMod1"])){
      $nomeMod = $_POST['nomeMod1'];
    }else{
      $nomeMod1Nuova = $_POST["nomeMod1Nuova"];
    }
    if (isset($_POST["fmMod"])){
      $fmMod = $_POST['fmMod'];
    }else{
      $fmModNuova = $_POST["fmModNuova"];
    }
    if (isset($_POST["nomeConMod"])){
      $nomeConMod = $_POST['nomeConMod'];
    }else{
      $nomeConModNuova = $_POST["nomeConModNuova"];
    }
    if (isset($_POST["nomePadreConMod"])){
      $nomePadreConMod = $_POST['nomePadreConMod'];
    }else{
      $nomePadreConModNuova = $_POST["nomePadreConModNuova"];
    }
    if (isset($_POST["nomePadreMod1"])){
      $nomePadreMod1 = $_POST['nomePadreMod1'];
    }else{
      $nomePadreMod1Nuova = $_POST["nomePadreMod1Nuova"];
    }
    if (isset($_POST["cognMadreMod1"])){
      $cognMadreMod1 = $_POST['cognMadreMod1'];
    }else{
      $cognMadreMod1Nuova = $_POST["cognMadreMod1Nuova"];
    }
    if (isset($_POST["nomeMadreMod1"])){
      $nomeMadreMod1 = $_POST['nomeMadreMod1'];
    }else{
      $nomeMadreMod1Nuova = $_POST["nomeMadreMod1Nuova"];
    }
    if (isset($_POST["etaMorteMod"])){
      $etaMorteMod = $_POST['etaMorteMod'];
    }else{
      $etaMorteModNuova = $_POST["etaMorteModNuova"];
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["annoBattModNuova"])){
          $annoBattNew=$_POST["annoBattModNuova"];
          //inserisco tutto nel database
          $qAnnoBattNuova = "UPDATE morte SET AnnoBattesimo='$annoBattNew' WHERE IDMorte='$idMorte'";
          $qAnnoBattNuovaE = mysqli_query($conn,$qAnnoBattNuova);
        }
        if (isset($_POST["annoMorteModNuova"])){
          $annoMorteNew=$_POST["annoMorteModNuova"];
          //inserisco tutto nel database
          $qAnnoMorteNuova = "UPDATE morte SET Anno='$annoMorteNew' WHERE IDMorte='$idMorte'";
          $qAnnoMorteNuovaE = mysqli_query($conn,$qAnnoMorteNuova);
        }
        if (isset($_POST["ordAnnoMod2Nuova"])){
          $ordAnno2New=$_POST["ordAnnoMod2Nuova"];
          $qordAnno2Nuova = "UPDATE morte SET OrdineAnno='$ordAnno2New' WHERE IDMorte='$idMorte'";
          $qordAnno2NuovaE = mysqli_query($conn,$qordAnno2Nuova);
        }
        if (isset($_POST["trascImmMod2Nuova"])){
          $trascrImm2New=$_POST["trascImmMod2Nuova"];
          $qtrascImm2Nuova= "UPDATE morte SET TrascrizioneImmagine='$trascrImm2New' WHERE IDMorte='$idMorte'";
          $qtrascImm2NuovaE = mysqli_query($conn,$qtrascImm2Nuova);
        }
        if (isset($_POST["numRegMod2Nuova"])){
          $numReg2New=$_POST["numRegMod2Nuova"];
          $qnumReg2Nuova= "UPDATE morte SET NumRegistro='$numReg2New' WHERE IDMorte='$idMorte'";
          $qnumReg2NuovaE = mysqli_query($conn,$qnumReg2Nuova);
        }
        if (isset($_POST["ordRegMod2Nuova"])){
          $ordReg2New=$_POST["ordRegMod2Nuova"];
          $qordReg2Nuova= "UPDATE morte SET OrdineRegistro='$ordReg2New' WHERE IDMorte='$idMorte'";
          $qordReg2NuovaE = mysqli_query($conn,$qordReg2Nuova);
        }
        if (isset($_POST["sessoMod1Nuova"])){
          $sesso1New=$_POST["sessoMod1Nuova"];
          $qsesso1Nuova= "UPDATE morte SET Sesso='$sesso1New' WHERE IDMorte='$idMorte'";
          $qsesso1NuovaE = mysqli_query($conn,$qsesso1Nuova);
        }
        if (isset($_POST["cognomeMod1Nuova"])){
          $cognome1New=$_POST["cognomeMod1Nuova"];
          $qcognome1Nuova= "UPDATE morte SET Cognome='$cognome1New' WHERE IDMorte='$idMorte'";
          $qcognome1NuovaE = mysqli_query($conn,$qcognome1Nuova);
        }
        if (isset($_POST["nomeMod1Nuova"])){
          $nome1New=$_POST["nomeMod1Nuova"];
          $qnome1Nuova= "UPDATE morte SET Nome='$nome1New' WHERE IDMorte='$idMorte'";
          $qnome1NuovaE = mysqli_query($conn,$qnome1Nuova);
        }
        if (isset($_POST["fmModNuova"])){
          $fmNew=$_POST["fmModNuova"];
          $qfmNuova= "UPDATE morte SET FM='$fmNew' WHERE IDMorte='$idMorte'";
          $qfmNuovaE = mysqli_query($conn,$qfmNuova);
        }
        if (isset($_POST["nomeConModNuova"])){
          $nomeConNew=$_POST["nomeConModNuova"];
          $qnomeConNuova= "UPDATE morte SET NomeConiuge='$nomeConNew' WHERE IDMorte='$idMorte'";
          $qnomeConNuovaE = mysqli_query($conn,$qnomeConNuova);
        }
        if (isset($_POST["nomePadreConModNuova"])){
          $nomePadreConNew=$_POST["nomePadreConModNuova"];
          $qpadreConiugeNuova= "UPDATE morte SET Padre Coniuge='$nomePadreConNew' WHERE IDMorte='$idMorte'";
          $qpadreConiugeNuovaE = mysqli_query($conn,$qpadreConiugeNuova);
        }
        if (isset($_POST["nomePadreMod1Nuova"])){
          $padre1New=$_POST["nomePadreMod1Nuova"];
          $qpadre1Nuova= "UPDATE morte SET NomePadre='$padre1New' WHERE IDMorte='$idMorte'";
          $qpadre1NuovaE = mysqli_query($conn,$qpadre1Nuova);
        }
        if (isset($_POST["cognMadreMod1Nuova"])){
          $cognMadre1New=$_POST["cognMadreMod1Nuova"];
          $qcognMadre1Nuova= "UPDATE morte SET CognomeMadre='$cognMadre1New' WHERE IDMorte='$idMorte'";
          $qcognMadre1NuovaE = mysqli_query($conn,$qcognMadre1Nuova);
        }
        if (isset($_POST["nomeMadreMod1Nuova"])){
          $nomeMadre1New=$_POST["nomeMadreMod1Nuova"];
          $qnomeMadre1Nuova= "UPDATE morte SET NomeMadre='$nomeMadre1New' WHERE IDMorte='$idMorte'";
          $qnomeMadre1NuovaE = mysqli_query($conn,$qnomeMadre1Nuova);
        }
        if (isset($_POST["etaMorteModNuova"])){
          $etaMorteNew=$_POST["etaMorteModNuova"];
          $qetaMorteNuova= "UPDATE morte SET EtaMorte='$etaMorteNew' WHERE IDMorte='$idMorte'";
          $qetaMorteNuovaE = mysqli_query($conn,$qetaMorteNuova);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
