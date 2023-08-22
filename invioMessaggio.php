<?php
session_start();
include 'connect.php';
$errore = 0;
if (isset($_POST["IDPersona"]) && isset($_SESSION["emailUtente"]) && isset($_POST["messaggio"])){
  $IDpersona=$_POST["IDPersona"];
  $emailUtente=$_SESSION["emailUtente"];
  $messaggio=mysqli_real_escape_string($conn,$_POST["messaggio"]);
  $qMessaggio = "INSERT INTO crowdsourcing (DataOra,Utente,IDPersona,Messaggio) VALUES (NOW(),'$emailUtente','$IDpersona','$messaggio')";
  $qMessaggioE = mysqli_query($conn,$qMessaggio);
  if (!$qMessaggioE){
    echo "Errore".mysqli_error($conn);
  }
  echo ($errore);
}else{
  $errore=1;
  echo ($errore);
}
mysqli_close($conn);
?>
