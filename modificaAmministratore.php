<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST["id"])){
    //Recupero i valori immessi nei campi di registrazione
    $id=$_POST["id"];
    if (isset($_POST["nome"])){
      $nome=mysqli_real_escape_string($conn,$_POST['nome']);
    }else{
      $nomeNuova=mysqli_real_escape_string($conn,$_POST['nomeNuova']);
      //se il nome è più lungo di 50 carattermi stampo errore
      if (strlen($nomeNuova)>50){
        $erroreReg = 'Lunghezza massima 50 car.';
      }
      //se il nome contiene numeri stampo errore
      if(preg_match('/[0-9+-:,;.?!"£$%&(){}=]/i', $nomeNuova)){
        $erroreReg = 'Nome non valido';
      }
    }
    if (isset($_POST["email"])){
  	  $email = strtolower($_POST['email']);
    }else{
      $emailNuova = strtolower($_POST['emailNuova']);
      //faccio le query che mi serviranno per i confronti
      $qEmail = "SELECT Email FROM amministratore WHERE Email='$emailNuova'";
      $qEmailE = mysqli_query($conn,$qEmail);
      $contaEmail = mysqli_num_rows($qEmailE);
      //se l'email è già utilizzata stampo errore
      if ($contaEmail>0){
        $erroreReg = 'Email già utilizzata';
      }
      //se email non è valida stampo errore
      if (!filter_var($emailNuova, FILTER_VALIDATE_EMAIL)) {
        $erroreReg = 'Email non valida!';
      }
    }
    if (isset($_POST["password"])){
      $password = $_POST['password'];
    }else{
      $passwordNuova = $_POST["passwordNuova"];
      //se la password è minore di 8 o maggiore di 12 caratteri stampo errore
      if(strlen($_POST["passwordNuova"])<8||strlen($_POST["passwordNuova"])>12){
        $erroreReg = 'Password non valida! Min:8 caratteri - Max:12 caratteri';
      }
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        if (isset($_POST["passwordNuova"])){
          $passwordNuovo=$_POST["passwordNuova"];
          //inserisco tutto nel database
          $qPassNuova = "UPDATE amministratore SET Password='$passwordNuovo' WHERE IDAmministratore='$id'";
          $qPassNuovaE = mysqli_query($conn,$qPassNuova);
        }
        if (isset($_POST["nomeNuova"])){
          $nomeNuovo=$_POST["nomeNuova"];
          $qnomeNuovo = "UPDATE amministratore SET Nome='$nomeNuovo' WHERE IDAmministratore='$id'";
          $qnomeNuovoE = mysqli_query($conn,$qnomeNuovo);
        }
        if (isset($_POST["emailNuova"])){
          $emailNuovo=$_POST["emailNuova"];
          $qemailNuovo = "UPDATE amministratore SET Email='$emailNuovo' WHERE IDAmministratore='$id'";
          $qemailNuovoE = mysqli_query($conn,$qemailNuovo);
        }
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
