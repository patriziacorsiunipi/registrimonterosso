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
      <h1 class="font-weight-bold blue-grey-text">Navigazione</h1>
      <div class="row mt-5">
        <div class="col-md-8 text-justify">
          La navigazione dei registri attraverso la piattaforma può essere fatta secondo due modalità:
          <br><br>
          <ul>
            <li>Ricerca per registro</li>
            <li>Ricerca per persona</li>
          </ul>
          <br>
          <b>Ricerca per registro</b><br>
          La ricerca per registro consiste nella navigazione all'interno dei registri di battesimo, matrimonio e morte mostrati nel menu a tendina.
          Selezionando uno di questi la navigazione procede in questo modo:
          <br><br>
          <ul>
            <li>Elenco di registri in ordine di numero</li>
            <li>Elenco degli atti all'interno di un singolo registro raggruppati in base all'anno</li>
            <li>Trascrizioni degli atti e registro "sfogliabile"</li>
          </ul>
          Se si vuole fare una ricerca incrociata tra i registri cliccando sul link "Ricerca in nuova scheda", si apre una nuova finestra del sito
          nel browser, dalla quale poter riniziare con le ricerche.
          Cliccando su una trascrizione si apre la "scheda anagrafica" della persona selezionata che mostra tutte le corrispondenze (se ci sono) relative
          a quest'ultima.<br><br>
          <b>Ricerca per persona</b><br>
          La ricerca per persona può svolgersi in due direzioni: a partire dagli atti di battesimo e a partire dagli atti di morte.
          Nel primo caso le corrispondenze vengono cercate, per l'appunto, a partire dagli atti di battesimo negli atti di morte e di matrimonio.
          Nel secondo, invece, dagli atti di morte si cercano quelli di battesimo ma non quelli di matrimonio.
          In entrambi i casi la navigazione procede così:
          <br><br>
          <ul>
            <li>Ricerca per cognomi (raggruppati per iniziale) con distinzione tra uomini e donne</li>
            <li>Elenco di uomini o donne che hanno il cognome selezionato precedentemente</li>
          </ul>
          Anche in questo caso, cliccando su una persona si apre la sua "scheda anagrafica" con le corrispondenze che la riguardano.
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
$(".nav-iten").css("border-bottom","");
$(".navigazione").css("border-bottom","solid #34689c 4px");
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
