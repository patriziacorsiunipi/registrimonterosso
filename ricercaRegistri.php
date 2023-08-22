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
    <!-- LISTA -->
    <div id="container" class="container mt-5">
      <?php $tipoRegistro=$_GET["tipoRegistro"] ?>
      <h1 class="font-weight-bold blue-grey-text">
        <?php
          if ($tipoRegistro=="battesimo"){
            echo "Battesimi";
          }elseif($tipoRegistro=="matrimonio"){
            echo "Matrimoni";
          }else{
            echo "Morte";
          }
        ?></h1>
      <p class="mb-5 font-weight-bold">Registro (anni) [numero di atti]</p>
      <div class="row">
        <div class="col-sm-10">
        <?php
          if ($tipoRegistro=="battesimo"){
            $qBattesimi = "SELECT NumRegistro,COUNT(*) AS Counter FROM battesimo WHERE Anno<1900 GROUP BY NumRegistro";
            $qBattesimiE = mysqli_query($conn,$qBattesimi);
            $contaBattesimi = mysqli_num_rows($qBattesimiE);
            if ($contaBattesimi>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($Battesimi = mysqli_fetch_array($qBattesimiE)){
                $qRangeAnnoBT1 = "SELECT Anno FROM battesimo WHERE Anno<1900 AND NumRegistro='$Battesimi[0]' ORDER BY Anno ASC LIMIT 1";
                $RangeAnnoBT2="SELECT Anno FROM battesimo WHERE Anno<1900 AND NumRegistro='$Battesimi[0]' ORDER BY Anno DESC LIMIT 1";
                $qRangeAnnoBT1E = mysqli_query($conn,$qRangeAnnoBT1);
                $qRangeAnnoBT2E = mysqli_query($conn,$RangeAnnoBT2);
                $RangeAnnoBT1 = mysqli_fetch_array($qRangeAnnoBT1E);
                $RangeAnnoBT2 = mysqli_fetch_array($qRangeAnnoBT2E);
                echo (
                  "<li class='registri mb-1'><a class='text-dark' href='attiPerAnno.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$Battesimi[0]'>Registro n.$Battesimi[0] ($RangeAnnoBT1[0]-$RangeAnnoBT2[0]) [$Battesimi[1]]</a></li>"
                );
              }
              echo ("</ul>");
            }
          }elseif($tipoRegistro=="matrimonio"){
            $qMatrimoni = "SELECT NumRegistro,COUNT(*) AS Counter FROM matrimonio WHERE Anno<1900 GROUP BY NumRegistro";
            $qMatrimoniE = mysqli_query($conn,$qMatrimoni);
            $contaMatrimoni = mysqli_num_rows($qMatrimoniE);
            if ($contaMatrimoni>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($Matrimoni = mysqli_fetch_array($qMatrimoniE)){
                $qRangeAnnoMT1 = "SELECT Anno FROM matrimonio WHERE Anno<1900 AND NumRegistro='$Matrimoni[0]' ORDER BY Anno ASC LIMIT 1";
                $RangeAnnoMT2="SELECT Anno FROM matrimonio WHERE Anno<1900 AND NumRegistro='$Matrimoni[0]' ORDER BY Anno DESC LIMIT 1";
                $qRangeAnnoMT1E = mysqli_query($conn,$qRangeAnnoMT1);
                $qRangeAnnoMT2E = mysqli_query($conn,$RangeAnnoMT2);
                $RangeAnnoMT1 = mysqli_fetch_array($qRangeAnnoMT1E);
                $RangeAnnoMT2 = mysqli_fetch_array($qRangeAnnoMT2E);
                echo (
                  "<li class='registri mb-1'><a class='text-dark' href='attiPerAnno.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$Matrimoni[0]'>Registro n.$Matrimoni[0] ($RangeAnnoMT1[0]-$RangeAnnoMT2[0]) [$Matrimoni[1]]</a></li>"
                );
              }
              echo ("</ul>");
            }
          }else{
            $qMorti = "SELECT NumRegistro,COUNT(*) AS Counter FROM morte WHERE Anno<1900 GROUP BY NumRegistro";
            $qMortiE = mysqli_query($conn,$qMorti);
            $contaMorti = mysqli_num_rows($qMortiE);
            if ($contaMorti>0){
              echo ("<ul class='list-unstyled card-columns'>");
              while($Morti = mysqli_fetch_array($qMortiE)){
                $qRangeAnnoMR1 = "SELECT Anno FROM morte WHERE Anno<1900 AND NumRegistro='$Morti[0]' ORDER BY Anno ASC LIMIT 1";
                $RangeAnnoMR2="SELECT Anno FROM morte WHERE Anno<1900 AND NumRegistro='$Morti[0]' ORDER BY Anno DESC LIMIT 1";
                $qRangeAnnoMR1E = mysqli_query($conn,$qRangeAnnoMR1);
                $qRangeAnnoMR2E = mysqli_query($conn,$RangeAnnoMR2);
                $RangeAnnoMR1 = mysqli_fetch_array($qRangeAnnoMR1E);
                $RangeAnnoMR2 = mysqli_fetch_array($qRangeAnnoMR2E);
                echo (
                  "<li class='registri mb-1'><a class='text-dark' href='attiPerAnno.php?tipoRegistro=$tipoRegistro&&numeroRegistro=$Morti[0]'>Registro n.$Morti[0] ($RangeAnnoMR1[0]-$RangeAnnoMR2[0]) [$Morti[1]]</a></li>"
                );
              }
              echo ("</ul>");
            }
          }
        ?>
        </div>
      </div>
    </div>
    <!-- lista -->
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
