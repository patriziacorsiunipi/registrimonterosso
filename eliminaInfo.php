<?php
    //distruggo la sessione e indirizzo alla home
    include 'connect.php';
    session_start();
    if (isset($_POST["idInfo"])){
      $idInfo=$_POST["idInfo"];
      $qEliminaInfo = "DELETE FROM infopersona WHERE IdPersona='$idInfo'";
      $qEliminaInfoE = mysqli_query($conn,$qEliminaInfo);
      $risposta="Messaggio eliminato";
      echo $risposta;
    }
?>
