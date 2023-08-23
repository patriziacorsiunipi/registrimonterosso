<?php
// Includo il file di connessione al database e faccio partire la sessione
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="it">
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
    <?php include 'menuNavigazione.php'; ?>
    <?php include 'menuRicerca.php'; ?>
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php'; ?>
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text mb-5">Messaggio</h1>
      <?php
        if (isset($_GET["dataora"], $_GET["messaggio"], $_GET["utente"], $_GET["IDpersona"])) {
          $messaggio = $_GET['messaggio'];
          $dataora = $_GET["dataora"];
          $utente = $_GET["utente"];
          $IDPersona = $_GET["IDpersona"];
          
          // Utilizza query preparate per evitare SQL injection
          $qIDPersona = "SELECT Cognome, Nome FROM battesimo WHERE IDBattesimo = ?";
          $stmt = mysqli_prepare($conn, $qIDPersona);
          mysqli_stmt_bind_param($stmt, "s", $IDPersona);
          mysqli_stmt_execute($stmt);
          $qIDPersonaResult = mysqli_stmt_get_result($stmt);
          
          // Verifica il risultato dell'interrogazione
          if ($qIDPersonaResult && mysqli_num_rows($qIDPersonaResult) > 0) {
              $persona = mysqli_fetch_array($qIDPersonaResult);
              $cognome = $persona[0];
              $nome = $persona[1];
              echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>$IDPersona ($cognome $nome)</p>");
          } else {
              echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>ID non valido</p>");
          }

          mysqli_stmt_close($stmt);
        }
       ?>
       <p class=""><span class="font-weight-bold">Mittente: </span><?php echo htmlspecialchars($utente); ?></p>
       <p class=""><span class="font-weight-bold">Data e ora: </span><?php echo htmlspecialchars($dataora); ?></p>
       <br>
       <p><?php echo htmlspecialchars($messaggio); ?></p>
    </div>
    <!-- titolo e descrizione -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
</script>
</body>
</html>

<?php
  // Chiudi la connessione
  mysqli_close($conn);
?>
