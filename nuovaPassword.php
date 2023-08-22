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
      <h1 class="text-center font-weight-bold blue-grey-text">Registri parrocchiali di Monterosso</h1>
      <div class="row mt-5 ">
        <div class="col-md-12 d-flex justify-content-center text-justify">
          <?php
          if (empty($_GET["sl"])||empty($_GET["tk"])){
            echo "Richiesta nuova password non validata";
          }else{
            $selector=$_GET["sl"];
            $token=$_GET["tk"];
              ?>
              <form class="needs-validation text-center border border-light p-5" action="resetPassword.php" method="post" style="background-color:rgba(63, 114, 155,0.3);">
                  <p class="h4 mb-4 font-weight-bold">Inserisci una nuova password</p>
                  <input type="hidden" name="selector" class="form-control mb-4" value="<?php echo ($selector);?>" >
                  <input type="hidden" name="token" class="form-control mb-4" value="<?php echo ($token);?>" >
                  <p>Inserisci la nuova password</p>
                  <input type="password" name="passwordNuova" class="form-control mb-4" placeholder="Nuova password" required>
                  <p>Conferma la password</p>
                  <input type="password" name="passwordConferma" class="form-control mb-4" placeholder="Ripeti password" required>
                  <button class="btn unique-color text-white btn-block" name="nuovaPassword" type="submit">Salva</button>
                  <?php
                  if (isset($_GET["np"])){
                    if ($_GET["np"]=="err1"){
                      echo("<p style='color:red;'>I due campi devono contenere la stessa password</p>");
                    }elseif($_GET["np"]=="err2"){
                      echo("<p style='color:red;'>Password non valida! Min:8 caratteri - Max:12 caratteri</p>");
                    }
                  }
                  ?>
              </form>

              <?php
          }

          ?>
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
