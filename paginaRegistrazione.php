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
    <!-- MODAL DI REGISTRAZIONE -->
    <div class="container">
      <div class="col-lg-6">
        <h3 class="modal-title mt-5 font-weight-bold blue-grey-text">Modulo di registrazione</h4>
        <form class="needs-validation">
          <div id="messaggioErrore1" class="mb-3" style="color:red;"></div>
            <!-- Nome -->
            <label class="font-weight-bold" for="nomeReg">Nome</label>
            <input type="nome" id="nomeReg" class="form-control mb-4" placeholder="es. Mario Rossi" required>
            <!-- Email -->
            <label class="font-weight-bold" for="emailReg">Email</label>
            <input type="email" id="emailReg" class="form-control mb-4" placeholder="es. mariorossi@gmail.com" required>
            <!-- Password -->
            <label class="font-weight-bold" for="passwordReg">Password</label>
            <input type="password" id="passwordReg" class="form-control mb-4" placeholder="Password" required>
            <button id="regButton" class="btn unique-color text-white btn-block my-4" name="submit" type="submit">Registrati</button>
            <!-- Register -->
        </form>
        <hr>
        <div class="container mt-0 mb-3 p-0">
          <p class="text-center" style="font-size:15px;">oppure</p>
          <?php
          include 'GoogleAccessSessions.php';
          echo ($login_button);
          ?>
        </div>
        <p style="font-size:13px;">Già registrato? <a class="text-primary" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modalLoginForm">Accedi</a></p>
      </div>
    </div>
    <!-- modal di registrazione -->
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
