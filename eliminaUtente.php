<?php
    //distruggo la sessione e indirizzo alla home
    include 'connect.php';
    session_start();
    if (isset($_POST["id"])){
      $IDUtente=$_POST["id"];
      $qEliminaUtente = "DELETE FROM utente WHERE IDUtente='$IDUtente'";
      $qEliminaUtenteE = mysqli_query($conn,$qEliminaUtente);
      $risposta="Utente eliminato";
      echo $risposta;
    }
?>
