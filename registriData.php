<?php
  //includo il file di connessione al database e faccio partire la sessione
  session_start();
  include 'connect.php';
  if (isset($_SESSION['loginAmministratore'])){
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.21/features/searchHighlight/dataTables.searchHighlight.css">
  <link rel="stylesheet" href="css/mycss.css">
  <title>Registri Monterosso</title>
</head>
<body>
  <main class="contenitore">
    <!-- GESTIONE UTENTE -->
    <?php include 'modalModificaRegistri.php' ?>
    <!-- gestione utente -->
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="loader-wrapper">
      <span class="loader"></span>
      <p class="text-white font-weight-bold ml-3 mt-3">Attendi il caricamento della pagina</p>
    </div>
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Gestione registri parrocchiali</h1>
      <hr>
      <h4 class="font-weight-bold blue-grey-text mt-5">Registro dei battesimi</h4>
      <?php
        $qBattesimo = "SELECT * FROM battesimo";
        $qBattesimoE = mysqli_query($conn,$qBattesimo);
        $contaBattesimo = mysqli_num_rows($qBattesimoE);
        if ($contaBattesimo>0){
      ?>
      <div class="table-responsive p-2">
        <table id='tabellaBattesimoData' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDBattesimo'>IDBattesimo</th>
              <th data-field='anno'>Anno</th>
              <th data-field='ordineanno'>Ordine anno</th>
              <th data-field='trascImm'>Trascrizione-Immagine</th>
              <th data-field='numReg'>Num. registro</th>
              <th data-field='ordReg'>Ordine registro</th>
              <th data-field='sesso'>Sesso</th>
              <th data-field='cognome'>Cognome</th>
              <th data-field='nome'>Nome</th>
              <th data-field='nomePadre'>Nome padre</th>
              <th data-field='cognMadre'>Cognome madre</th>
              <th data-field='nomeMadre'>Nome madre</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($BattesimoData = mysqli_fetch_array($qBattesimoE)){
            ?>
            <tr class='righeBattesimo' style="display:none;">
              <td><?php echo $BattesimoData[0]; ?></td>
              <td><?php echo $BattesimoData[1]; ?></td>
              <td><?php echo $BattesimoData[2]; ?></td>
              <td><?php echo $BattesimoData[3]; ?></td>
              <td><?php echo $BattesimoData[4]; ?></td>
              <td><?php echo $BattesimoData[5]; ?></td>
              <td><?php echo $BattesimoData[6]; ?></td>
              <td><?php echo $BattesimoData[7]; ?></td>
              <td><?php echo $BattesimoData[8]; ?></td>
              <td><?php echo $BattesimoData[9]; ?></td>
              <td><?php echo $BattesimoData[10]; ?></td>
              <td><?php echo $BattesimoData[11]; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      }
      ?>
      <hr>
      <h4 class="font-weight-bold blue-grey-text mt-5">Registri di matrimonio</h4>
      <?php
        $qMatrimonio = "SELECT * FROM matrimonio";
        $qMatrimonioE = mysqli_query($conn,$qMatrimonio);
        $contaMatrimonio = mysqli_num_rows($qMatrimonioE);
        if ($contaMatrimonio>0){
      ?>
      <div class="table-responsive p-2">
        <table id='tabellaMatrimonioData' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDMatrimonio'>IDMatrimonio</th>
              <th data-field='anno'>Anno</th>
              <th data-field='ordineanno'>Ordine anno</th>
              <th data-field='trascImm'>Trascrizione-Immagine</th>
              <th data-field='numReg'>Num. registro</th>
              <th data-field='ordReg'>Ordine registro</th>
              <th data-field='cognomeso'>Cognome sposo</th>
              <th data-field='nomeso'>Nome sposo</th>
              <th data-field='nomePadreso'>Nome padre sposo</th>
              <th data-field='etaso'>Età sposo</th>
              <th data-field='cognomesa'>Cognome sposa</th>
              <th data-field='nomesa'>Nome sposa</th>
              <th data-field='nomePadresa'>Nome padre sposa</th>
              <th data-field='etasa'>Età sposa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($MatrimonioData = mysqli_fetch_array($qMatrimonioE)){
            ?>
            <tr class='righeMatrimonio' style="display:none;">
              <td><?php echo $MatrimonioData[0]; ?></td>
              <td><?php echo $MatrimonioData[1]; ?></td>
              <td><?php echo $MatrimonioData[2]; ?></td>
              <td><?php echo $MatrimonioData[3]; ?></td>
              <td><?php echo $MatrimonioData[4]; ?></td>
              <td><?php echo $MatrimonioData[5]; ?></td>
              <td><?php echo $MatrimonioData[6]; ?></td>
              <td><?php echo $MatrimonioData[7]; ?></td>
              <td><?php echo $MatrimonioData[8]; ?></td>
              <td><?php echo $MatrimonioData[9]; ?></td>
              <td><?php echo $MatrimonioData[10]; ?></td>
              <td><?php echo $MatrimonioData[11]; ?></td>
              <td><?php echo $MatrimonioData[12]; ?></td>
              <td><?php echo $MatrimonioData[13]; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      }
      ?>
      <hr>
      <h4 class="font-weight-bold blue-grey-text mt-5">Registri di morte</h4>
      <?php
        $qMorte = "SELECT * FROM morte";
        $qMorteE = mysqli_query($conn,$qMorte);
        $contaMorte = mysqli_num_rows($qMorteE);
        if ($contaMorte>0){
      ?>
      <div class="table-responsive p-2">
        <table id='tabellaMorteData' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDMorte'>IDMorte</th>
              <th data-field='annoBatt'>Anno battesimo</th>
              <th data-field='anno'>Anno morte</th>
              <th data-field='ordineanno'>Ordine anno</th>
              <th data-field='trascImm'>Trascrizione-Immagine</th>
              <th data-field='numReg'>Num. registro</th>
              <th data-field='ordReg'>Ordine registro</th>
              <th data-field='sesso'>Sesso</th>
              <th data-field='cognome'>Cognome</th>
              <th data-field='nome'>Nome</th>
              <th data-field='FM'>Figlio/Marito/Moglie</th>
              <th data-field='nomeCon'>Nome coniuge</th>
              <th data-field='padreCon'>Padre coniuge</th>
              <th data-field='nomePadre'>Nome padre</th>
              <th data-field='cognMadre'>Cognome madre</th>
              <th data-field='nomeMadre'>Nome madre</th>
              <th data-field='eta'>Eta morte</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($MorteData = mysqli_fetch_array($qMorteE)){
            ?>
            <tr class='righeMorte' style="display:none;">
              <td><?php echo $MorteData[0]; ?></td>
              <td><?php echo $MorteData[1]; ?></td>
              <td><?php echo $MorteData[2]; ?></td>
              <td><?php echo $MorteData[3]; ?></td>
              <td><?php echo $MorteData[4]; ?></td>
              <td><?php echo $MorteData[5]; ?></td>
              <td><?php echo $MorteData[6]; ?></td>
              <td><?php echo $MorteData[7]; ?></td>
              <td><?php echo $MorteData[8]; ?></td>
              <td><?php echo $MorteData[9]; ?></td>
              <td><?php echo $MorteData[10]; ?></td>
              <td><?php echo $MorteData[11]; ?></td>
              <td><?php echo $MorteData[12]; ?></td>
              <td><?php echo $MorteData[13]; ?></td>
              <td><?php echo $MorteData[14]; ?></td>
              <td><?php echo $MorteData[15]; ?></td>
              <td><?php echo $MorteData[16]; ?></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      }
      ?>
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
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
$(window).on("load",function(){
  $(".loader-wrapper").fadeOut("slow");
});
function strtrunc(str, max, add){
   add = add || '...';
   return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};
//IMPOSTAZIONI TABELLA DEGLI ATTI
var tabella1 = $("#tabellaBattesimoData").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  processing:true,
  language:{
    "sEmptyTable": "Cerca l'ID di cui hai bisogno",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ righe",
    "sInfoEmpty": "Vista da 0 a 0 di 0 righe",
    "sInfoFiltered": "[filtrati da _MAX_ righe totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ righe",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca nel registro:",
    "sZeroRecords": "La ricerca non ha portato alcun risultato.",
    "oPaginate": {
        "sFirst": "Inizio",
        "sPrevious": "Precedente",
        "sNext": "Successivo",
        "sLast": "Fine"
    },
    "oAria": {
        "sSortAscending":  ": attiva per ordinare la colonna in ordine crescente",
        "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
    }
  }
});
tabella1.on('draw', function(){
  $(".righeBattesimo").css("display","table-row");
  var body = $(tabella1.table().body());
  body.unhighlight();
  body.highlight(tabella1.search());
});
$("#tabellaBattesimoData tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaBattesimo");
  var dati=tabella1.row( this ).data();
  var idBattesimo=dati[0];
  var anno=dati[1];
  var ordAnno=dati[2];
  var trascImm=dati[3];
  var numReg=dati[4];
  var ordReg=dati[5];
  var sesso=dati[6];
  var cognome=dati[7];
  var nome=dati[8];
  var nomePadre=dati[9];
  var cognMadre=dati[10];
  var nomeMadre=dati[11];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaBattesimo");
  $("#idBattesimoMod").val(idBattesimo);
  $("#annoMod").val(anno);
  $("#ordAnnoMod").val(ordAnno);
  $("#trascImmMod").val(trascImm);
  $("#numRegMod").val(numReg);
  $("#ordRegMod").val(ordReg);
  $("#sessoMod").val(sesso);
  $("#cognomeMod").val(cognome);
  $("#nomeMod").val(nome);
  $("#nomePadreMod").val(nomePadre);
  $("#cognMadreMod").val(cognMadre);
  $("#nomeMadreMod").val(nomeMadre);
});
$("#annoMod").keyup(function(){
  $(this).attr("id","annoModNuova");
});
$("#ordAnnoMod").keyup(function(){
  $(this).attr("id","ordAnnoModNuova");
});
$("#trascImmMod").keyup(function(){
  $(this).attr("id","trascImmModNuova");
});
$("#numRegMod").keyup(function(){
  $(this).attr("id","numRegModNuova");
});
$("#ordRegMod").keyup(function(){
  $(this).attr("id","ordRegModNuova");
});
$("#sessoMod").keyup(function(){
  $(this).attr("id","sessoModNuova");
});
$("#cognomeMod").keyup(function(){
  $(this).attr("id","cognomeModNuova");
});
$("#nomeMod").keyup(function(){
  $(this).attr("id","nomeModNuova");
});
$("#nomePadreMod").keyup(function(){
  $(this).attr("id","nomePadreModNuova");
});
$("#cognMadreMod").keyup(function(){
  $(this).attr("id","cognMadreModNuova");
});
$("#nomeMadreMod").keyup(function(){
  $(this).attr("id","nomeMadreModNuova");
});
$("#modificaBattButton").click(function(){
  var idBattesimo=$("#idBattesimoMod").val();
  var annoMod=$("#annoMod").val();
  var annoModNuova=$("#annoModNuova").val();
  var ordAnnoMod=$("#ordAnnoMod").val();
  var ordAnnoModNuova=$("#ordAnnoModNuova").val();
  var trascImmMod=$("#trascImmMod").val();
  var trascImmModNuova=$("#trascImmModNuova").val();
  var numRegMod=$("#numRegMod").val();
  var numRegModNuova=$("#numRegModNuova").val();
  var ordRegMod=$("#ordRegMod").val();
  var ordRegModNuova=$("#ordRegModNuova").val();
  var sessoMod=$("#sessoMod").val();
  var sessoModNuova=$("#sessoModNuova").val();
  var cognomeMod=$("#cognomeMod").val();
  var cognomeModNuova=$("#cognomeModNuova").val();
  var nomeMod=$("#nomeMod").val();
  var nomeModNuova=$("#nomeModNuova").val();
  var nomePadreMod=$("#nomePadreMod").val();
  var nomePadreModNuova=$("#nomePadreModNuova").val();
  var cognMadreMod=$("#cognMadreMod").val();
  var cognMadreModNuova=$("#cognMadreModNuova").val();
  var nomeMadreMod=$("#nomeMadreMod").val();
  var nomeMadreModNuova=$("#nomeMadreModNuova").val();
    $.ajax({
      type:'POST',
      url:'modificaBattesimi.php',
      data:{
        idBattesimo:idBattesimo,
        annoMod:annoMod,
        annoModNuova:annoModNuova,
        ordAnnoMod:ordAnnoMod,
        ordAnnoModNuova:ordAnnoModNuova,
        trascImmMod:trascImmMod,
        trascImmModNuova:trascImmModNuova,
        numRegMod:numRegMod,
        numRegModNuova:numRegModNuova,
        ordRegMod:ordRegMod,
        ordRegModNuova:ordRegModNuova,
        sessoMod:sessoMod,
        sessoModNuova:sessoModNuova,
        cognomeMod:cognomeMod,
        cognomeModNuova:cognomeModNuova,
        nomeMod:nomeMod,
        nomeModNuova:nomeModNuova,
        nomePadreMod:nomePadreMod,
        nomePadreModNuova:nomePadreModNuova,
        cognMadreMod:cognMadreMod,
        cognMadreModNuova:cognMadreModNuova,
        nomeMadreMod:nomeMadreMod,
        nomeMadreModNuova:nomeMadreModNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErroreBatt").css("color","green");
          $("#messaggioErroreBatt").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioErroreBatt").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaBattesimo").on("hidden.bs.modal", function () {
  $("#messaggioErroreBatt").html("");
});
var tabella2 = $("#tabellaMatrimonioData").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  processing:true,
  language:{
    "sEmptyTable": "Cerca l'ID di cui hai bisogno",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ righe",
    "sInfoEmpty": "Vista da 0 a 0 di 0 righe",
    "sInfoFiltered": "[filtrati da _MAX_ righe totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ righe",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca nel registro:",
    "sZeroRecords": "La ricerca non ha portato alcun risultato.",
    "oPaginate": {
        "sFirst": "Inizio",
        "sPrevious": "Precedente",
        "sNext": "Successivo",
        "sLast": "Fine"
    },
    "oAria": {
        "sSortAscending":  ": attiva per ordinare la colonna in ordine crescente",
        "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
    }
  }
});
tabella2.on('draw', function(){
  $(".righeMatrimonio").css("display","table-row");
  var body = $(tabella2.table().body());
  body.unhighlight();
  body.highlight(tabella2.search());
});
$("#tabellaMatrimonioData tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaMatrimonio");
  var dati=tabella2.row( this ).data();
  var idMatrimonio=dati[0];
  var anno=dati[1];
  var ordAnno=dati[2];
  var trascImm=dati[3];
  var numReg=dati[4];
  var ordReg=dati[5];
  var cognSposo=dati[6];
  var nomeSposo=dati[7];
  var padreSposo=dati[8];
  var etaso=dati[9];
  var cognSposa=dati[10];
  var nomeSposa=dati[11];
  var padreSposa=dati[12];
  var etasa=dati[13];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaMatrimonio");
  $("#idMatrimonio").val(idMatrimonio);
  $("#annoMod1").val(anno);
  $("#ordAnnoMod1").val(ordAnno);
  $("#trascImmMod1").val(trascImm);
  $("#numRegMod1").val(numReg);
  $("#ordRegMod1").val(ordReg);
  $("#cognSposoMod").val(cognSposo);
  $("#nomeSposoMod").val(nomeSposo);
  $("#padreSposoMod").val(padreSposo);
  $("#etasoMod").val(etaso);
  $("#cognSposaMod").val(cognSposa);
  $("#nomeSposaMod").val(nomeSposa);
  $("#padreSposaMod").val(padreSposa);
  $("#etasaMod").val(etasa);
});
$("#annoMod1").keyup(function(){
  $(this).attr("id","annoMod1Nuova");
});
$("#ordAnnoMod1").keyup(function(){
  $(this).attr("id","ordAnnoMod1Nuova");
});
$("#trascImmMod1").keyup(function(){
  $(this).attr("id","trascImmMod1Nuova");
});
$("#numRegMod1").keyup(function(){
  $(this).attr("id","numRegMod1Nuova");
});
$("#ordRegMod1").keyup(function(){
  $(this).attr("id","ordRegMod1Nuova");
});
$("#cognSposoMod").keyup(function(){
  $(this).attr("id","cognSposoModNuova");
});
$("#nomeSposoMod").keyup(function(){
  $(this).attr("id","nomeSposoModNuova");
});
$("#padreSposoMod").keyup(function(){
  $(this).attr("id","padreSposoModNuova");
});
$("#etasoMod").keyup(function(){
  $(this).attr("id","etasoModNuova");
});
$("#cognSposaMod").keyup(function(){
  $(this).attr("id","cognSposaModNuova");
});
$("#nomeSposaMod").keyup(function(){
  $(this).attr("id","nomeSposaModNuova");
});
$("#padreSposaMod").keyup(function(){
  $(this).attr("id","padreSposaModNuova");
});
$("#etasaMod").keyup(function(){
  $(this).attr("id","etasaModNuova");
});
$("#modificaMatrimoniButt").click(function(){
  var idMatrimonio=$("#idMatrimonio").val();
  var annoMod1=$("#annoMod1").val();
  var annoMod1Nuova=$("#annoMod1Nuova").val();
  var ordAnnoMod1=$("#ordAnnoMod1").val();
  var ordAnnoMod1Nuova=$("#ordAnnoMod1Nuova").val();
  var trascImmMod1=$("#trascImmMod1").val();
  var trascImmMod1Nuova=$("#trascImmMod1Nuova").val();
  var numRegMod1=$("#numRegMod1").val();
  var numRegMod1Nuova=$("#numRegMod1Nuova").val();
  var ordRegMod1=$("#ordRegMod1").val();
  var ordRegMod1Nuova=$("#ordRegMod1Nuova").val();
  var cognSposoMod=$("#cognSposoMod").val();
  var cognSposoModNuova=$("#cognSposoModNuova").val();
  var nomeSposoMod=$("#nomeSposoMod").val();
  var nomeSposoModNuova=$("#nomeSposoModNuova").val();
  var padreSposoMod=$("#padreSposoMod").val();
  var padreSposoModNuova=$("#padreSposoModNuova").val();
  var etasoMod=$("#etasoMod").val();
  var etasoModNuova=$("#etasoModNuova").val();
  var cognSposaMod=$("#cognSposaMod").val();
  var cognSposaModNuova=$("#cognSposaModNuova").val();
  var nomeSposaMod=$("#nomeSposaMod").val();
  var nomeSposaModNuova=$("#nomeSposaModNuova").val();
  var padreSposaMod=$("#padreSposaMod").val();
  var padreSposaModNuova=$("#padreSposaModNuova").val();
  var etasaMod=$("#etasaMod").val();
  var etasaModNuova=$("#etasaModNuova").val();
    $.ajax({
      type:'POST',
      url:'modificaMatrimoni.php',
      data:{
        idMatrimonio:idMatrimonio,
        annoMod1:annoMod1,
        annoMod1Nuova:annoMod1Nuova,
        ordAnnoMod1:ordAnnoMod1,
        ordAnnoMod1Nuova:ordAnnoMod1Nuova,
        trascImmMod1:trascImmMod1,
        trascImmMod1Nuova:trascImmMod1Nuova,
        numRegMod1:numRegMod1,
        numRegMod1Nuova:numRegMod1Nuova,
        ordRegMod1:ordRegMod1,
        ordRegMod1Nuova:ordRegMod1Nuova,
        cognSposoMod:cognSposoMod,
        cognSposoModNuova:cognSposoModNuova,
        nomeSposoMod:nomeSposoMod,
        nomeSposoModNuova:nomeSposoModNuova,
        padreSposoMod:padreSposoMod,
        padreSposoModNuova:padreSposoModNuova,
        etasoMod:etasoMod,
        etasoModNuova:etasoModNuova,
        cognSposaMod:cognSposaMod,
        cognSposaModNuova:cognSposaModNuova,
        nomeSposaMod:nomeSposaMod,
        nomeSposaModNuova:nomeSposaModNuova,
        padreSposaMod:padreSposaMod,
        padreSposaModNuova:padreSposaModNuova,
        etasaMod:etasaMod,
        etasaModNuova:etasaModNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioMatrimoni").css("color","green");
          $("#messaggioMatrimoni").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioMatrimoni").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaMatrimonio").on("hidden.bs.modal", function () {
  $("#messaggioMatrimoni").html("");
});
var tabella3 = $("#tabellaMorteData").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  processing:true,
  language:{
    "sEmptyTable": "Cerca l'ID di cui hai bisogno",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ righe",
    "sInfoEmpty": "Vista da 0 a 0 di 0 righe",
    "sInfoFiltered": "[filtrati da _MAX_ righe totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ righe",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca nel registro:",
    "sZeroRecords": "La ricerca non ha portato alcun risultato.",
    "oPaginate": {
        "sFirst": "Inizio",
        "sPrevious": "Precedente",
        "sNext": "Successivo",
        "sLast": "Fine"
    },
    "oAria": {
        "sSortAscending":  ": attiva per ordinare la colonna in ordine crescente",
        "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
    }
  }
});
tabella3.on('draw', function(){
  $(".righeMorte").css("display","table-row");
  var body = $(tabella3.table().body());
  body.unhighlight();
  body.highlight(tabella3.search());
});
$("#tabellaMorteData tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaMorte");
  var dati=tabella3.row( this ).data();
  var idMorte=dati[0];
  var annoBatt=dati[1];
  var annoMorte=dati[2];
  var ordAnno=dati[3];
  var trascImm=dati[4];
  var numReg=dati[5];
  var ordReg=dati[6];
  var sesso=dati[7];
  var cognome=dati[8];
  var nome=dati[9];
  var fm=dati[10];
  var nomeCon=dati[11];
  var nomePadreCon=dati[12];
  var nomePadre=dati[13];
  var cognMadre=dati[14];
  var nomeMadre=dati[15];
  var etaMorte=dati[16];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaMorte");
  $("#idMorte").val(idMorte);
  $("#annoBattMod").val(annoBatt);
  $("#annoMorteMod").val(annoMorte);
  $("#ordAnnoMod2").val(ordAnno);
  $("#trascImmMod2").val(trascImm);
  $("#numRegMod2").val(numReg);
  $("#ordRegMod2").val(ordReg);
  $("#sessoMod1").val(sesso);
  $("#cognomeMod1").val(cognome);
  $("#nomeMod1").val(nome);
  $("#fmMod").val(fm);
  $("#nomeConMod").val(nomeCon);
  $("#nomePadreConMod").val(nomePadreCon);
  $("#nomePadreMod1").val(nomePadre);
  $("#cognMadreMod1").val(cognMadre);
  $("#nomeMadreMod1").val(nomeMadre);
  $("#etaMorteMod").val(etaMorte);
});
$("#annoBattMod").keyup(function(){
  $(this).attr("id","annoBattModNuova");
});
$("#annoMorteMod").keyup(function(){
  $(this).attr("id","annoMorteModNuova");
});
$("#ordAnnoMod2").keyup(function(){
  $(this).attr("id","ordAnnoMod2Nuova");
});
$("#trascImmMod2").keyup(function(){
  $(this).attr("id","trascImmMod2Nuova");
});
$("#numRegMod2").keyup(function(){
  $(this).attr("id","numRegMod2Nuova");
});
$("#ordRegMod2").keyup(function(){
  $(this).attr("id","ordRegMod2Nuova");
});
$("#sessoMod1").keyup(function(){
  $(this).attr("id","sessoMod1Nuova");
});
$("#cognomeMod1").keyup(function(){
  $(this).attr("id","cognomeMod1Nuova");
});
$("#nomeMod1").keyup(function(){
  $(this).attr("id","nomeMod1Nuova");
});
$("#fmMod").keyup(function(){
  $(this).attr("id","fmModNuova");
});
$("#nomeConMod").keyup(function(){
  $(this).attr("id","nomeConModNuova");
});
$("#nomePadreConMod").keyup(function(){
  $(this).attr("id","nomePadreConModNuova");
});
$("#nomePadreMod1").keyup(function(){
  $(this).attr("id","nomePadreMod1Nuova");
});
$("#cognMadreMod1").keyup(function(){
  $(this).attr("id","cognMadreMod1Nuova");
});
$("#nomeMadreMod1").keyup(function(){
  $(this).attr("id","nomeMadreMod1Nuova");
});
$("#etaMorteMod").keyup(function(){
  $(this).attr("id","etaMorteModNuova");
});
$("#modificaMorteButton").click(function(){
  var idMorte=$("#idMorte").val();
  var annoBattMod=$("#annoBattMod").val();
  var annoBattModNuova=$("#annoBattModNuova").val();
  var annoMorteMod=$("#annoMorteMod").val();
  var annoMorteModNuova=$("#annoMorteModNuova").val();
  var ordAnnoMod2=$("#ordAnnoMod2").val();
  var ordAnnoMod2Nuova=$("#ordAnnoMod2Nuova").val();
  var trascImmMod2=$("#trascImmMod2").val();
  var trascImmMod2Nuova=$("#trascImmMod2Nuova").val();
  var numRegMod2=$("#numRegMod2").val();
  var numRegMod2Nuova=$("#numRegMod2Nuova").val();
  var ordRegMod2=$("#ordRegMod2").val();
  var ordRegMod2Nuova=$("#ordRegMod2Nuova").val();
  var sessoMod1=$("#sessoMod1").val();
  var sessoMod1Nuova=$("#sessoMod1Nuova").val();
  var cognomeMod1=$("#cognomeMod1").val();
  var cognomeMod1Nuova=$("#cognomeMod1Nuova").val();
  var nomeMod1=$("#nomeMod1").val();
  var nomeMod1Nuova=$("#nomeMod1Nuova").val();
  var fmMod=$("#fmMod").val();
  var fmModNuova=$("#fmModNuova").val();
  var nomeConMod=$("#nomeConMod").val();
  var nomeConModNuova=$("#nomeConModNuova").val();
  var nomePadreConMod=$("#nomePadreConMod").val();
  var nomePadreConModNuova=$("#nomePadreConModNuova").val();
  var nomePadreMod1=$("#nomePadreMod1").val();
  var nomePadreMod1Nuova=$("#nomePadreMod1Nuova").val();
  var cognMadreMod1=$("#cognMadreMod1").val();
  var cognMadreMod1Nuova=$("#cognMadreMod1Nuova").val();
  var nomeMadreMod1=$("#nomeMadreMod1").val();
  var nomeMadreMod1Nuova=$("#nomeMadreMod1Nuova").val();
  var etaMorteMod=$("#etaMorteMod").val();
  var etaMorteModNuova=$("#etaMorteModNuova").val();
    $.ajax({
      type:'POST',
      url:'modificaMorti.php',
      data:{
        idMorte:idMorte,
        annoBattMod:annoBattMod,
        annoBattModNuova:annoBattModNuova,
        annoMorteMod:annoMorteMod,
        annoMorteModNuova:annoMorteModNuova,
        ordAnnoMod2:ordAnnoMod2,
        ordAnnoMod2Nuova:ordAnnoMod2Nuova,
        trascImmMod2:trascImmMod2,
        trascImmMod2Nuova:trascImmMod2Nuova,
        numRegMod2:numRegMod2,
        numRegMod2Nuova:numRegMod2Nuova,
        ordRegMod2:ordRegMod2,
        ordRegMod2Nuova:ordRegMod2Nuova,
        sessoMod1:sessoMod1,
        sessoMod1Nuova:sessoMod1Nuova,
        cognomeMod1:cognomeMod1,
        cognomeMod1Nuova:cognomeMod1Nuova,
        nomeMod1:nomeMod1,
        nomeMod1Nuova:nomeMod1Nuova,
        fmMod:fmMod,
        fmModNuova:fmModNuova,
        nomeConMod:nomeConMod,
        nomeConModNuova:nomeConModNuova,
        nomePadreConMod:nomePadreConMod,
        nomePadreConModNuova:nomePadreConModNuova,
        nomePadreMod1:nomePadreMod1,
        nomePadreMod1Nuova:nomePadreMod1Nuova,
        cognMadreMod1:cognMadreMod1,
        cognMadreMod1Nuova:cognMadreMod1Nuova,
        nomeMadreMod1:nomeMadreMod1,
        nomeMadreMod1Nuova:nomeMadreMod1Nuova,
        etaMorteMod:etaMorteMod,
        etaMorteModNuova:etaMorteModNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioMorti").css("color","green");
          $("#messaggioMorti").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioMorti").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaMorte").on("hidden.bs.modal", function () {
  $("#messaggioMorti").html("");
});
</script>
</body>
</html>
<?php
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
