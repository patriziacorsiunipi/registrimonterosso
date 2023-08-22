<?php
  //apro la sessione e includo la connessione al database
  session_start();
  include'connect.php';
  if (isset($_POST["persona"]) && isset($_POST["registro"])){
    $persona = addslashes ($_POST["persona"]);
    $registro = $_POST["registro"];
    //cerca il nome della persona
    if($registro=="matrimonio"){
      $qPersona = "SELECT CognomeSposo,NomeSposo FROM $registro WHERE Anno<1900 AND (CognomeSposo LIKE '$persona%' OR NomeSposo LIKE '$persona%' OR CONCAT(CognomeSposo,  ' ', NomeSposo) LIKE '$persona%' OR CONCAT(NomeSposo,  ' ', CognomeSposo) LIKE '$persona%') GROUP BY CognomeSposo, NomeSposo LIMIT 5";
      $qPersonaE = mysqli_query($conn,$qPersona);
      $contaPersone = mysqli_num_rows($qPersonaE);
    }else{
      $qPersona = "SELECT Cognome,Nome FROM $registro WHERE Anno<1900 AND Sesso = 'M' AND (Cognome LIKE '$persona%' OR Nome LIKE '$persona%' OR CONCAT(Cognome,  ' ', Nome) LIKE '$persona%' OR CONCAT(Nome,  ' ', Cognome) LIKE '$persona%') GROUP BY Cognome, Nome LIMIT 5";
      $qPersonaE = mysqli_query($conn,$qPersona);
      $contaPersone = mysqli_num_rows($qPersonaE);
    }
    if ($contaPersone>0){
      //se esistono corrispondenze stampa la lista di quest'ultime
      while($Persone=mysqli_fetch_array($qPersonaE)){
        echo ("
          <a href='javascript:void(0)' class='suggerimentiUomo list-group-item list-group-item-action border-1'>$Persone[0] $Persone[1]</a>
        ");
      }
    }else{
      echo ("
        <a href='javascript:void(0)' class='suggerimentiUomo list-group-item list-group-item-action border-1'>Nessun risultato</a>
      ");
    }
  }
  mysqli_close($conn);
 ?>
