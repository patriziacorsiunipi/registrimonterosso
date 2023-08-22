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
    <!-- MESSAGGIO CROWDSOURCING -->
    <?php include 'crowdMessaggio.php' ?>
    <!-- messaggio crowdsourcing -->
    <!-- CONTAINER INFORMAZIONI PERSONA -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mb-5">
          <!-- ANAGRAFICA -->
          <h2 class="font-weight-bold blue-grey-text">Dettagli del matrimonio</h2>
          <br>
          <?php
            $IDmatrimonio=$_GET['ID'];
            $registropart=$_GET['registropart'];
            if (isset($_GET['genere'])){
              $genere=$_GET['genere'];
            }else{
              $genere="";
            }

            $arrayAnni=[];
            $qPersona = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio,TrascrizioneImmagine FROM $registropart WHERE Anno<1900 AND IDMatrimonio='$IDmatrimonio'";
            $qPersonaE = mysqli_query($conn,$qPersona);
            $Persona = mysqli_fetch_array($qPersonaE);
            $cognome=$Persona[1];
            echo("<span class='font-weight-bold'>Anno di matrimonio:</span> $Persona[0]<br>");
            $arrayImmagini["'".$Persona[11]."'"]=[$Persona[0],substr("$Persona[11]",0,7)];
          ?>
          <!--Sposo-->
          <span class="font-weight-bold">Nome sposo:</span>
          <?php
          if ($Persona[2]=="manca"){
            echo ("Il nome dello sposo non è presente");
          }else{
            echo $Persona[2];
          }
          ?><br>
          <span class="font-weight-bold">Cognome sposo:</span>
          <?php
          if ($Persona[1]=="manca"){
            echo ("Il cognome dello sposo non è presente");
          }else{
            echo $Persona[1];
          }
          ?><br>
          <span class="font-weight-bold">Età sposo:</span>
          <?php
          if ($Persona[3]=="manca"){
            echo ("L'età dello sposo non è presente");
          }else{
            echo $Persona[3];
          }
          ?><br>
          <span class="font-weight-bold">Padre sposo:</span>
          <?php
          if ($Persona[4]=="manca"){
            echo ("Il padre dello sposo non è presente");
          }else{
            echo $Persona[4];
          }
          ?><br>
          <!--Sposa-->
          <span class="font-weight-bold">Nome sposa:</span>
          <?php
          if ($Persona[6]=="manca"){
            echo ("Il nome della sposa non è presente");
          }else{
            echo $Persona[6];
          }
          ?><br>
          <span class="font-weight-bold">Cognome sposa:</span>
          <?php
          if ($Persona[5]=="manca"){
            echo ("Il cognome della sposa non è presente");
          }else{
            echo $Persona[5];
          }
          ?><br>
          <span class="font-weight-bold">Età sposa:</span>
          <?php
          if ($Persona[7]=="manca"){
            echo ("L'età della sposa non è presente");
          }else{
            echo $Persona[7];
          }
          ?><br>
          <span class="font-weight-bold">Padre sposa:</span>
          <?php
          if ($Persona[8]=="manca"){
            echo ("Il padre della sposa non è presente");
          }else{
            echo $Persona[8];
          }

          //ALTRE INFORMAZIONI
          $qInfo = "SELECT Informazioni FROM infopersona WHERE IdPersona='$IDmatrimonio'";
          $qInfoE = mysqli_query($conn,$qInfo);
          $countInfo = mysqli_num_rows($qInfoE);
          if ($countInfo > 0){
            echo "<br>";
            echo("<span class='font-weight-bold'>Altre informazioni</span> <br>");
            $Info = mysqli_fetch_array($qInfoE);
            echo $Info[0];
          }
          ?><br>
          
          <span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Suggerisci altre informazioni relative a questo atto</u></a></span>
        </div>
        <!-- anagrafica -->
        <!-- IMMAGINI ATTI -->
        <?php
          foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
            $Immagine=str_replace("'","",$Immagine);
        ?>
        <div class="col-md-6">
          <div class="row">
            <div class="col">
              <div id="<?php echo $Immagine; ?>" class="card mt-2 mb-2" style="height:300px;">
              </div>
              <figcaption class="text-right">
              <p>Atto di
              <?php
              if (preg_match("/^BT/",$Immagine)){
                echo "battesimo";
              }elseif(preg_match("/^MT/",$Immagine)){
                echo "matrimonio";
              }else{
                echo "morte";
              }
              ?>
              del <?php echo $ImmAnno; ?>
              </p>
              </figcaption>
            </div>
          </div>
        </div>
        <!-- immagini atti -->
      <?php
      }
      ?>

      <div class="col-md-12">
        <hr>
          <h4 class="font-weight-bold blue-grey-text mb-5">Immagini dei registri</h4>
          <?php
            $arrayNumRegistro=[];
            $conta=0;
            foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
              $Immagine=str_replace("'","",$Immagine);
              $conta=$conta+1;
          ?>
          <div id="<?php echo $ImmRegistro; ?>" class="card mt-2 mb-2" style="height:500px;">
          </div>
          <figcaption class="text-right">
          <p>Registro di
          <?php
          if (preg_match("/^BT/",$ImmRegistro)){
            $indImmagine="battesimoimg";
            $indRegistro="battesimi";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "battesimo";
          }elseif(preg_match("/^MT/",$ImmRegistro)){
            $indImmagine="matrimonioimg";
            $indRegistro="matrimoni";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "matrimonio";
          }else{
            $indImmagine="morteimg";
            $indRegistro="morti";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "morte";
          }
          ?>
          (atto del <?php echo $ImmAnno; ?>)
          </p>
          <?php
          }
          ?>
      </div>
    </div>
    <!-- container informazioni persona -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php' ?>
  <!-- footer -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="openseadragon/openseadragon.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
  <?php
    $conta1=0;
    foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
      $conta1=$conta1+1;
      $Immagine=str_replace("'","",$Immagine);
      $Immagine=str_replace("-","",$Immagine);
   ?>
    var <?php echo $Immagine; ?> = OpenSeadragon({
      id:"<?php echo $Immagine; ?>",
      prefixUrl:"openseadragon/images/",
      tileSources: {
        type: "image",
        url: "imgAtti/<?php echo $cognome; ?>/<?php echo $Immagine; ?>.jpg",
        buildPyramid: false
      },
      visibilityRatio: 1.0,
      constrainDuringPan: true,
      maxZoomPixelRatio:10
    });
    <?php
    $var=str_replace("'","",$arrayNumRegistro["'".$conta1."'"][0]);
    $qNumRegistro = "SELECT Cartella FROM $var WHERE Pagina='$ImmRegistro'";
    $qNumRegistroE = mysqli_query($conn,$qNumRegistro);
    $contaNumRegistro = mysqli_num_rows($qNumRegistroE);
    if ($contaNumRegistro>0){
      $numRegistro = mysqli_fetch_array($qNumRegistroE);
    }
    ?>

    var <?php echo $ImmRegistro; ?> = OpenSeadragon({
      id:"<?php echo $ImmRegistro; ?>",
      prefixUrl:"openseadragon/images/",
      tileSources: {
        type: "image",
        url: "imgRegistri/<?php echo $arrayNumRegistro["'".$conta1."'"][1]; ?>/<?php echo $numRegistro[0]; ?>/<?php echo $ImmRegistro; ?>.JPG",
        buildPyramid: false
      },
      visibilityRatio: 1.0,
      constrainDuringPan: true,
      maxZoomPixelRatio:10
    });
  <?php
  }
   ?>
   $("#crowMessaggioInvia").click(function(e){
     e.preventDefault();
       var messaggio=$("#messaggio").val();
       var IDPersona="<?php echo $IDmatrimonio; ?>";
       if (messaggio!=""){
         $.ajax({
           type:'POST',
           url:'invioMessaggio.php',
           data:{
             messaggio:messaggio,
             IDPersona:IDPersona
           },
           dataType:"html",
           success:function(risposta){
             if (risposta==0){
               $("#messaggioInviato").html("Messaggio inviato");
               $("#messaggio").val("");
             }else{
               console.log(risposta);
             }
           }
         });
       }else{
         console.log();
       }
     });
     $("#crowdMessaggio").on("hidden.bs.modal", function () {
       $("#messaggioInviato").html("");
    });
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
