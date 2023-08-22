<?php
    //distruggo la sessione e indirizzo alla home
    include 'connect.php';
    session_start();
    if (isset($_POST["id"])){
      $IDAmministratore=$_POST["id"];
      $qEliminaUtente = "DELETE FROM amministratore WHERE IDAmministratore='$IDAmministratore'";
      $qEliminaUtenteE = mysqli_query($conn,$qEliminaUtente);
      $risposta="Utente eliminato";
      echo $risposta;
    }
?>
