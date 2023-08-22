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
      <p class="text-white font-weight-bold ml-3 mt-3">Attendi il caricamento della pagina</p>
    </div>
    <div class="container mt-5">
      <?php
        $annoRegistro=$_GET["annoRegistro"];
        $tipoRegistro=$_GET["tipoRegistro"];
        $numeroRegistro=$_GET["numeroRegistro"];
      ?>
      <div class="mb-5">
        <h1 class="font-weight-bold blue-grey-text">Registro n.<?php echo $numeroRegistro; ?></h1>
        <a class="text-primary" id="nuovaScheda">Ricerca in nuova scheda</a><br>
        <a href="#contenitoreImmaginiRegistro">Scorri alle immagini del registro</a>
      </div>
      <div class="table-responsive p-2">
        <?php
          if($tipoRegistro=="battesimo"){
            $qAttiBattesimo = "SELECT Anno,Cognome,Nome,Sesso,NomePadre,CognomeMadre,NomeMadre,OrdineRegistro,IDBattesimo FROM battesimo WHERE Anno<1900 AND NumRegistro='$numeroRegistro' AND Anno='$annoRegistro'";
            $qAttiBattesimoE = mysqli_query($conn,$qAttiBattesimo);
            $contaAttiBattesimo = mysqli_num_rows($qAttiBattesimoE);
            if ($contaAttiBattesimo>0){
              echo (
                "<table id='tabellaAtti' class='table compact hover'>".
                  "<thead class='grey lighten-2'>".
                    "<tr>".
                      "<th data-field=''></th>".
                      "<th data-field='indice'>#</th>".
                      "<th data-field='annoBattesimo'>Anno battesimo</th>".
                      "<th data-field='numAtto'>Numero Atto</th>".
                      "<th data-field='cognome'>Cognome</th>".
                      "<th data-field='nome'>Nome</th>".
                      "<th data-field='sesso'>Sesso</th>".
                      "<th data-field='nomePadre'>Nome Padre</th>".
                      "<th data-field='cognomeMadre'>Cognome Madre</th>".
                      "<th data-field='nomeMadre'>Nome Madre</th>".
                      "<th data-field='IDBattesimo'>IDBattesimo</th>".
                    "</tr>".
                  "</thead>".
                  "<tbody>"
              );
              $count=1;
              while($AttiBattesimo = mysqli_fetch_array($qAttiBattesimoE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th style='cursor:pointer' class='markerIcon'><img src='img/marker-pen.png' width='20' height='20' alt='Marker Pen'></th>".
                    "<th scope='row'>$count</th>".
                    "<td>$AttiBattesimo[0]</td>".
                    "<td>$AttiBattesimo[7]</td>".
                    "<td>$AttiBattesimo[1]</td>".
                    "<td>$AttiBattesimo[2]</td>".
                    "<td>$AttiBattesimo[3]</td>".
                    "<td>$AttiBattesimo[4]</td>".
                    "<td>$AttiBattesimo[5]</td>".
                    "<td>$AttiBattesimo[6]</td>".
                    "<td>$AttiBattesimo[8]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }
          }elseif($tipoRegistro=="matrimonio"){
            $qAttiMatrimonio = "SELECT Anno,CognomeSposo,NomeSposo,EtaSposo,PadreSposo,CognomeSposa,NomeSposa,EtaSposa,PadreSposa,OrdineRegistro,IDMatrimonio FROM matrimonio WHERE Anno<1900 AND NumRegistro='$numeroRegistro' AND Anno='$annoRegistro'";
            $qAttiMatrimonioE = mysqli_query($conn,$qAttiMatrimonio);
            $contaAttiMatrimonio = mysqli_num_rows($qAttiMatrimonioE);
            if ($contaAttiMatrimonio>0){
              echo (
                "<table id='tabellaAtti' class='table compact hover'>".
                  "<thead class='grey lighten-2'>".
                    "<tr>".
                      "<th data-field=''></th>".
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
                      "<th data-field='IDMatrimonio'>IDMatrimonio</th>".
                    "</tr>".
                  "</thead>".
                  "<tbody>"
              );
              $count=1;
              while($AttiMatrimonio = mysqli_fetch_array($qAttiMatrimonioE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th style='cursor:pointer' class='markerIcon'><img src='img/marker-pen.png' width='20' height='20' alt='Marker Pen'></th>".
                    "<th scope='row'>$count</th>".
                    "<td>$AttiMatrimonio[0]</td>".
                    "<td>$AttiMatrimonio[9]</td>".
                    "<td>$AttiMatrimonio[1]</td>".
                    "<td>$AttiMatrimonio[2]</td>".
                    "<td>$AttiMatrimonio[3]</td>".
                    "<td>$AttiMatrimonio[4]</td>".
                    "<td>$AttiMatrimonio[5]</td>".
                    "<td>$AttiMatrimonio[6]</td>".
                    "<td>$AttiMatrimonio[7]</td>".
                    "<td>$AttiMatrimonio[8]</td>".
                    "<td>$AttiMatrimonio[10]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }
          }else{
            $qAttiMorte = "SELECT Anno,EtaMorte,Cognome,Nome,Sesso,NomePadre,CognomeMadre,NomeMadre,NomeConiuge,PadreConiuge,OrdineRegistro,IDMorte FROM morte WHERE Anno<1900 AND NumRegistro='$numeroRegistro' AND Anno='$annoRegistro'";
            $qAttiMorteE = mysqli_query($conn,$qAttiMorte);
            $contaAttiMorte = mysqli_num_rows($qAttiMorteE);
            if ($contaAttiMorte>0){
              echo (
                "<table id='tabellaAtti' class='table compact hover'>".
                  "<thead class='grey lighten-2'>".
                    "<tr>".
                      "<th data-field=''></th>".
                      "<th data-field='indice'>#</th>".
                      "<th data-field='annoBattesimo'>Anno morte</th>".
                      "<th data-field='etaMorte'>Eta Morte</th>".
                      "<th data-field='numAtto'>Numero Atto</th>".
                      "<th data-field='cognome'>Cognome</th>".
                      "<th data-field='nome'>Nome</th>".
                      "<th data-field='sesso'>Sesso</th>".
                      "<th data-field='nomePadre'>Nome Padre</th>".
                      "<th data-field='cognomeMadre'>Cognome Madre</th>".
                      "<th data-field='nomeMadre'>Nome Madre</th>".
                      "<th data-field='IDMorte'>IDMorte</th>".
                    "</tr>".
                  "</thead>".
                  "<tbody>"
              );
              $count=1;
              while($AttiMorte = mysqli_fetch_array($qAttiMorteE)){
                echo (
                  "<tr class='righeAtti'>".
                    "<th style='cursor:pointer' class='markerIcon'><img src='img/marker-pen.png' width='20' height='20' alt='Marker Pen'></th>".
                    "<th scope='row'>$count</th>".
                    "<td>$AttiMorte[0]</td>".
                    "<td>$AttiMorte[1]</td>".
                    "<td>$AttiMorte[10]</td>".
                    "<td>$AttiMorte[2]</td>".
                    "<td>$AttiMorte[3]</td>".
                    "<td>$AttiMorte[4]</td>".
                    "<td>$AttiMorte[5]</td>".
                    "<td>$AttiMorte[6]</td>".
                    "<td>$AttiMorte[7]</td>".
                    "<td>$AttiMorte[11]</td>".
                  "</tr>"
                );
                $count=$count+1;
              }
              echo ("</tbody>");
              echo ("</table>");
            }
          }
        ?>
        </div>
        <!-- IMMAGINI REGISTRO -->
        <div id="contenitoreImmaginiRegistro" class="mt-5">
          <h5 class="font-weight-bold blue-grey-text pt-5">Sfoglia il registro</h5>
          <div id="toolbarDiv" class="toolbar mt-3" style="position:relative;height:36px;display:flex;">
          </div>
          <div id="registro" class="card mt-0 mb-4" style="height:500px;">
          </div>
          <figcaption class="text-right">
          <p>Registro
            <?php
              if ($tipoRegistro=="battesimo"){
                echo("dei battesimi");
              }elseif($tipoRegistro=="matrimonio"){
                echo("dei matrimoni");
              }else{
                echo("di morte");
              }
              ?> n. <?php echo $numeroRegistro ?></p>
          </figcaption>
        </div>
        <!-- immagini registro -->
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

  $("#nuovaScheda").click(function(){
    window.open(document.URL, '_blank');
  });
  //IMPOSTAZIONI TABELLA DEGLI ATTI
  var tabella = $("#tabellaAtti").DataTable({
    lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
    ordering:false,
    searchHighlight: true,
    <?php if ($tipoRegistro == "battesimo"){ ?>
      columns: [
        { width: "5%" },
        null,
        { width: "5%" },
        { width: "5%" },
        null,
        null,
        null,
        null,
        null,
        null,
        {
          targets: [ 9 ],
          visible: false,
          searchable: false
        },
      ],
    <?php }elseif ($tipoRegistro == "matrimonio"){?>
      columns: [
        { width: "5%" },
        null,
        { "width": "5%" },
        { "width": "5%" },
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        {
          targets: [ 11 ],
          visible: false,
          searchable: false
        },
      ],
    <?php }else{ ?>
      columns: [
        { width: "5%" },
        null,
        { "width": "5%" },
        { "width": "5%" },
        { "width": "5%" },
        null,
        null,
        null,
        null,
        null,
        null,
        {
          visible: false,
          searchable: false
        },
      ],
    <?php } ?>
    language:{
      "sEmptyTable": "Nessun dato presente nella tabella",
      "sInfo": "Vista da _START_ a _END_ di _TOTAL_ atti del registro n.<?php echo $numeroRegistro ?> (anno <?php echo $annoRegistro ?>)",
      "sInfoEmpty": "Vista da 0 a 0 di 0 atti del registro n.<?php echo $numeroRegistro ?> (anno <?php echo $annoRegistro ?>)",
      "sInfoFiltered": "[filtrati da _MAX_ atti totali]",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "Visualizza _MENU_ atti del registro n.<?php echo $numeroRegistro ?> (anno <?php echo $annoRegistro ?>)",
      "sLoadingRecords": "Caricamento...",
      "sProcessing": "Elaborazione...",
      "sSearch": "Cerca nel registro:",
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
  //SELEZIONE DI UN SIGNOLO ATTO NELLA TABELLA
  $('#tabellaAtti tbody').on('click', 'tr .markerIcon', function (e) {
    e.preventDefault();
    e.stopPropagation();
    if ($(this).closest("tr").css("backgroundColor") == "rgb(255, 255, 128)"){
      $(this).closest("tr").css("backgroundColor","white");
    }else{
      $("#tabellaAtti tbody tr").css("backgroundColor","white");
      $(this).closest("tr").css("backgroundColor","rgb(255, 255, 128)");
    }
   });
   $('#tabellaAtti tbody').on('click','tr',function(e){
     e.preventDefault();
     e.stopPropagation();
   <?php if ($tipoRegistro == "battesimo"){ ?>
       var dati=tabella.row( this ).data();
       var IDBattesimo=dati[10];
       window.location.href = "persona.php?registropart=<?php echo $tipoRegistro; ?>&&ID="+IDBattesimo;
    <?php }elseif ($tipoRegistro == "morte"){?>
      var dati=tabella.row( this ).data();
      var IDMorte=dati[11];
      window.location.href = "persona.php?registropart=<?php echo $tipoRegistro; ?>&&ID="+IDMorte;
    <?php
    }else{ ?>
      var dati=tabella.row( this ).data();
      var IDMatrimonio=dati[12];
      window.location.href = "personaMatrimonio.php?registropart=<?php echo $tipoRegistro; ?>&&ID="+IDMatrimonio;
    <?php } ?>
    });
  //GESTIONE IMMAGINI DI REGISTRO
  var height = $("#registro").height();
  var width = $("#registro").width();
  var Registri = OpenSeadragon({
    id:"registro",
    prefixUrl:"openseadragon/images/",
    sequenceMode: true,
    showReferenceStrip: true,
    referenceStripScroll: 'vertical',
    toolbar:"toolbarDiv",
    tileSources: [
      <?php
        if ($tipoRegistro=="battesimo"){
          $qImmBattesimo = "SELECT Pagina FROM battesimoimg WHERE Cartella='$numeroRegistro' ORDER BY Pagina ASC";
          $qImmBattesimoE = mysqli_query($conn,$qImmBattesimo);
          $contaImmBattesimo = mysqli_num_rows($qImmBattesimoE);
          while($ImmBattesimo = mysqli_fetch_array($qImmBattesimoE)){
            if (file_exists("imgRegistri/battesimi/$numeroRegistro/$ImmBattesimo[0].JPG")){
              list($width, $height) = getimagesize("imgRegistri/battesimi/$numeroRegistro/$ImmBattesimo[0].JPG");
              echo(
                "{".
                  "type: 'legacy-image-pyramid',".
                  "levels:[{".
                    "url:'imgRegistri/battesimi/$numeroRegistro/$ImmBattesimo[0].JPG',".
                    "height:$height,".
                    "width:$width".
                  "}]".
                "},"
              );
            }else{
              echo("{url:'imgRegistri/battesimi/$numeroRegistro/$ImmBattesimo[0].JPG'},");
            }
          }
        }elseif($tipoRegistro=="matrimonio"){
          $qImmMatrimonio = "SELECT Pagina FROM matrimonioimg WHERE Cartella='$numeroRegistro' ORDER BY Pagina ASC";
          $qImmMatrimonioE = mysqli_query($conn,$qImmMatrimonio);
          $contaImmMatrimonio = mysqli_num_rows($qImmMatrimonioE);
          while($ImmMatrimonio = mysqli_fetch_array($qImmMatrimonioE)){
            if (file_exists("imgRegistri/matrimoni/$numeroRegistro/$ImmMatrimonio[0].JPG")){
              list($width, $height) = getimagesize("imgRegistri/matrimoni/$numeroRegistro/$ImmMatrimonio[0].JPG");
              echo(
                "{".
                  "type: 'legacy-image-pyramid',".
                  "levels:[{".
                    "url:'imgRegistri/matrimoni/$numeroRegistro/$ImmMatrimonio[0].JPG',".
                    "height:$height,".
                    "width:$width".
                  "}]".
                "},"
              );
            }else{
              echo("{url:'imgRegistri/matrimoni/$numeroRegistro/$ImmMatrimonio[0].JPG'},");
            }
          }
        }else{
          $qImmMorte = "SELECT Pagina FROM morteimg WHERE Cartella='$numeroRegistro' ORDER BY Pagina ASC";
          $qImmMorteE = mysqli_query($conn,$qImmMorte);
          $contaImmMorte = mysqli_num_rows($qImmMorteE);
          while($ImmMorte = mysqli_fetch_array($qImmMorteE)){
            if (file_exists("imgRegistri/morti/$numeroRegistro/$ImmMorte[0].JPG")){
              list($width, $height) = getimagesize("imgRegistri/morti/$numeroRegistro/$ImmMorte[0].JPG");
              echo(
                "{".
                  "type: 'legacy-image-pyramid',".
                  "levels:[{".
                    "url:'imgRegistri/morti/$numeroRegistro/$ImmMorte[0].JPG',".
                    "height:$height,".
                    "width:$width".
                  "}]".
                "},"
              );
            }else{
              echo("{url:'imgRegistri/morti/$numeroRegistro/$ImmMorte[0].JPG'},");
            }
          }
        }
      ?>
    ],
    visibilityRatio: 1.0,
    constrainDuringPan: true,
    maxZoomPixelRatio:10
  });
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
