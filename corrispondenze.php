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
    <?php include 'modalModificaCorrispondenze.php' ?>
    <?php include 'modalModificaCorrispondenze1.php' ?>
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
      <h1 class="font-weight-bold blue-grey-text">Gestione Corrispondenze</h1>
      <hr>
      <h4 class="font-weight-bold blue-grey-text mt-5">Corrispondenze a partire dai battesimi</h4>
      <?php
        $qBattesimoMorte = "SELECT * FROM battesimomorte";
        $qBattesimoMorteE = mysqli_query($conn,$qBattesimoMorte);
        $contaBattesimoMorte = mysqli_num_rows($qBattesimoMorteE);
        if ($contaBattesimoMorte>0){
      ?>
      <div id="boxAlert"></div>
      <div class="table-responsive p-2">
        <table id='tabellaBattesimoMorte' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDBattesimo'>IDBattesimo</th>
              <th data-field='IDMorte'>IDMorte</th>
              <th data-field='MorteIncerto'>Incertezza Morte</th>
              <th data-field='IDMatrimonio'>IDMatrimonio</th>
              <th data-field='MatrimonioIncerto'>Incertezza Matrimonio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($BattesimoMorte = mysqli_fetch_array($qBattesimoMorteE)){
            ?>
            <tr class='righeBattesimoMorte' style="display:none;">
              <td><?php echo $BattesimoMorte[0]; ?></td>
              <td><?php echo $BattesimoMorte[1]; ?></td>
              <td><?php echo $BattesimoMorte[2]; ?></td>
              <td><?php echo $BattesimoMorte[3]; ?></td>
              <td><?php echo $BattesimoMorte[4]; ?></td>
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
      <h4 class="font-weight-bold blue-grey-text mt-5">Corrispondenze a partire dai morti</h4>
      <?php
        $qMorteBattesimo = "SELECT * FROM mortebattesimo";
        $qMorteBattesimoE = mysqli_query($conn,$qMorteBattesimo);
        $contaMorteBattesimo = mysqli_num_rows($qMorteBattesimoE);
        if ($contaMorteBattesimo>0){
      ?>
      <div id="boxAlert"></div>
      <div class="table-responsive p-2">
        <table id='tabellaMorteBattesimo' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDMorte'>IDMorte</th>
              <th data-field='IDBattesimo'>IDBattesimo</th>
              <th data-field='BattesimoIncerto'>Incertezza Battesimo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($MorteBattesimo = mysqli_fetch_array($qMorteBattesimoE)){
            ?>
            <tr class='righeMorteBattesimo' style="display:none;">
              <td><?php echo $MorteBattesimo[0]; ?></td>
              <td><?php echo $MorteBattesimo[1]; ?></td>
              <td><?php echo $MorteBattesimo[2]; ?></td>
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
var tabella1 = $("#tabellaBattesimoMorte").DataTable({
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
    "sSearch": "Cerca ID:",
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
  $(".righeBattesimoMorte").css("display","table-row");
  var body = $(tabella1.table().body());
  body.unhighlight();
  body.highlight(tabella1.search());
});
$("#tabellaBattesimoMorte tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaBattesimoMorte");
  var dati=tabella1.row( this ).data();
  var idBattesimo=dati[0];
  var idMorte=dati[1];
  var morteIncerto=dati[2];
  var idMatrimonio=dati[3];
  var matrimonioIncerto=dati[4];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaBattesimoMorte");
  $("#idBattesimo1Mod").val(idBattesimo);
  $("#IDMorte1Mod").val(idMorte);
  $("#MorteIncertoMod").val(morteIncerto);
  $("#IDMatrimonioMod").val(idMatrimonio);
  $("#MatrimonioIncertoMod").val(matrimonioIncerto);
});
$("#IDMorte1Mod").keyup(function(){
  $(this).attr("id","IDMorte1ModNuova");
});
$("#MorteIncertoMod").keyup(function(){
  $(this).attr("id","MorteIncertoModNuova");
});
$("#IDMatrimonioMod").keyup(function(){
  $(this).attr("id","IDMatrimonioModNuova");
});
$("#MatrimonioIncertoMod").keyup(function(){
  $(this).attr("id","MatrimonioIncertoModNuova");
});
$("#modificaBattMorteButton").click(function(){
  var idBattesimo=$("#idBattesimo1Mod").val();
  var IDMorte=$("#IDMorte1Mod").val();
  var IDMorteNuova=$("#IDMorte1ModNuova").val();
  var morteIncerto=$("#MorteIncertoMod").val();
  var morteIncertoNuova=$("#MorteIncertoModNuova").val();
  var IDMatrimonio=$("#IDMatrimonioMod").val();
  var IDMatrimonioNuova=$("#IDMatrimonioModNuova").val();
  var matrimonioIncerto=$("#MatrimonioIncertoMod").val();
  var matrimonioIncertoNuova=$("#MatrimonioIncertoModNuova").val();
    $.ajax({
      type:'POST',
      url:'modificaCorrispondenze.php',
      data:{
        idBattesimo:idBattesimo,
        IDMorte:IDMorte,
        IDMorteNuova:IDMorteNuova,
        morteIncerto:morteIncerto,
        morteIncertoNuova:morteIncertoNuova,
        IDMatrimonio:IDMatrimonio,
        IDMatrimonioNuova:IDMatrimonioNuova,
        matrimonioIncerto:matrimonioIncerto,
        matrimonioIncertoNuova:matrimonioIncertoNuova,
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErrore8").css("color","green");
          $("#messaggioErrore8").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioErrore8").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaBattesimoMorte").on("hidden.bs.modal", function () {
  $("#messaggioErrore8").html("");
});
var tabella2 = $("#tabellaMorteBattesimo").DataTable({
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
    "sSearch": "Cerca ID:",
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
  $(".righeMorteBattesimo").css("display","table-row");
  var body = $(tabella2.table().body());
  body.unhighlight();
  body.highlight(tabella2.search());
});
$("#tabellaMorteBattesimo tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaMorteBattesimo");
  var dati=tabella2.row( this ).data();
  var idMorte=dati[0];
  var idBattesimo=dati[1];
  var battesimoIncerto=dati[2];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaMorteBattesimo");
  $("#IDMorte2Mod").val(idMorte);
  $("#idBattesimo2Mod").val(idBattesimo);
  $("#BattesimoIncertoMod").val(battesimoIncerto);
});
$("#idBattesimo2Mod").keyup(function(){
  $(this).attr("id","idBattesimo2ModNuova");
});
$("#BattesimoIncertoMod").keyup(function(){
  $(this).attr("id","BattesimoIncertoModNuova");
});
$("#modificaMorteBattButton").click(function(){
  var idMorte=$("#IDMorte2Mod").val();
  console.log(idMorte);
  var idBattesimo=$("#idBattesimo2Mod").val();
  console.log(idBattesimo);
  var idBattesimoNuova=$("#idBattesimo2ModNuova").val();
  console.log(idBattesimoNuova);
  var battesimoIncerto=$("#BattesimoIncertoMod").val();
  console.log(battesimoIncerto);
  var battesimoIncertoNuova=$("#BattesimoIncertoModNuova").val();
  console.log(battesimoIncertoNuova);
    $.ajax({
      type:'POST',
      url:'modificaCorrispondenze1.php',
      data:{
        idBattesimo:idBattesimo,
        idMorte:idMorte,
        idBattesimoNuova:idBattesimoNuova,
        battesimoIncerto:battesimoIncerto,
        battesimoIncertoNuova:battesimoIncertoNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErrore9").css("color","green");
          $("#messaggioErrore9").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioErrore9").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaMorteBattesimo").on("hidden.bs.modal", function () {
  $("#messaggioErrore9").html("");
});
</script>
</body>
</html>
<?php
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
