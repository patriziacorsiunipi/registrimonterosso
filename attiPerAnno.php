<?php
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
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/mycss.css">
  <title>Registri Monterosso</title>
</head>
<body>
  <main>
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php'; ?>
    <?php include 'menuRicerca.php'; ?>
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php'; ?>
    <!-- CONTENUTO -->
    <div class="container mt-5">
      <?php
        if(isset($_GET["tipoRegistro"], $_GET["numeroRegistro"])){
          $tipoRegistro = $_GET["tipoRegistro"];
          $numeroRegistro = $_GET["numeroRegistro"];
          $tipoRegistro = mysqli_real_escape_string($conn, $tipoRegistro); // Sanitize input
          $numeroRegistro = mysqli_real_escape_string($conn, $numeroRegistro); // Sanitize input
      ?>
      <h1 class="font-weight-bold blue-grey-text">Registro n.<?php echo htmlspecialchars($numeroRegistro); ?></h1>
      <p class="mb-5 font-weight-bold">Anno (numero di atti)</p>
      <div class="row">
        <div class="col-sm-10">
          <?php
          if ($tipoRegistro == "battesimo" || $tipoRegistro == "matrimonio" || $tipoRegistro == "morte") {
            $qAttiPerAnno = "SELECT Anno, COUNT(*) AS AttiPerAnno FROM $tipoRegistro WHERE Anno < 1900 AND NumRegistro = ? GROUP BY Anno";
            $stmt = mysqli_prepare($conn, $qAttiPerAnno);
            mysqli_stmt_bind_param($stmt, "i", $numeroRegistro);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $contaAttiPerAnno = mysqli_num_rows($result);
            
            if ($contaAttiPerAnno > 0) {
              echo "<ul class='list-unstyled card-columns'>";
              while ($AttiPerAnno = mysqli_fetch_array($result)) {
                $annoRegistro = htmlspecialchars($AttiPerAnno[0]);
                $attiCount = htmlspecialchars($AttiPerAnno[1]);
                echo "<li class='attiPerAnno'><a class='text-dark' href='registro.php?tipoRegistro=" . urlencode($tipoRegistro) . "&numeroRegistro=$numeroRegistro&annoRegistro=" . urlencode($annoRegistro) . "'>Atti del $annoRegistro ($attiCount)</a></li>";
              }
              echo "</ul>";
            }
            mysqli_stmt_close($stmt);
          }
          ?>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
    <!-- CONTENUTO -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/sign.js"></script>
</body>
</html>

<?php
// Chiudi la connessione
mysqli_close($conn);
?>
