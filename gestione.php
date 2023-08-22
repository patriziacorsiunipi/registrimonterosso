<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
  include 'connect.php';
  if (isset($_SESSION['loginAmministratore'])){
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
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Gestione</h1>
      <hr>
      <div class="row mt-5">
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Registri parrocchiali
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione delle tabelle contenenti i dati dei registri parrocchiali per aggiornamento e manutenzione</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="registriData.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Corrispondenze
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione delle tabelle delle corrispondenze per aggiornamento e manutenzione</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="corrispondenze.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Informazioni su atti
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione delle informazioni condivise tramite l'attività di crowdsourcing riguardo un particolare atto</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="gestioneInformazioni.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Utenti
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione delle informazioni degli utenti registrati</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="gestioneUtenti.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Amministratori
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione delle informazioni sugli amministratori della piattaforma</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="gestioneAmministratori.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch">
          <div class="card mt-3">
            <div class="card-header font-weight-bold">
              Messaggi
            </div>
            <div class="card-body">
              <p class="card-text" style="font-size:16px;">Gestione dei messaggi di crowdsourcing inviati dagli utenti registrati della piattaforma</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <a href="gestioneMessaggi.php" class="btn btn-sm btn-light">VISUALIZZA</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- titolo e desccrizione -->
  </main>
  <!-- FOOTER -->
  <footer class="page-footer font-small unique-color">
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
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
