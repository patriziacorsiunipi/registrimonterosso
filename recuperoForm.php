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
      <div class="row mt-5">
        <div class="col-md-12 d-flex justify-content-center text-justify">
          <form class="needs-validation text-center border border-light p-5" action="recupero1.php" method="post" style="background-color:rgba(63, 114, 155,0.3);">
              <p class="h4 mb-4 font-weight-bold">Recupero password</p>
              <p>Inserisci la tua email e ricevi il link per inserire una nuova password</p>
              <input type="email" name="email" id="email" class="form-control mb-4" placeholder="E-mail" required>
              <button id="inviaEmail" class="btn unique-color text-white btn-block" name="submit" type="submit">Invia</button>
              <?php
              if (isset($_GET["risposta"])){
                if ($_GET["risposta"]=="1"){
                  echo("<p style='color:green;'>Email inviata con successo. Controlla la tua posta!</p>");
                }elseif($_GET["risposta"]=="err1"){
                  echo("<p style='color:red;'>Inserisci l'email</p>");
                }elseif($_GET["risposta"]=="err2"){
                  echo("<p style='color:red;'>Errore: indirizzo email non riconosciuto</p>");
                }
              }
               ?>
          </form>
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
