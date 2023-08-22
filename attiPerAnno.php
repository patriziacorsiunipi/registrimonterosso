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
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/mycss.css">
  <title>Registri Monterosso</title>
</head>
<body>
  <main>
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- CONTENUTO -->
    <div class="container mt-5">
      <?php
        $tipoRegistro=$_GET["tipoRegistro"];
        $numeroRegistro=$_GET["numeroRegistro"];
      ?>
      <h1 class="font-weight-bold blue-grey-text">Registro n.<?php echo $numeroRegistro; ?></h1>
      <p class="mb-5 font-weight-bold">Anno (numero di atti)</p>
      <div class="row">
        <div class="col-sm-10">
          <?php
          if($tipoRegistro=="battesimo"){
            $qAttiPerAnnoBT = "SELECT Anno,COUNT(*) AS AttiPerAnno FROM battesimo WHERE Anno<1900 AND NumRegistro='$numeroRegistro' GROUP BY Anno";
            $qAttiPerAnnoBTE = mysqli_query($conn,$qAttiPerAnnoBT);
            $contaAttiPerAnnoBT = mysqli_num_rows($qAttiPerAnnoBTE);
            if ($contaAttiPerAnnoBT>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($AttiPerAnnoBT = mysqli_fetch_array($qAttiPerAnnoBTE)){
                echo (
                  "<li class='attiPerAnno'><a class='text-dark' href='registro.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$numeroRegistro&&annoRegistro=$AttiPerAnnoBT[0]'>Atti del $AttiPerAnnoBT[0] ($AttiPerAnnoBT[1])</a></li>"
                );
              }
              echo ("</ul>");
            }
          }elseif($tipoRegistro=="matrimonio"){
            $qAttiPerAnnoMT = "SELECT Anno,COUNT(*) AS AttiPerAnno FROM matrimonio WHERE Anno<1900 AND NumRegistro='$numeroRegistro' GROUP BY Anno";
            $qAttiPerAnnoMTE = mysqli_query($conn,$qAttiPerAnnoMT);
            $contaAttiPerAnnoMT = mysqli_num_rows($qAttiPerAnnoMTE);
            if ($contaAttiPerAnnoMT>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($AttiPerAnnoMT = mysqli_fetch_array($qAttiPerAnnoMTE)){
                echo (
                  "<li class='attiPerAnno'><a class='text-dark' href='registro.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$numeroRegistro&&annoRegistro=$AttiPerAnnoMT[0]'>Atti del $AttiPerAnnoMT[0] ($AttiPerAnnoMT[1])</a></li>"
                );
              }
              echo ("</ul>");
            }
          }else{
            $qAttiPerAnnoMR = "SELECT Anno,COUNT(*) AS AttiPerAnno FROM morte WHERE Anno<1900 AND NumRegistro='$numeroRegistro' GROUP BY Anno";
            $qAttiPerAnnoMRE = mysqli_query($conn,$qAttiPerAnnoMR);
            $contaAttiPerAnnoMR = mysqli_num_rows($qAttiPerAnnoMRE);
            if ($contaAttiPerAnnoMR>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($AttiPerAnnoMR = mysqli_fetch_array($qAttiPerAnnoMRE)){
                echo (
                  "<li class='attiPerAnno'><a class='text-dark' href='registro.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$numeroRegistro&&annoRegistro=$AttiPerAnnoMR[0]'>Atti del $AttiPerAnnoMR[0] ($AttiPerAnnoMR[1])</a></li>"
                );
              }
              echo ("</ul>");
            }
          }
          ?>
        </div>
      </div>
    </div>
    <!-- contenuto -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php' ?>
  <!-- footer -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/sign.js"></script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
