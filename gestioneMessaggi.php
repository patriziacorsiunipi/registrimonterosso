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
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Gestione messaggi</h1>
      <hr>
      <?php
        $qMessaggi = "SELECT DataOra, Utente, Messaggio, IDPersona,IDMessaggio FROM crowdsourcing ORDER BY DataOra DESC";
        $qMessaggiE = mysqli_query($conn,$qMessaggi);
        $contaMessaggi = mysqli_num_rows($qMessaggiE);
        if ($contaMessaggi>0){
      ?>
      <div id="boxAlert"></div>
      <div class="table-responsive p-2">
        <table id='tabellaMessaggi' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='Data'>Data e ora</th>
              <th data-field='Utente'>Utente</th>
              <th data-field='messaggio'>Messaggio</th>
              <th data-field='IDpersona'>Riferimento</th>
              <th data-field='elimina'>Elimina messaggio</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($Messaggi = mysqli_fetch_array($qMessaggiE)){
            ?>
            <tr class='righeMessaggi'>
              <td><?php echo $Messaggi[0]; ?></td>
              <td><?php echo $Messaggi[1]; ?></td>
              <td><?php echo $Messaggi[2]; ?></td>
              <td><?php echo $Messaggi[3]; ?></td>
              <td id="<?php echo $Messaggi[4]; ?>" class="eliminaButton text-danger font-weight-bold"><a>Elimina</a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
      }else{
        echo("Non ci sono messaggi");
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
//IMPOSTAZIONI TABELLA DEGLI ATTI
var tabella = $("#tabellaMessaggi").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  columnDefs: [
    {
     targets: [2],
     render: function(data, type, full, meta){
        if(type === 'display'){
           data = strtrunc(data, 25);
        }
        return data;
     }
    },
    {
     targets: [0]
    },
    {
     targets: [3]
    },
    {
     targets: [4],
     searchable:false
   }
  ],
  language:{
    "sEmptyTable": "Nessun dato presente nella tabella",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ messaggi",
    "sInfoEmpty": "Vista da 0 a 0 di 0 messaggi",
    "sInfoFiltered": "[filtrati da _MAX_ messaggi totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ messaggi",
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
$(".eliminaButton").click(function(){
  var id=$(this).attr("id");
  if (confirm("Vuoi davvero eliminare il messaggio?")){
    $.ajax({
      url:"eliminaMessaggio.php",
      method:"POST",
      data:{id:id},
      success:function(risposta){
        $("#boxAlert").html("<div class='alert alert-success'>"+risposta+"</div>");
        location.reload();
      }
    });
  }
});
$('#tabellaMessaggi tbody').on('click','tr',function(e){
  e.preventDefault();
  e.stopPropagation();
  var dati=tabella.row( this ).data();
  var dataora=dati[0];
  var utente=dati[1];
  var messaggio=dati[2];
  var IDpersona=dati[3];
  $(window.location).attr('href','messaggioFull.php?dataora='+dataora+'&&utente='+utente+'&&messaggio='+messaggio+'&&IDpersona='+IDpersona);
 });

</script>
</body>
</html>
<?php
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
