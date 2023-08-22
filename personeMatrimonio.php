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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.21/features/searchHighlight/dataTables.searchHighlight.css">
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
    <div class="loader-wrapper">
      <span class="loader"></span>
    </div>
    <div class="container mt-5">
      <?php
        $registropart=$_GET["registropart"];
        $genere=$_GET["genere"];
        $cognome=$_GET["cognome"];
      ?>
      <div class="mb-5">
        <h5 class="font-weight-bold blue-grey-text">Ricerca a partire dagli atti di matrimonio</h5>
        <h1 class="font-weight-bold blue-grey-text"><?php echo $cognome; ?></h1>
      </div>
      <div class="table-responsive p-2">
        <?php
          if ($genere=="M"){
            $qPersoneMatrimonio = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio FROM $registropart WHERE Anno<1900 AND CognomeSposo='$cognome' ORDER BY Anno ASC";
            $qPersoneMatrimonioE = mysqli_query($conn,$qPersoneMatrimonio);
            $contaPersoneMatrimonioE = mysqli_num_rows($qPersoneMatrimonioE);
          }else{
            $qPersoneMatrimonio = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio FROM $registropart WHERE Anno<1900 AND CognomeSposa='$cognome' ORDER BY Anno ASC";
            $qPersoneMatrimonioE = mysqli_query($conn,$qPersoneMatrimonio);
            $contaPersoneMatrimonioE = mysqli_num_rows($qPersoneMatrimonioE);
          }
            if ($contaPersoneMatrimonioE>0){
              echo (
                "<table id='tabellaPersone' class='table compact hover'>".
                  "<thead class='grey lighten-2'>".
                    "<tr>".
                      "<th data-field='indice'>#</th>".
                      "<th data-field='annoBattesimo'>Anno matrimonio</th>".
                      "<th data-field='numAtto'>Numero Atto</th>".
                      "<th data-field='cognome'>Cognome Sposo</th>".
                      "<th data-field='nome'>Nome Sposo</th>".
                      "<th data-field='eta'>Età Sposo</th>".
                      "<th data-field='nomePadre'>Nome Padre Sposo</th>".
                      "<th data-field='cognome'>Cognome Sposa</th>".
                      "<th data-field='nome'>Nome Sposa</th>".
                      "<th data-field='eta'>Età Sposa</th>".
                      "<th data-field='nomePadre'>Nome Padre Sposa</th>".
                      "<th style='display:none;' data-field='ID'>IDMatrimonio</th>".
                    "</tr>".
                  "</thead>".
                  "<tbody>"
              );
              $count=1;
              while($PersoneMatrimonio = mysqli_fetch_array($qPersoneMatrimonioE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th scope='row'>$count</th>".
                    "<td>$PersoneMatrimonio[0]</td>".
                    "<td>$PersoneMatrimonio[9]</td>".
                    "<td>$PersoneMatrimonio[1]</td>".
                    "<td>$PersoneMatrimonio[2]</td>".
                    "<td>$PersoneMatrimonio[3]</td>".
                    "<td>$PersoneMatrimonio[4]</td>".
                    "<td>$PersoneMatrimonio[5]</td>".
                    "<td>$PersoneMatrimonio[6]</td>".
                    "<td>$PersoneMatrimonio[7]</td>".
                    "<td>$PersoneMatrimonio[8]</td>".
                    "<td style='display:none;' class='ID'>$PersoneMatrimonio[10]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }

        ?>
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
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
<script src="openseadragon/openseadragon.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
$(window).on("load",function(){
  $(".loader-wrapper").fadeOut("slow");
});
  //IMPOSTAZIONI TABELLA DEGLI ATTI
  var tabella = $("#tabellaPersone").DataTable({
    lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
    ordering:false,
    searchHighlight: true,
      columns: [
        { "width": "5%" },
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null
      ],
    language:{
      "sEmptyTable": "Nessun dato presente nella tabella",
      "sInfo": "Vista da _START_ a _END_ di _TOTAL_ <?php if ($genere=='M'){echo ("degli sposi");}else{echo("delle spose");} ?> con cognome <?php echo $cognome; ?>",
      "sInfoEmpty": "Vista da 0 a 0 di 0 <?php if ($genere=='M'){echo ("degli sposi");}else{echo("delle spose");} ?> con cognome <?php echo $cognome; ?>",
      "sInfoFiltered": "[filtrati da _MAX_ <?php if ($genere=='M'){echo ("degli sposi");}else{echo("delle spose");} ?> totali]",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Visualizza _MENU_ <?php if ($genere=='M'){echo ("degli sposi");}else{echo("delle spose");} ?> con cognome <?php echo $cognome; ?>",
      "sLoadingRecords": "Caricamento...",
      "sProcessing": "Elaborazione...",
      "sSearch": "Cerca:",
      "sZeroRecords": "La ricerca non ha portato alcun risultato.",
      "oPaginate": {
          "sFirst": "Inizio",
          "sPrevious": "Atti precedenti",
          "sNext": "Atti successivi",
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
  $('#tabellaPersone tbody').on('click','tr',function(){
    var dati=tabella.row( this ).data();
    <?php if($registropart=="matrimonio"){ ?>
      var IDpersona=dati[11];
      window.location.href = "personaMatrimonio.php?registropart=<?php echo $registropart; ?>&&cognome=<?php echo $cognome; ?>&&genere=<?php echo $genere; ?>&&ID="+IDpersona;
    <?php }else{ ?>
      var IDpersona=dati[4];
      window.location.href = "persona.php?registropart=<?php echo $registropart; ?>&&cognome=<?php echo $cognome; ?>&&genere=<?php echo $genere; ?>&&ID="+IDpersona;
    <?php } ?>

  });
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
