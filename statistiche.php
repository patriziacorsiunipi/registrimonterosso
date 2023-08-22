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
    <!-- CONTENUTO -->
    <div class="container mt-5">
      <div class="mb-5">
        <h1 class="font-weight-bold blue-grey-text">Statistiche sui dati</h1>
        Le sezioni successive trattano di studi statistici e storici basati sui dati estratti dai registri parrocchiali di Monterosso.
        <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title font-weight-bold blue-grey-text">Dati sui registri (CSV)</h5>
            <p class="card-text">
              I dati presenti in questi file possono essere usati <b>solo a fini statistici</b>. <br><br>
              <a href="file/Battesimo.csv">Battesimo</a><br>
              <a href="file/Matrimonio.csv">Matrimono</a><br>
              <a href="file/Morte.csv">Morte</a>
            </p>
          </div>
        </div>
      </div>
      <hr>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-12">
          <h3 class="font-weight-bold blue-grey-text">Natalità e mortalità</h3>
          <a style="font-size:16px;font-weight:normal;" href="file/registriMonterossoDati.pdf" target="_blank">Tabelle dei dati sulla natalità e la mortalità (PDF)</a><br><br>
          I dati sulla natalità e la mortalità sono stati estratti dai registri, rispettivamente, di battesimo e di morte. Questi dati sono
          stati messi in relazione tra di loro per analizzare i <b>movimenti della popolazione</b> nel periodo preso in esame.<br>
          Il grafico seguente (<i>Figura 1</i>) rappresenta la <b>quantità di nati e di morti registrati per decennio</b> andando dal 1580 al 1984. Dal 1580 al 1600
          la colonna sulle morti non è presente perché non ci sono ancora registrazioni di morte. Allo stesso modo, dal 1970 in poi non è presente la
          colonna dei nati perché non ci sono i dati sui battesimi.
        </div>
      </div>
      <div class="row text-justify d-flex justify-content-center mt-1 mb-5" >
        <div class="col-md-10">
          <div id="grafico1" class="card mt-0 mb-4" style="height:400px;">
          </div>
          <figcaption class="text-right"><b>Figura 1:</b> <i>Quantità di nati e di morti per decennio</i></figcaption>
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-12">
        Dal grafico è possbile osservare che la quantità di nati è generalmente superiore a quella delle morti. Questa tendenza si inverte in pochi
        casi: il più evidente è tra il 1940 e il 1950. La causa, in questo caso, potrebbe essere la Seconda Guerra Mondiale. Dalla seconda metà
        del XIX secolo si registra una crescita consistente delle nascite, fenomeno, questo, che si osserva anche nel resto d'Europa in quegli anni.
        Dal 1900 in poi, invece, le nascite iniziano a calare probabilmente, appunto, a causa delle guerre che hanno caratterizzato il
        XX secolo.
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-6">
        L'età media di morte è stata calcolata a partire dal 1700 a causa delle numerose lacune nelle annotazioni dell'età di morte.
        Il grafico in <i>Figura 2</i> rappresenta l'<b>età media di morte per decennio</b>: sull'asse delle ascisse si trovano i decenni che
        scandiscono i secoli dal VI al XX, mentre sull'asse delle ordinate si trovano le età.<br>
        Durante la prima metà dell'800 l'età media di morte si abbassa addirittura sotto i trent'anni per poi crescere costantemente e varcare
        la soglia dei settanta nella seconda metà del '900 grazie, chiaramente, al progresso in campo medico e ai cambiamenti sociali.
        </div>
        <div class="col-md-6">
          <div id="grafico2" class="card mt-0 mb-4" style="height:330px;">
          </div>
          <figcaption class="text-right"><b>Figura 2:</b> <i>Età media di morte per decennio</i></figcaption>
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-12">
          Andando ancora più nel dettaglio, è possibile osservare come è strutturata l’età media attraverso la <b>quantificazione
          dei morti per fascia d’età</b> in ogni decennio (<i>Figura 3</i>). Ogni colonna rappresenta la quantità di morti della fascia
          d'età indicata in legenda con lo stesso colore.
        </div>
      </div>
      <div class="row text-justify d-flex justify-content-center mt-1 mb-5" >
        <div class="col-md-10">
          <div id="grafico3" class="card mt-0 mb-4" style="height:450px;">
          </div>
          <figcaption class="text-right"><b>Figura 3:</b> <i>Quantità di morti per decennio e fascia d'età</i></figcaption>
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-12">
        Il dato più evidente è che il tasso di mortalità giovanile è di gran lunga il più alto rispetto alle fascie d'età che vanno dai venticinque
        anni in poi, questo almeno fino ai primi decenni del '900. La quantità di morti nella fascia d'età 0-25 diminuisce progressivamente
        dal 1900 in poi andando quasi ad azzerarsi a partire dagli anni 70.
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-6">
          <div id="grafico4" class="card mt-0 mb-4" style="height:300px;">
          </div>
          <figcaption class="text-right"><b>Figura 4:</b> <i>Quantità di morti tra 0 e 16 anni</i></figcaption>
        </div>
        <div class="col-md-6">
          Se si approfondisce ancora la quantità di morti registrati per fascia d'età ponendo l'attenzione, in particolare, sulla <b>fascia 0-16</b> (<i>Figura 4</i>)
          notiamo che i primi sette anni di vita per una persona erano i più "rischiosi", questo almeno fino al 1900. La mortalità infantile (primo anno di vita),
          in particolare, rappresenta una grossa percentuale sul totale.<br>
          Infine, è interessante analizzare anche il dato sulla mortalità facendo distizione tra uomini e donne. Nel grafico in <i>Figura 5</i>
          sull'asse delle ascisse sono presenti le fascie d'età e sulle ordinate le quantità. Per fascia d'età notiamo come in generale i dati
          non sono molto diversi tra loro tranne per quel che riguarda il primo anno di vita e la fascia 25-50.
        </div>
      </div>
      <div class="row text-justify mt-1 mb-5">
        <div class="col-md-6">
          Per il primo anno d'età non ci sono ragioni per cui siano morti più bambini di sesso maschile chiaramente. Per quanto riguarda invece
          la fascia 25-50 possiamo ipotizzare che la quantità di decessi femminili superiore sia dovuta alla morte a causa del parto, infatti tale
          fascia rappresenta l'età fertile della donna.
          </table>
        </div>
        <div class="col-md-6">
          <div id="grafico5" class="card mt-0 mb-4" style="height:350px;">
          </div>
          <figcaption class="text-right"><b>Figura 5:</b> <i>Quantità di morti per fascia d'età (uomini e donne)</i></figcaption>
        </div>
      </div>
      <hr>
      <div class="row mt-5">
        <div class="col-md-12 text-justify">
          <h3 class="font-weight-bold blue-grey-text">Distribuzione dei cognomi</h3>
          <a style="font-size:16px;font-weight:normal;" href="file/Cognomi.pdf" target="_blank">Cognomi nei registri di Monterosso (PDF)</a><br><br>
          La distribuzione dei cognomi di una località costituisce un elemento interessante per individuare le famiglie autoctone e quelle che probabilmente
          sono "immigrate". Nel caso di Monterosso sono stati individuati i cognomi presenti all'interno dei registri e contate le occorrenze di quel
          cognome all'interno, appunto, dello stesso registro. <br><br>
          La quantità di cognomi diversi all’interno di ogni registro è la seguente:
          <ul>
            <li>Battesimo: 621 (di cui 331 compaiono solo una volta)</li>
            <li>Matrimonio</li>
            <ol>
              <li>Sposo: 480 (di cui 319 compaiono solo una volta)</li>
              <li>Sposa: 247 (di cui 121 compaiono solo una volta)</li>
            </ol>
            <li>Morte: 630 (di cui 392 compaiono solo una volta)</li>
          </ul>
          <br>
          Di seguito vengono riportati i <b>10 cognomi più frequenti per registro</b> che rappresentano da soli una percentuale piuttosto consistente
          sul totale dei cognomi all'interno dei registri.
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 text-justify mb-5">
          <img class="img-fluid" alt="Cognomi nei registri di battesimo" src="img/cognBt.png">
          <figcaption><i>Dieci cognomi più frequenti nei registri di battesimo</i></figcaption>
        </div>
        <div class="col-md-12 text-justify mb-5">
          <img class="img-fluid" alt="Cognomi nei registri di morte" src="img/cognMr.png">
          <figcaption><i>Dieci cognomi più frequenti nei registri di morte</i></figcaption>
        </div>
        <div class="col-md-12 text-justify mb-5">
          <img class="img-fluid" alt="Cognomi nei registri di matrimonio (sposo)" src="img/cognSo.png">
          <figcaption><i>Dieci cognomi più frequenti nei registri di matrimonio (sposo)</i></figcaption>
        </div>
        <div class="col-md-12 text-justify mb-5">
          <img class="img-fluid" alt="Cognomi nei registri di matrimonio (sposa)" src="img/cognSa.png">
          <figcaption><i>Dieci cognomi più frequenti nei registri di matrimonio (sposa)</i></figcaption>
        </div>
      </div>
    </div>
    <!-- contenuto -->
  </main>
  <!-- FOOTER -->
  <?php include 'footer.php' ?>
  <!-- footer -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="js/chart.js"></script>
<script src="openseadragon/openseadragon.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
$(".nav-iten").css("border-bottom","");
$(".dati").css("border-bottom","solid white 4px");

var grafico1 = OpenSeadragon({
  id:"grafico1",
  prefixUrl:"openseadragon/images/",
  tileSources:{
    type:'image',
    url:'img/NatiMorti.png',
    buildPyramid: false
  },
  visibilityRatio: 1.0,
  constrainDuringPan: true
});
var grafico2 = OpenSeadragon({
  id:"grafico2",
  prefixUrl:"openseadragon/images/",
  tileSources:{
    type:'image',
    url:'img/etaMediaMorte.png',
    buildPyramid: false
  },
  visibilityRatio: 1.0,
  constrainDuringPan: true
});
var grafico3 = OpenSeadragon({
  id:"grafico3",
  prefixUrl:"openseadragon/images/",
  tileSources:{
    type:'image',
    url:'img/istogrammaFascie1.png',
    buildPyramid: false
  },
  visibilityRatio: 1.0,
  constrainDuringPan: true
});
var grafico4 = OpenSeadragon({
  id:"grafico4",
  prefixUrl:"openseadragon/images/",
  tileSources:{
    type:'image',
    url:'img/istogrammaFascie2.png',
    buildPyramid: false
  },
  visibilityRatio: 1.0,
  constrainDuringPan: true
});
var grafico5 = OpenSeadragon({
  id:"grafico5",
  prefixUrl:"openseadragon/images/",
  tileSources:{
    type:'image',
    url:'img/UominiDonne.png',
    buildPyramid: false
  },
  visibilityRatio: 1.0,
  constrainDuringPan: true
});

</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
