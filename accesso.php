<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
	include'connect.php';
  $errore="false";
  //se i campi nickname e password sono inseriti
	if(isset($_POST['email'])&&isset($_POST['password'])){
    //registro le variabili nickname e password
		$email = $_POST['email'];
		$password = $_POST['password'];
    //cripto la password per questioni di sicurezza
    $DecryptPassword = crypt($password, '$2a$07$cdacvdfgZZMALJsdrhaeQQQPPPDASFDGSDFG$');
  	$qNickPass = "SELECT * FROM utente WHERE Email = '$email' AND Password = '$DecryptPassword' ";
  	$qNickPassE = mysqli_query($conn,$qNickPass);
  	$contaNickPass = mysqli_num_rows($qNickPassE);
    $aNickPass = mysqli_fetch_array($qNickPassE);
    //se esiste una riga contata
  	if ($contaNickPass == 1) {
      //apro la sessione Nickname, Login e, a seconda del tipo di utente, Autore o Utente
      $_SESSION['emailUtente'] = $aNickPass[1];
  		$_SESSION['nome'] = $aNickPass[2];
  		$_SESSION['loginUtente'] = "true";
  		echo($errore);
  	}else { //se non esistono corrispondenze stampo un messaggio di errore
      $errore="Nickname o password errati";
      echo($errore);
  	}
	}
  mysqli_close($conn);
?>
