<?php
    //distruggo la sessione e indirizzo alla home
    include 'connect.php';
    session_start();
    if (isset($_POST["id"])){
      $IDMess=$_POST["id"];
      $qEliminaMess = "DELETE FROM crowdsourcing WHERE IDMessaggio='$IDMess'";
      $qEliminaMessE = mysqli_query($conn,$qEliminaMess);
      $risposta="Messaggio eliminato";
      echo $risposta;
    }
?>
