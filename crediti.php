<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
  include 'connect.php';
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Crediti</h1>
      <div class="row mt-5">
        <div class="col-md-8 text-justify">
          Il progetto nasce dal lavoro di digitalizzazione e trascrizione dei registri svolto da Gustavo Moggia il quale poi ha deciso di condividere il materiale
          con l'Università di Pisa per renderlo fruibile al pubblico tramite un sito web.
          Grazie al Laboratorio di Cultura Digitale dell'Università di Pisa che ha disposto
          questo progetto come materia di tirocinio, la piattaforma è stata sviluppata da Chiara D'Anzi, andando a costituire l'argomento della sua Tesi di Laurea
          con titolo "I registri parrocchiali di Monterosso: sviluppo di una piattaforma web per la ricerca storico-demografica e genealogica" (relatori
          la prof.ssa Enrica Salvatori, il prof. Vittore Casarosa e il signor Gustavo Moggia).
          <br><br><br>
        </div>
        <div class="col-md-8 text-justify">
          <span><img src="img/CC0_button.svg" alt="Public Domain"></span>
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
$(".nav-iten").css("border-bottom","");
$(".crediti").css("border-bottom","solid white 4px");
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
