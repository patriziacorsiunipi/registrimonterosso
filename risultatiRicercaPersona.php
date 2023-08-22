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
  <main class="contenitore">
    <?php include 'GoogleAccessSessions.php' ?>
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="text-center font-weight-bold blue-grey-text">Risultati della tua ricerca</h1>
      <div class="row mt-5">
        <div class="col-md-12 text-justify">
          <?php
          $persona=$_GET["persona"];
          $registro=$_GET["registro"];
          $sesso=$_GET["sesso"];
          if ($registro=="battesimo"){
            $qPersona = "SELECT IDBattesimo,Anno,Cognome,Nome FROM $registro WHERE Anno<1900 AND Sesso='$sesso' AND (Cognome LIKE '$persona%' OR Nome LIKE '$persona%' OR CONCAT(Cognome,  ' ', Nome) LIKE '$persona%' OR CONCAT(Nome,  ' ', Cognome) LIKE '$persona%')";
            $qPersonaE = mysqli_query($conn,$qPersona);
            $contaPersone = mysqli_num_rows($qPersonaE);
            if ($contaPersone>0){
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
              while($Persone = mysqli_fetch_array($qPersonaE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th scope='row'>$count</th>".
                    "<td>$Persone[1]</td>".
                    "<td>$Persone[2]</td>".
                    "<td>$Persone[3]</td>".
                    "<td class='ID hidden'>$Persone[0]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }else{
              echo("<p class='text-center'>Non è stato trovato nessun risultato per la tua ricerca</p>");
            }
          }elseif($registro=="matrimonio"){
            if($sesso=="M"){
              $qPersona = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio FROM $registro WHERE Anno<1900 AND (CognomeSposo LIKE '$persona%' OR NomeSposo LIKE '$persona%' OR CONCAT(CognomeSposo,  ' ', NomeSposo) LIKE '$persona%' OR CONCAT(NomeSposo,  ' ', CognomeSposo) LIKE '$persona%')";
              $qPersonaE = mysqli_query($conn,$qPersona);
              $contaPersone = mysqli_num_rows($qPersonaE);
            }else{
              $qPersona = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio FROM $registro WHERE Anno<1900 AND (CognomeSposa LIKE '$persona%' OR NomeSposa LIKE '$persona%' OR CONCAT(CognomeSposa,  ' ', NomeSposa) LIKE '$persona%' OR CONCAT(NomeSposa,  ' ', CognomeSposa) LIKE '$persona%')";
              $qPersonaE = mysqli_query($conn,$qPersona);
              $contaPersone = mysqli_num_rows($qPersonaE);
            }
            if ($contaPersone>0){
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
              while($Persone = mysqli_fetch_array($qPersonaE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th scope='row'>$count</th>".
                    "<td>$Persone[0]</td>".
                    "<td>$Persone[9]</td>".
                    "<td>$Persone[1]</td>".
                    "<td>$Persone[2]</td>".
                    "<td>$Persone[3]</td>".
                    "<td>$Persone[4]</td>".
                    "<td>$Persone[5]</td>".
                    "<td>$Persone[6]</td>".
                    "<td>$Persone[7]</td>".
                    "<td>$Persone[8]</td>".
                    "<td style='display:none;' class='ID'>$Persone[10]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }else{
              echo("<p class='text-center'>Non è stato trovato nessun risultato per la tua ricerca</p>");
            }
          }else{
            $qPersona = "SELECT IDMorte,Anno,Cognome,Nome FROM $registro WHERE Anno<1900 AND Sesso='$sesso' AND (Cognome LIKE '$persona%' OR Nome LIKE '$persona%' OR CONCAT(Cognome,  ' ', Nome) LIKE '$persona%' OR CONCAT(Nome,  ' ', Cognome) LIKE '$persona%') ";
            $qPersonaE = mysqli_query($conn,$qPersona);
            $contaPersone = mysqli_num_rows($qPersonaE);
            if ($contaPersone>0){
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
              while($Persone = mysqli_fetch_array($qPersonaE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th scope='row'>$count</th>".
                    "<td>$Persone[1]</td>".
                    "<td>$Persone[2]</td>".
                    "<td>$Persone[3]</td>".
                    "<td class='ID hidden'>$Persone[0]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }else{
              echo("<p class='text-center'>Non è stato trovato nessun risultato per la tua ricerca</p>");
            }
          }
          ?>
        </div>
      </div>
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
  <script src="openseadragon/openseadragon.min.js"></script>
  <script src="js/sign.js"></script>
<script type="text/javascript">
var tabella = $("#tabellaPersone").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  <?php if($registro=="matrimonio"){ ?>
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
  <?php }else{ ?>
    columns: [
      { "width": "5%" },
      null,
      null,
      null,
      null
    ],
  <?php } ?>
  language:{
    "sEmptyTable": "Nessun dato presente nella tabella",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ risultati",
    "sInfoEmpty": "Vista da 0 a 0 di 0 risultati",
    "sInfoFiltered": "[filtrati da _MAX_ risultati totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ risultati",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca nel risultato:",
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
$('#tabellaPersone tbody').on('click','tr',function(){
  var dati=tabella.row( this ).data();
  <?php if($registro=="matrimonio"){ ?>
    var IDpersona=dati[11];
    window.location.href = "personaMatrimonio.php?registropart=<?php echo $registro; ?>&&ID="+IDpersona;
  <?php }else{ ?>
    var IDpersona=dati[4];
    window.location.href = "persona.php?registropart=<?php echo $registro; ?>&&ID="+IDpersona;
  <?php } ?>
});
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
