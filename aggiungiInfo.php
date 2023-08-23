<?php
// Codice non utilizzato. Si collegava a una tabella inesistente.
?>

<?php
  //apro la sessione e includo la connessione al database
  // session_start();
	// include'connect.php';
  // $erroreReg = "false";
  // if (isset($_POST['idInfo']) && isset($_POST['info'])){
    // //Recupero i valori immessi nei campi di registrazione
  	// $info=mysqli_real_escape_string($conn,$_POST['info']);
  	// $idInfo = $_POST['idInfo'];
    // //faccio le query che mi serviranno per i confronti
    // $qIDInfo = "SELECT IdPersona FROM infoPersona WHERE IdPersona='$idInfo'";
    // $qIDInfoE = mysqli_query($conn,$qIDInfo);
    // $contaInfo = mysqli_num_rows($qIDInfoE);
    // //se l'id è già utilizzato stampo errore
    // if ($contaInfo>0){
    //   $erroreReg = 'Informazione già presente';
    // }
    // //se il nome è più lungo di 50 carattermi stampo errore
    // if (strlen($info)>1000){
    //   $erroreReg = 'Lunghezza massima 1000 car.';
    // }
    // //se non ci sono errori
    // if ($erroreReg=="false"){
    //     //inserisco tutto nel database
    //     $qRegistr = "INSERT INTO infopersona (IdPersona,Informazioni) VALUES ('$idInfo','$info')";
    //     $qRegistrE = mysqli_query($conn,$qRegistr);
    //     echo $erroreReg;
    //   }else{
    //     echo $erroreReg;
    //   }
    // }



  // mysqli_close($conn);
?>
