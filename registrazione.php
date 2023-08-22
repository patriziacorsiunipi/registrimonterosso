<?php
  //apro la sessione e includo la connessione al database
  session_start();
	include'connect.php';
  $erroreReg = "false";
  if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password']) ){
    //Recupero i valori immessi nei campi di registrazione
  	$nome=mysqli_real_escape_string($conn,$_POST['nome']);
  	$password = $_POST['password'];
  	$email = strtolower($_POST['email']);
    //faccio le query che mi serviranno per i confronti
    $qEmail = "SELECT Email FROM utente WHERE Email='$email'";
    $qEmailE = mysqli_query($conn,$qEmail);
    $contaEmail = mysqli_num_rows($qEmailE);
    //se il nome è più lungo di 50 carattermi stampo errore
    if (strlen($nome)>50){
      $erroreReg = 'Lunghezza massima 50 car.';
    }
    //se il nome contiene numeri stampo errore
    if(preg_match('/[0-9+-:,;.?!"£$%&(){}=]/i', $nome)){
      $erroreReg = 'Nome non valido';
    }
    //se l'email è già utilizzata stampo errore
    if ($contaEmail>0){
      $erroreReg = 'Email già utilizzata';
    }
    //se email non è valida stampo errore
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erroreReg = 'Email non valida!';
    }
    //se la password è minore di 8 o maggiore di 12 caratteri stampo errore
    if(strlen($password)<8||strlen($password)>12){
      $erroreReg = 'Password non valida! Min:8 caratteri - Max:12 caratteri';
    }
    //se non ci sono errori
    if ($erroreReg=="false"){
        //cripto la password inserita
        $cryptPassword=crypt($_POST['password'], '$2a$07$cdacvdfgZZMALJsdrhaeQQQPPPDASFDGSDFG$');
        //inserisco tutto nel database
        $qRegistr = "INSERT INTO utente (Email,Nome,Password) VALUES ('$email','$nome','$cryptPassword')";
        $qRegistrE = mysqli_query($conn,$qRegistr);
        $_SESSION['emailUtente'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['loginUtente'] = "true";
        echo $erroreReg;
      }else{
        echo $erroreReg;
      }
    }



  mysqli_close($conn);
?>
