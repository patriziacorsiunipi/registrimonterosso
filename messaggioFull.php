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
      <h1 class="font-weight-bold blue-grey-text mb-5">Messaggio</h1>
      <?php
        if (isset($_GET["dataora"]) && isset($_GET["messaggio"]) && isset($_GET["utente"]) && isset($_GET["IDpersona"])){
          $messaggio=$_GET['messaggio'];
          $dataora=$_GET["dataora"];
          $utente=$_GET["utente"];
          $IDPersona=$_GET["IDpersona"];
          $qIDPersona1 = "SELECT Cognome,Nome FROM battesimo WHERE IDBattesimo='$IDPersona'";
          $qIDPersona1E = mysqli_query($conn,$qIDPersona1);
          $contaIDPersona1 = mysqli_num_rows($qIDPersona1E);
          $qIDPersona2 = "SELECT Cognome,Nome FROM morte WHERE IDMorte='$IDPersona'";
          $qIDPersona2E = mysqli_query($conn,$qIDPersona2);
          $contaIDPersona2 = mysqli_num_rows($qIDPersona2E);
          $qIDPersona3 = "SELECT CognomeSposo,NomeSposo FROM matrimonio WHERE IDMatrimonio='$IDPersona'";
          $qIDPersona3E = mysqli_query($conn,$qIDPersona3);
          $contaIDPersona3 = mysqli_num_rows($qIDPersona3E);
          $qIDPersona4 = "SELECT CognomeSposa,NomeSposa FROM matrimonio WHERE IDMatrimonio='$IDPersona'";
          $qIDPersona4E = mysqli_query($conn,$qIDPersona4);
          $contaIDPersona4 = mysqli_num_rows($qIDPersona4E);
        }
       ?>
       <p class=""><span class="font-weight-bold">Mittente: </span><?php echo $utente; ?></p>
       <p class=""><span class="font-weight-bold">Data e ora: </span><?php echo $dataora; ?></p>
       <?php
        if ($contaIDPersona1>0){
          $Persona=mysqli_fetch_array($qIDPersona1E);
          $Cognome=$Persona[0];
          $Nome=$Persona[1];
          echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>$IDPersona ($Cognome $Nome)</p>");
        }elseif($contaIDPersona2>0){
          $Persona=mysqli_fetch_array($qIDPersona2E);
          $Cognome=$Persona[0];
          $Nome=$Persona[1];
          echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>$IDPersona ($Cognome $Nome)</p>");
        }elseif($contaIDPersona3>0){
          $Persona=mysqli_fetch_array($qIDPersona3E);
          $Cognome=$Persona[0];
          $Nome=$Persona[1];
          echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>$IDPersona ($Cognome $Nome)</p>");
        }elseif($contaIDPersona4>0){
          $Persona=mysqli_fetch_array($qIDPersona4E);
          $Cognome=$Persona[0];
          $Nome=$Persona[1];
          echo ("<p class=''><span class='font-weight-bold'>Riferimento: </span>$IDPersona ($Cognome $Nome)</p>");
        }
       ?>
       <br>
       <p><?php echo $messaggio; ?></p>
    </div>
    <!-- titolo e desccrizione -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php' ?>
  <!-- footer -->
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
  //chiudo la connessione
  mysqli_close($conn);
?>
