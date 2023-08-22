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
    <!-- menu di navigazione -->
    <nav class="navbar navbar-expand-md navbar-dark unique-color justify-content-between">
      <a class="navbar-brand font-weight-bold" href="">Registri Monterosso</a>
    </nav>
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
    <h3 class="text-center font-weight-bold blue-grey-text">Accesso amministratore</h3>
      <div class="col-lg-5 mt-5" style="margin:0 auto;">
      <form class="">
        <div id="messaggioErrore3" class="mb-3" style="color:red;"></div>
          <!-- Email -->
          <input type="email" id="emailLogAmm" class="form-control mb-4" placeholder="E-mail" required>
          <!-- Password -->
          <input type="password" id="passwordLogAmm" class="form-control mb-4" placeholder="Password" required>
          <button id="logButtonAmm" class="btn unique-color text-white btn-block my-4" name="submit" type="submit">Accedi come amministratore</button>
          <!-- Register -->
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
