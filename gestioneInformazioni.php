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
    <!-- GESTIONE INFO -->
    <?php include 'modalModificaInformazioni.php' ?>
    <?php include 'modalAggiungiInfo.php' ?>
    <!-- gestione info -->
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Gestione informazioni su atti</h1>
      <hr>
      <div class="d-flex justify-content-end mb-3">
        <button id="aggiungiInfo" class="btn btn-sm btn-light" data-toggle="modal" data-target="#modaggiungiInfo">Aggiungi informazione</button>
      </div>
      <?php
        $qInformazioni = "SELECT IdPersona, Informazioni FROM infopersona";
        $qInformazioniE = mysqli_query($conn,$qInformazioni);
        $contaInformazioni = mysqli_num_rows($qInformazioniE);
        if ($contaInformazioni>0){
      ?>
      <div id="boxAlert"></div>
      <div class="table-responsive p-2">
        <table id='tabellaInformazioni' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='ID'>ID</th>
              <th data-field='Informazioni'>Informazioni</th>
              <th data-field='elimina'>Elimina messaggio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($Informazioni = mysqli_fetch_array($qInformazioniE)){
            ?>
            <tr class='righeInformazioni'>
              <td><?php echo $Informazioni[0]; ?></td>
              <td><?php echo $Informazioni[1]; ?></td>
              <td id="<?php echo $Informazioni[0]; ?>" class="eliminaButton text-danger font-weight-bold"><a>Elimina</a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      }else{
        echo("Nessuna informazioni presente");
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
function strtrunc(str, max, add){
   add = add || '...';
   return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};
//IMPOSTAZIONI TABELLA DELLE INFORMAZIONI
var tabella = $("#tabellaInformazioni").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  language:{
    "sEmptyTable": "Nessun dato presente nella tabella",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ informazioni",
    "sInfoEmpty": "Vista da 0 a 0 di 0 informazioni",
    "sInfoFiltered": "[filtrati da _MAX_ informazioni totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ informazioni",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca mittente:",
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
tabella.on('draw', function(){
  var body = $(tabella.table().body());
  body.unhighlight();
  body.highlight(tabella.search());
});

$("#aggiungiInfoButton").click(function(){
  var idInfo=$("#idInfoAgg").val();
  var info=$("#infoAgg").val();
  if (idInfo.length!="" && info.length!=""){
    $.ajax({
      type:'POST',
      url:'aggiungiInfo.php',
      data:{
        idInfo:idInfo,
        info:info
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErrore15").css("color","green");
          $("#messaggioErrore15").html("Informazione inserita");
          location.reload();
        }else{
          $("#messaggioErrore15").html(risposta);
        }
      }
    });
    return false;
  }else{
    $("#messaggioErrore15").html("Tutti i campi sono obbligatori");
  }
});
$("#modaggiungiInfo").on("hidden.bs.modal", function () {
  $("#messaggioErrore15").html("");
});

$("#tabellaInformazioni tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaInformazioni");
  var dati=tabella.row( this ).data();
  var id=dati[0];
  var info=dati[1];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaInformazioni");
  $("#idInfoMod").val(id);
  $("#infoMod").val(info);
});
$("#infoMod").keyup(function(){
  $(this).attr("id","infoModNuova");
});

$("#modificaInfoButton").click(function(){
  var idInfoMod=$("#idInfoMod").val();
  var infoMod=$("#infoMod").val();
  var infoModNuova=$("#infoModNuova").val();
    $.ajax({
      type:'POST',
      url:'modificaInformazioni.php',
      data:{
        idInfoMod:idInfoMod,
        infoMod:infoMod,
        infoModNuova:infoModNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErroreInfo").css("color","green");
          $("#messaggioErroreInfo").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioErroreInfo").html(risposta);
        }
      }
    });
    return false;
});
$("#modificaInformazioni").on("hidden.bs.modal", function () {
  $("#messaggioErroreInfo").html("");
});


$(".eliminaButton").click(function(){
  var idInfo=$(this).attr("id");
  if (confirm("Vuoi davvero eliminare questa informazione?")){
    $.ajax({
      url:"eliminaInfo.php",
      method:"POST",
      data:{idInfo:idInfo},
      success:function(risposta){
        $("#boxAlert").html("<div class='alert alert-success'>"+risposta+"</div>");
        location.reload();
      }
    });
  }
});

</script>
</body>
</html>
<?php
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
