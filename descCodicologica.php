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
    <!-- menu di navigazione -->

    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Descrizione dei registri parrocchiali di Monterosso</h1>
      <h3 class="font-weight-bold blue-grey-text mt-5">Trascrizione degli atti</h3>
      <a href='file/Battesimo.txt' download>Atti di battesimo</a><br>
      <a href='file/Matrionio.txt' download>Atti di matrimonio</a><br>
      <a href='file/Mortetab.txt' download>Atti di morte</a><br>
      <h3 class="font-weight-bold blue-grey-text mt-5">Registri</h3>
      <div class="row">
        <div id='cardpop' class='col-lg-4 mt-3 d-flex align-items-stretch'>
          <div class='card text-center'>
            <img src='img/Battesimo.jpg' class='card-img-top' height='200'>
            <div class='card-footer text-muted'>
              <div class='btn-group flex-wrap'>
                <a href="file/Atti-Battesimo.html" type='button' class='footerbut btn btn-lg btn-outline' target="_blank">Registri di <b class="font-weight-bold">battesimo</b></a>
              </div>
            </div>
          </div>
        </div>
        <div id='cardpop' class='col-lg-4 mt-3 d-flex align-items-stretch'>
          <div class='card text-center'>
            <img src='img/Matrimonio.jpg' class='card-img-top' height='200'>
            <div class='card-footer text-muted'>
              <div class='btn-group flex-wrap'>
                <a href="file/Atti-Matrimonio.html" type='button' class='footerbut btn btn-lg btn-outline' target="_blank">Registri di <b class="font-weight-bold">matrimonio</b></a>
              </div>
            </div>
          </div>
        </div>
        <div id='cardpop' class='col-lg-4 mt-3 d-flex align-items-stretch'>
          <div class='card text-center'>
            <img src='img/Morte.jpg' class='card-img-top' height='200'>
            <div class='card-footer text-muted'>
              <div class='btn-group flex-wrap'>
                <a href="file/Atti-Morte.html" type='button' class='footerbut btn btn-lg btn-outline' target="_blank">Registri di <b class="font-weight-bold">morte</b></a>
              </div>
            </div>
          </div>
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
$(".descCod").css("border-bottom","solid white 4px");
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
