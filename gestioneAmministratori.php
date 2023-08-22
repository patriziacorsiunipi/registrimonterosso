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
    <?php include 'modalModificaAmministratore.php' ?>
    <!-- gestione utente -->
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- TITOLO E DESCRIZIONE -->
    <div class="container mt-5 mb-5">
      <h1 class="font-weight-bold blue-grey-text">Gestione amministratori</h1>
      <hr>
      <div class="d-flex justify-content-end mb-3">
        <button id="aggiungiAmministratore" class="btn btn-sm btn-light" data-toggle="modal" data-target="#modaggiungiAmministratore">Aggiungi amministratore</button>
      </div>
      <?php
        $qAmministratore = "SELECT * FROM amministratore";
        $qAmministratoreE = mysqli_query($conn,$qAmministratore);
        $contaAmministratore = mysqli_num_rows($qAmministratoreE);
        if ($contaAmministratore>0){
      ?>
      <div id="boxAlert"></div>
      <div class="table-responsive p-2">
        <table id='tabellaAmministratore' class='table compact hover'>
          <thead class='grey lighten-2'>
            <tr>
              <th data-field='IDAmministratore'>IDAmministratore</th>
              <th data-field='email'>Email</th>
              <th data-field='Nome'>Nome</th>
              <th data-field='Password'>Password</th>
              <th data-field='elimina'></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($Amministratori = mysqli_fetch_array($qAmministratoreE)){
            ?>
            <tr class='righeMessaggi'>
              <td><?php echo $Amministratori[0]; ?></td>
              <td><?php echo $Amministratori[1]; ?></td>
              <td><?php echo $Amministratori[2]; ?></td>
              <td><?php echo $Amministratori[3]; ?></td>
              <td id="<?php echo $Amministratori[0]; ?>" class="eliminaButton text-danger font-weight-bold"><a>Elimina</a></td>
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
      <!-- GESTIONE UTENTE -->
      <?php include 'modalAggiungiAmministratore.php' ?>
      <!-- gestione utente -->
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
$(document).ready(function(){
function strtrunc(str, max, add){
   add = add || '...';
   return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};
//IMPOSTAZIONI TABELLA DEGLI ATTI
var tabella = $("#tabellaAmministratore").DataTable({
  lengthMenu:[[15,30,50,-1],[15,30,50,"Tutti"]],
  ordering:false,
  searchHighlight: true,
  columnDefs: [
    {
     targets: [0],
     searchable:false,
    },
    {
     targets: [4],
     searchable:false,
   },
  ],
  language:{
    "sEmptyTable": "Nessun dato presente nella tabella",
    "sInfo": "Vista da _START_ a _END_ di _TOTAL_ amministratori",
    "sInfoEmpty": "Vista da 0 a 0 di 0 amministratori",
    "sInfoFiltered": "[filtrati da _MAX_ amministratori totali]",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Visualizza _MENU_ amministratori",
    "sLoadingRecords": "Caricamento...",
    "sProcessing": "Elaborazione...",
    "sSearch": "Cerca amministratore:",
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
$("#tabellaAmministratore tbody").on('click', 'tr .eliminaButton',function(e){
  e.preventDefault();
  e.stopPropagation();
  var id=$(this).attr("id");
  if (confirm("Vuoi davvero eliminare l'amministratore?")){
    $.ajax({
      url:"eliminaAmministratore.php",
      method:"POST",
      data:{id:id},
      success:function(risposta){
        $("#boxAlert").html("<div class='alert alert-success'>"+risposta+"</div>");
        location.reload();
      }
    });
  }
});
$("#aggiungiAmButton").click(function(){
  var nome=$("#nomeAgg").val();
  var email=$("#emailAgg").val();
  var password=$("#passwordAgg").val();
  if (nome.length!="" && email.length!="" && password.length!=""){
    $.ajax({
      type:'POST',
      url:'aggiungiAmministratore.php',
      data:{
        nome:nome,
        email:email,
        password:password
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErrore5").css("color","green");
          $("#messaggioErrore5").html("Amministratore inserito");
          location.reload();
        }else{
          $("#messaggioErrore5").html(risposta);
        }
      }
    });
    return false;
  }else{
    $("#messaggioErrore5").html("Tutti i campi sono obbligatori");
  }
});
$("#tabellaAmministratore tbody").on('click', 'tr',function(e){
  e.preventDefault();
  $(this).attr("aria-hidden","modal");
  $(this).attr("data-target","#modificaAmministratore");
  var dati=tabella.row( this ).data();
  var id=dati[0];
  var email=dati[1];
  var nome=dati[2];
  var password=dati[3];
  $(this).attr("data-toggle","modal");
  $(this).attr("data-target","#modificaAmministratore");
  $("#idMod").val(id);
  $("#emailMod").val(email);
  $("#nomeMod").val(nome);
  $("#passwordMod").val(password);
});
$("#passwordMod").keyup(function(){
  $(this).attr("id","passwordNuova");
});
$("#emailMod").keyup(function(){
  $(this).attr("id","emailNuova");
});
$("#nomeMod").keyup(function(){
  $(this).attr("id","nomeNuova");
});
$("#modificaAmButton").click(function(){
  var id=$("#idMod").val();
  var email=$("#emailMod").val();
  var emailNuova=$("#emailNuova").val();
  var nome=$("#nomeMod").val();
  var nomeNuova=$("#nomeNuova").val();
  var password=$("#passwordMod").val();
  var passwordNuova=$("#passwordNuova").val();
  if ((nome!="undefined" || nomeNuova!="undefined") && (email!="undefined" || emailNuova!="undefined") && (password!="undefined" || passwordNuova!="undefined") && id.length!=""){
    $.ajax({
      type:'POST',
      url:'modificaAmministratore.php',
      data:{
        id:id,
        nome:nome,
        nomeNuova:nomeNuova,
        email:email,
        emailNuova:emailNuova,
        password:password,
        passwordNuova:passwordNuova
      },
      dataType:"html",
      success:function(risposta){
        if (risposta=="false"){
          $("#messaggioErrore6").css("color","green");
          $("#messaggioErrore6").html("Aggiornamento eseguito");
          location.reload();
        }else{
          $("#messaggioErrore6").html(risposta);
        }
      }
    });
    return false;
  }else{
    $("#messaggioErrore6").html("Tutti i campi sono obbligatori");
  }
});
$("#modificaAmministratore").on("hidden.bs.modal", function () {
  $("#messaggioErrore6").html("");
});
$("#modaggiungiAmministratore").on("hidden.bs.modal", function () {
  $("#messaggioErrore5").html("");
});
});
</script>
</body>
</html>
<?php
  }
  //chiudo la connessione
  mysqli_close($conn);
?>
