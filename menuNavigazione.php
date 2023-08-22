<!-- MENU DI NAVIGAZIONE -->
<nav class="navbar navbar-expand-md navbar-dark unique-color justify-content-between">
  <a class="navbar-brand font-weight-bold" href="index.php">Registri Monterosso</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="basicExampleNav">
    <ul class="navbar-nav">
      <li class="nav-item pt-1">
        <a class="nav-link dati ml-2" href="statistiche.php">Dati e statistiche</a>
      </li>
      <li class="nav-item pt-1">
        <a class="nav-link descCod ml-2" href="descCodicologica.php">Descrizione dei registri</a>
      </li>
      <li class="nav-item pt-1">
        <a class="nav-link ricFamiglie ml-2" href="ricercheFamiglie.php">Ricerche sulle famiglie</a>
      </li>
      <li class="nav-item pt-1">
        <a class="nav-link crediti ml-2" href="crediti.php">Crediti</a>
      </li>
    </ul>
    <?php
    if(isset($_SESSION['loginUtente']) || isset($_SESSION['loginAmministratore'])){
      $nome=$_SESSION['nome'];
      if (isset($_SESSION['cognome'])){
        $cognome=$_SESSION['cognome'];
        $cognome = str_replace("\\","",$cognome);
      }
      $nome = str_replace("\\","",$nome);
    ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item pt-1">
        <span class="navbar-text font-weight-bold white-text">
          <?php
          echo "$nome ";
          if (isset($cognome)){
            echo $cognome;
          }
          ?>
        </span>
      </li>
      <?php
        if (isset($_SESSION['loginAmministratore'])){
      ?>
      <li class="nav-item pt-1">
        <a class="nav-link ml-2" href="gestione.php">Gestione</a>
      </li>
      <?php
        }
        if (isset($_SESSION['loginAmministratore'])){
       ?>
      <li class="nav-item pt-1">
        <a class="nav-link" href="logoutAmm.php">Logout</a>
      </li>
      </ul>
    <?php
      }else{ ?>
        <li class="nav-item pt-1">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
      <?php
      }
    }else{
    ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item pt-1">
        <a class="nav-link font-weight-bold" data-toggle="modal" data-target="#modalLoginForm">Accedi</a>
      </li>
    </ul>
    <?php
      }
    ?>
  </div>
</nav>
<!-- menu di navigazione -->
