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
        <h5 class="font-weight-bold blue-grey-text"><?php if($registropart=="battesimo"){echo ("Ricerca a partire dagli atti di battesimo");}else{echo("Ricerca a partire dagli atti di morte");}?></h5>
        <h1 class="font-weight-bold blue-grey-text"><?php echo $cognome; ?></h1>
      </div>
      <div class="table-responsive p-2">
        <?php
        if($registropart=="battesimo"){
            $qPersone = "SELECT Anno,Cognome,Nome,IDBattesimo FROM $registropart WHERE Anno<1900 AND Cognome='$cognome' AND Sesso='$genere' ORDER BY Anno ASC";
            $qPersoneE = mysqli_query($conn,$qPersone);
            $contaPersoneE = mysqli_num_rows($qPersoneE);
        }else{
          $qPersone = "SELECT Anno,Cognome,Nome,IDMorte FROM $registropart WHERE Anno<1900 AND Cognome='$cognome' AND Sesso='$genere' ORDER BY Anno ASC";
          $qPersoneE = mysqli_query($conn,$qPersone);
          $contaPersoneE = mysqli_num_rows($qPersoneE);
        }
            if ($contaPersoneE>0){
              echo (
                "<table id='tabellaPersone' class='table compact hover'>".
                  "<thead class='grey lighten-2'>".
                    "<tr>".
                      "<th data-field='indice'>#</th>".
                      "<th data-field='annoBattesimo'>Anno</th>".
                      "<th data-field='numAtto'>Cognome</th>".
                      "<th data-field='cognome'>Nome</th>".
                      "<th style='display:none;' data-field='ID'>ID</th>".
                    "</tr>".
                  "</thead>".
                  "<tbody>"
              );
              $count=1;
              while($Persone = mysqli_fetch_array($qPersoneE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th scope='row'>$count</th>".
                    "<td>$Persone[0]</td>".
                    "<td>$Persone[1]</td>".
                    "<td>$Persone[2]</td>".
                    "<td style='display:none;' class='ID'>$Persone[3]</td>".
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
        null
      ],
    language:{
      "sEmptyTable": "Nessun dato presente nella tabella",
      "sInfo": "Vista da _START_ a _END_ di _TOTAL_ <?php if ($genere=='M'){echo ("uomini");}else{echo("donne");} ?> con cognome <?php echo $cognome; ?>",
      "sInfoEmpty": "Vista da 0 a 0 di 0 <?php if ($genere=='M'){echo ("uomini");}else{echo("donne");} ?> con cognome <?php echo $cognome; ?>",
      "sInfoFiltered": "[filtrati da _MAX_ <?php if ($genere=='M'){echo ("uomini");}else{echo("donne");} ?> totali]",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Visualizza _MENU_ <?php if ($genere=='M'){echo ("uomini");}else{echo("donne");} ?> con cognome <?php echo $cognome; ?>",
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
    var IDpersona=dati[4];
    window.location.href = "persona.php?registropart=<?php echo $registropart; ?>&&cognome=<?php echo $cognome; ?>&&genere=<?php echo $genere; ?>&&ID="+IDpersona;
  });
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
