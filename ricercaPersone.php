<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
  include 'connect.php';
  $registroPart=$_GET['registropart'];
  if (isset($registroPart)){
    //maschio
    $carattereM='';
    if (isset($_GET['cM'])){
      $carattereM=$_GET['cM'];
      $carattereM=preg_replace('#[^a-z]#i','',$carattereM);
      $qCarattereM = "SELECT Cognome FROM  $registroPart WHERE Anno<1900 AND Cognome LIKE '$carattereM%' AND Cognome <> 'manca' AND Sesso='M' GROUP BY Cognome ORDER BY Cognome";
      $qCarattereEM = mysqli_query($conn,$qCarattereM);
    }
    //femmina
    $carattereF='';
    if (isset($_GET['cF'])){
      $carattereF=$_GET['cF'];
      $carattereF=preg_replace('#[^a-z]#i','',$carattereF);
      $qCarattereF = "SELECT Cognome FROM  $registroPart WHERE Anno<1900 AND Cognome LIKE '$carattereF%' AND Cognome <> 'manca'  AND Sesso='F' GROUP BY Cognome ORDER BY Cognome";
      $qCarattereEF = mysqli_query($conn,$qCarattereF);
    }
  }
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
    <div class="container mt-5 mb-5">
      <?php
      if ($_GET['registropart']=='battesimo'){
        echo("<h1 class='font-weight-bold blue-grey-text'>Ricerca a partire dagli atti di battesimo</h1>");
      }else{
        echo("<h1 class='font-weight-bold blue-grey-text'>Ricerca a partire dagli atti di morte</h1>");
      }
      ?>
      <p class="mb-5">Seleziona l'iniziale del cognome della persona che stai cercando oppure cerca una persona attraverso la casella di ricerca.</p>
      <hr>
      <h3 class="font-weight-bold blue-grey-text mt-5">Uomini</h3>
      <div class="input-group pl-0">
        <input id="cercaPersonaUomo" class="form-control " type="text" placeholder="Cerca una persona" aria-label="Search">
        <div id="searchButtonUomo" class="input-group-prepend" style="cursor:pointer;">
          <span class="p-2 unique-color" style="border-radius: 0px 4px 4px 0px;"><img src="img/searchIcon.png" height="20"></span>
        </div>
      </div>
      <div class='col-md-4' style='margin-top:0px;margin-left:-18px;'>
        <div class='list-group' id='listaSuggerimentiUomo'></div>
      </div>
      <nav class="table-responsive">
        <?php
          $carattereM=range('A','Z');
          echo ("<ul class='pagination'>");
          foreach ($carattereM as $alfabetoM)
            {
              echo ("<li class='page-item'><a class='page-link' href='ricercaPersone.php?registropart=$registroPart&&cM=".$alfabetoM."'>".$alfabetoM."</a></li>");
            }
          echo("<li class='page-item'><a class='page-link' href='persone.php?registropart=$registroPart&&genere=M&&cognome=manca'>Ignoti</a></li>");
          echo("</ul>");
        ?>
      </nav>
      <div class="container mb-5">
        <div class="row">
          <div class="col-sm-9">
            <?php
            if (isset($_GET["cM"])){
              $qCarattereEnM=mysqli_num_rows($qCarattereEM);
              if($qCarattereEnM>0){
                echo("<ul class='list-unstyled card-columns'>");
                while($CarattereM = mysqli_fetch_array($qCarattereEM)){
                  echo("<li style='cursor:pointer;'><a class='text-dark' href='persone.php?registropart=$registroPart&&genere=M&&cognome=$CarattereM[0]'>$CarattereM[0]</a></li>");
                }
                echo("</ul>");
              }else{
                echo("Non ci sono cognomi che iniziano con questa lettera");
              }
            }
            ?>
          </div>
        </div>
      </div>
      <h3 class="font-weight-bold blue-grey-text">Donne</h3>
      <div class="input-group pl-0">
        <input id="cercaPersonaDonna" class="form-control " type="text" placeholder="Cerca una persona" aria-label="Search">
        <div id="searchButtonDonna" class="input-group-prepend" style="cursor:pointer;">
          <span class="p-2 unique-color" style="border-radius: 0px 4px 4px 0px;"><img src="img/searchIcon.png" height="20"></span>
        </div>
      </div>
      <div class='col-md-4' style='margin-top:0px;margin-left:-18px;'>
        <div class='list-group' id='listaSuggerimentiDonna'></div>
      </div>
      <nav class="table-responsive">
        <?php
          $carattereF=range('A','Z');
          echo ("<ul class='pagination'>");
          foreach ($carattereF as $alfabetoF)
            {
              echo ("<li class='page-item'><a class='page-link' href='ricercaPersone.php?registropart=$registroPart&&cF=".$alfabetoF."'>".$alfabetoF."</a></li>");
            }
          echo("<li class='page-item'><a class='page-link' href='persone.php?registropart=$registroPart&&genere=F&&cognome=manca'>Ignoti</a></li>");
          echo("</ul>");
        ?>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <?php
            if (isset($_GET["cF"])){
              $qCarattereEnF=mysqli_num_rows($qCarattereEF);
              if($qCarattereEnF>0){
                echo("<ul class='list-unstyled card-columns'>");
                while($CarattereF = mysqli_fetch_array($qCarattereEF)){
                  echo("<li style='cursor:pointer;'><a class='text-dark' href='persone.php?registropart=$registroPart&&genere=F&&cognome=$CarattereF[0]'>$CarattereF[0]</a></li>");
                }
                echo("</ul>");
              }else{
                echo("Non ci sono cognomi che iniziano con questa lettera");
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
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
$(document).on('keyup','#cercaPersonaUomo',function(){
  var persona = $(this).val();
  <?php
  if ($_GET["registropart"]=="battesimo"){
    echo ("var registro = 'battesimo';");
  }else{
    echo ("var registro = 'morte';");
  }
  ?>
  if (persona!=""){
    $.ajax({
      url:"suggerimentiUomo.php",
      type: "POST",
      data: {persona:persona, registro:registro},
      dataType: "html",
      success:function(risposta){
        $("#listaSuggerimentiUomo").html(risposta);
      }
    });
  }else{
    $("#listaSuggerimentiUomo").html("");
  }
});
$(document).on('keyup','#cercaPersonaDonna',function(){
  var persona = $(this).val();
  <?php
  if ($_GET["registropart"]=="battesimo"){
    echo ("var registro = 'battesimo';");
  }else{
    echo ("var registro = 'morte';");
  }
  ?>
  if (persona!=""){
    $.ajax({
      url:"suggerimentiDonna.php",
      type: "POST",
      data: {persona:persona, registro:registro},
      dataType: "html",
      success:function(risposta){
        $("#listaSuggerimentiDonna").html(risposta);
      }
    });
  }else{
    $("#listaSuggerimentiDonna").html("");
  }
});
$(document).on('click','.suggerimentiUomo',function(){
  $("#cercaPersonaUomo").val($(this).text());
  $("#listaSuggerimentiUomo").html("");
});
$(document).on('click','.suggerimentiDonna', function(){
  $('#cercaPersonaDonna').val($(this).text());
  $('#listaSuggerimentiDonna').html("");
});
$("#searchButtonUomo").click(function(){
  var nomePersonaUomo=$("#cercaPersonaUomo").val();
  window.location.href = 'risultatiRicercaPersona.php?registro=<?php echo($_GET["registropart"]); ?>&&sesso=M&&persona='+nomePersonaUomo;
});
$("#searchButtonDonna").click(function(){
  var nomePersonaDonna=$("#cercaPersonaDonna").val();
  window.location.href = 'risultatiRicercaPersona.php?registro=<?php echo($_GET["registropart"]); ?>&&sesso=F&&persona='+nomePersonaDonna;
});
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
