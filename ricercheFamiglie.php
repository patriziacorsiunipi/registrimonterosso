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
  <link rel="stylesheet" href="css/all.css">
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
      <h1 class="font-weight-bold blue-grey-text">Ricerche sulle famiglie</h1>
      <div class="mt-5">
        <p>
          In questa sezione si ospitano le ricerche sulle famiglie monterossine operate 
          dagli utenti. Chi volesse contribuire è pregato di inviare la propria ricerca 
          in formato word o pdf all'indirizzo email <b>registrimonterosso@gmail.com</b>.
        </p>
      </div>
      <div class="list-group list-group-flush mt-5">
        <a href="file/ricerca_grasso_giuseppe.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Ricerca Grasso Giuseppe (Pompeo) 1876, ramo Rossignoli (Geronima di Giulio 1855)</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
	<!--
        <a href="file/ricerca_midense.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Midense</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
        <a href="file/ricerca_moggia_gustavo.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Ricerca Moggia Gustavo (ramo Gando)</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
        <a href="file/ricerca_montale_domenico.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Ricerca Montale Domenico 1855</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
        <a href="file/ricerca_sabini_mangiamarchi.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Ricerca Sabini Ercole - Mangiamarchi Veronica</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
        <a href="file/ricerca_contardi_gando_1847.pdf" class="list-group-item list-group-item-action d-flex justify-content-between"> 
          <p class="m-0">Gustavo Moggia, <i>Ricerca Contardi Clotilde di Gio Luca e della Gando Giulia 1857</i></p>
          <img src="img/pdf_icon.png" alt="Pdf Icon" height=25>
        </a>
	-->
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
$(".ricFamiglie").css("border-bottom","solid white 4px");
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
