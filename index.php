<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
  include 'connect.php';
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/mycss.css">
  <title>Registri Monterosso</title>
</head>
<body>
  <main class="contenitore">
    <?php include 'GoogleAccessSessions.php' ?>
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="text-center font-weight-bold blue-grey-text">Registri parrocchiali di Monterosso</h1>
      <div class="row mt-5">
        <div class="col-md-5 text-justify">
          Questo sito raccoglie tutti i dati dei registri parrocchiali del comune di Monterosso al Mare, costituiti da 38 registri dei battesimi,
          33 registri dei matrimoni e 33 registri delle morti. Questi registri coprono il periodo che va dalla fine del XVI secolo fino al XX secolo. 
          I dati disponibili consistono nelle immagini delle pagine dei registri (circa 35.000 immagini) e delle trascrizioni
           di ogni atto (circa 29.000 trascrizioni).<br>
          L’obiettivo è quello di mettere a disposizione uno strumento di ricerca e di studio di questo prezioso patrimonio storico, per ricerche di tipo genealogico, storico e demografico. Registrandosi al sito è possibile anche contribuire nell'arricchimento della conoscenza su questo materiale lasciando messaggi e commenti.
        </div>
        <div class="col-md-7 text-justify mt-2">
          <img src="img/MonterossoAlMare-1.jpg" alt="Monterosso al Mare" style="max-height:100%; max-width:100%">
        </div>
      </div>
      <div class="card border-info mt-5">
       <div class="card-header bg-info text-white">
         <b>Perché accedere come utente registrato?</b>
       </div>
       <div class="card-body">
         La <b>registrazione</b> permetterà ai visitatori di questo sito di contribuire alla raccolta di <b>dati
         mancanti o dubbi</b>. Nella "scheda anagrafica" di una persona, cliccando sul nome dei campi in arancione,
         si apre una finestra in cui è possibile scrivere un suggerimento o un commento riguardo a quel nome.
         Tutti i suggerimenti, se considerati validi, verranno aggiunti ai dati esistenti, andando ad <b>arricchire</b>
         la conoscenza della popolazione di Monterosso.
       </div>
      </div>
    </div>
    <!-- titolo e desccrizione -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php' ?>
  <!-- footer -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>

