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
  <main>
    <!-- MENU DI NAVIGAZIONE -->
    <?php include 'menuNavigazione.php' ?>
    <?php include 'menuRicerca.php' ?>
    <!-- menu di navigazione -->
    <!-- REGISTRAZIONE E ACCESSO -->
    <?php include 'sign.php' ?>
    <!-- registrazione e accesso -->
    <!-- MESSAGGIO CROWDSOURCING -->
    <?php include 'crowdMessaggio.php' ?>
    <!-- messaggio crowdsourcing -->
    <!-- CONTAINER INFORMAZIONI PERSONA -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mb-5">
          <!-- ANAGRAFICA -->
          <h2 class="font-weight-bold blue-grey-text">Anagrafica</h2>
          <br>
          <?php
            $IDpersona=$_GET['ID'];
            $registropart=$_GET['registropart'];
            if (isset($_GET['genere'])){
              $genere=$_GET['genere'];
            }else{
              $genere="";
            }
            if (isset($_GET['cognome'])){
              $cognome=$_GET['cognome'];
            }

            $arrayAnni=[];
            if ($registropart=="battesimo"){
              $qPersona = "SELECT Anno,Cognome,Nome,Sesso,NomePadre,CognomeMadre,NomeMadre,TrascrizioneImmagine FROM $registropart WHERE Anno<1900 AND IDBattesimo='$IDpersona'";
              $qPersonaE = mysqli_query($conn,$qPersona);
            }else{
              $qPersona = "SELECT Anno,Cognome,Nome,Sesso,NomePadre,CognomeMadre,NomeMadre,TrascrizioneImmagine FROM $registropart WHERE Anno<1900 AND IDMorte='$IDpersona'";
              $qPersonaE = mysqli_query($conn,$qPersona);
            }
            while($Persona = mysqli_fetch_array($qPersonaE)){
              if ($registropart=="battesimo"){
                echo ("<span class='font-weight-bold'>Anno di nascita:</span> $Persona[0]<br>");
              }else{
                echo ("<span class='font-weight-bold'>Anno di morte:</span> $Persona[0]<br>");
              }
              $arrayImmagini["'".$Persona[7]."'"]=[$Persona[0],substr("$Persona[7]",0,7)];
              $cognome=$Persona[1];
              $genere=$Persona[3];
          ?>
          <span class="font-weight-bold">Nome:</span>
          <?php
          if ($Persona[2]=="manca"){
            echo ("Il nome non è presente");
          }else{
            echo $Persona[2];
          }
          ?><br>
          <span class="font-weight-bold">Cognome:</span> <?php echo $Persona[1]; ?><br>
          <span class="font-weight-bold">Sesso:</span> <?php echo $Persona[3]; ?><br>
          <span class="font-weight-bold">Padre:</span>
          <?php
            if ($Persona[4]=="manca"){
              echo ("Il padre non è presente nel registro");
            }else{
              echo ($Persona[1]." ".$Persona[4]);
            }
          ?><br>
          <span class='font-weight-bold'>Madre:</span>
          <?php
          if ($Persona[5]<>"manca" || $Persona[6]<>"manca"){
            if ($Persona[5]=="manca" && $Persona[6]<>"manca"){
              echo ("(Il cognome manca) ".$Persona[6]);
            }elseif ($Persona[5]<>"manca" && $Persona[6]=="manca"){
              echo ($Persona[5]." (Il nome manca)");
            }else{
              echo($Persona[5]." ".$Persona[6]);
            }
          }else{
            echo("La madre non è presente nel registro");
          }
          ?><br>
          <?php
          if ($registropart=="battesimo"){
            $qIDMatrimonio = "SELECT IDMatrimonio,MatrimonioIncerto FROM battesimomorte WHERE IDBattesimo='$IDpersona'";
            $qIDMatrimonioE = mysqli_query($conn,$qIDMatrimonio);
            $IDMatrimonio = mysqli_fetch_array($qIDMatrimonioE);
            if ($IDMatrimonio){
              if ($IDMatrimonio[1]=="Si"){
                if (strpos($IDMatrimonio[0],",")!==false){
                  $explode = explode(",",$IDMatrimonio[0]);
                  $array=[];
                  foreach ($explode as $exp){
                    $array[]="'".$exp."'";
                  }
                  $implode=implode(",",$array);
                  $implode=preg_replace("/\s+/i","",$implode);
                  echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile Coniuge:</u></a></span><br> ");
                  if ($genere=="M"){
                    $qSposa = "SELECT CognomeSposa,NomeSposa,Anno,TrascrizioneImmagine FROM matrimonio WHERE IDMatrimonio IN ($implode)";
                    $qSposaE = mysqli_query($conn,$qSposa);
                    $contaSposaE = mysqli_num_rows($qSposaE);
             
                    while($Sposa = mysqli_fetch_array($qSposaE)){
                      if ($Sposa[2]<1900){
                        if ($Sposa[0]=="manca"){
                          echo("<li>(Il cognome manca) $Sposa[1], atto di matrimonio del $Sposa[2]</li>");
                        }elseif ($Sposa[1]=="manca"){
                          echo("<li>$Sposa[0] (Il nome manca), atto di matrimonio del $Sposa[2]</li>");
                        }else{
                          echo("<li>$Sposa[0] $Sposa[1], atto di matrimonio del $Sposa[2]</li>");
                        }
                        $arrayImmagini["'".$Sposa[3]."'"]=[$Sposa[2],substr("$Sposa[3]",0,7)];
                        echo("<br>");
                      }else{
                        echo("<li>Dati del '900</li>");
                        echo("<br>");
                      }
                    }

                  }else{
                    $qSposo = "SELECT CognomeSposo,NomeSposo,Anno,TrascrizioneImmagine FROM matrimonio WHERE IDMatrimonio IN ($implode)";
                    $qSposoE = mysqli_query($conn,$qSposo);
                    $contaSposoE = mysqli_num_rows($qSposoE);
                    
                    while($Sposo = mysqli_fetch_array($qSposoE)){
                      if ($Sposo[2]<1900){
                        if ($Sposo[0]=="manca"){
                          echo("<li>(Il cognome manca) $Sposo[1], atto di matrimonio del $Sposo[2]</li>");
                        }elseif ($Sposo[1]=="manca"){
                          echo("<li>$Sposo[0] (Il nome manca), atto di matrimonio del $Sposo[2]</li>");
                        }else{
                          echo("<li>$Sposo[0] $Sposo[1], atto di matrimonio del $Sposo[2]</li>");
                        }
                        $arrayImmagini["'".$Sposo[3]."'"]=[$Sposo[2],substr("$Sposo[3]",0,7)];
                      }else{
                        echo("Dati del '900");
                        echo("<br>");
                      }
                      echo("<br>");
                    }
                  }
                }elseif ($IDMatrimonio[0]<>""){
                  if($genere=="M"){
                    $qSposa = "SELECT CognomeSposa,NomeSposa,Anno,TrascrizioneImmagine FROM matrimonio WHERE IDMatrimonio='$IDMatrimonio[0]'";
                    $qSposaE = mysqli_query($conn,$qSposa);
                    $Sposa = mysqli_fetch_array($qSposaE);
                    if ($Sposa[2]<1900){
                      echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile coniuge:</u></a></span> ");
                      if ($Sposa[0]=="manca"){
                        echo("<li>(Il cognome manca) $Sposa[1], atto di matrimonio del $Sposa[2]</li>");
                      }elseif ($Sposa[1]=="manca"){
                        echo("<li>$Sposa[0] (Il nome manca), atto di matrimonio del $Sposa[2]</li>");
                      }else{
                        echo("<li>$Sposa[0] $Sposa[1], atto di matrimonio del $Sposa[2]</li>");
                      }
                      $arrayImmagini["'".$Sposa[3]."'"]=[$Sposa[2],substr("$Sposa[3]",0,7)];
                      echo("<br>");
                    }else{
                      echo("Dati del '900");
                      echo("<br>");
                    }
                  }else{
                    $qSposo = "SELECT CognomeSposo,NomeSposo,Anno,TrascrizioneImmagine FROM matrimonio WHERE Anno<1900 AND IDMatrimonio='$IDMatrimonio[0]'";
                    $qSposoE = mysqli_query($conn,$qSposo);
                    $Sposo = mysqli_fetch_array($qSposoE);
                    if ($Sposo[2]<1900){
                      echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile coniuge:</u></a></span> ");
                      if ($Sposo[0]=="manca"){
                        echo("<li>(Il cognome manca) $Sposo[1], atto di matrimonio del $Sposo[2]</li>");
                      }elseif ($Sposo[1]=="manca"){
                        echo("<li>$Sposo[0] (Il nome manca), atto di matrimonio del $Sposo[2]</li>");
                      }else{
                        echo("<li>$Sposo[0] $Sposo[1], atto di matrimonio del $Sposo[2]</li>");
                      }
                      $arrayImmagini["'".$Sposo[3]."'"]=[$Sposo[2],substr("$Sposo[3]",0,7)];
                      echo("<br>");
                    }else{
                      echo("Dati del '900");
                      echo("<br>");
                    }
                  }
                }
              }elseif($IDMatrimonio[1]=="No"){
                if($genere=="M"){
                  $qSposa = "SELECT CognomeSposa,NomeSposa,Anno,TrascrizioneImmagine FROM matrimonio WHERE IDMatrimonio='$IDMatrimonio[0]'";
                  $qSposaE = mysqli_query($conn,$qSposa);
                  $Sposa = mysqli_fetch_array($qSposaE);
                  echo("<span class='font-weight-bold'>Coniuge:</span> ");
                  if ($Sposa[2]<1900){
                    if ($Sposa[0]=="manca"){
                      echo("(Il cognome manca) $Sposa[1], atto di matrimonio del $Sposa[2]");
                    }elseif ($Sposa[1]=="manca"){
                      echo("$Sposa[0] (Il nome manca), atto di matrimonio del $Sposa[2]");
                    }else{
                      echo("$Sposa[0] $Sposa[1], atto di matrimonio del $Sposa[2]");
                    }
                    $arrayImmagini["'".$Sposa[3]."'"]=[$Sposa[2],substr("$Sposa[3]",0,7)];
                    echo("<br>");
                  }else{
                    echo("Dati del '900");
                    echo("<br>");
                  }
                }else{
                  if ($Sposo[2]<1900){
                    $qSposo = "SELECT CognomeSposo,NomeSposo,Anno,TrascrizioneImmagine FROM matrimonio WHERE Anno<1900 AND IDMatrimonio='$IDMatrimonio[0]'";
                    $qSposoE = mysqli_query($conn,$qSposo);
                    $Sposo = mysqli_fetch_array($qSposoE);
                    echo("<span class='font-weight-bold'>Coniuge:</span> ");
                    if ($Sposo[0]=="manca"){
                      echo("(Il cognome manca) $Sposo[1], atto di matrimonio del $Sposo[2]");
                    }elseif ($Sposo[1]=="manca"){
                      echo("$Sposo[0] (Il nome manca), atto di matrimonio del $Sposo[2]");
                    }else{
                      echo("$Sposo[0] $Sposo[1], atto di matrimonio del $Sposo[2]");
                    }
                    $arrayImmagini["'".$Sposo[3]."'"]=[$Sposo[2],substr("$Sposo[3]",0,7)];
                    echo("<br>");
                  }else{
                    echo("Dati del '900");
                    echo("<br>");
                  }
                }
              }else{
                echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile coniuge:</u></a></span> ");
                echo("Nessuna corrispondenza trovata");
                echo("<br>");
              }
            }
          }else{?>
            <span class='font-weight-bold'>Coniuge:</span>
            vedi in <a href="ricercaPersone.php?registropart=battesimo">Ricerca per persona a partire dai battesimi</a><br>
          <?php
          }
          if ($registropart=="morte"){
            $qNascita = "SELECT IDBattesimo,BattesimoIncerto FROM mortebattesimo WHERE IDMorte='$IDpersona'";
            $qNascitaE = mysqli_query($conn,$qNascita);
            $Nascita = mysqli_fetch_array($qNascitaE);
            $qEtaMorte = "SELECT EtaMorte,Anno FROM morte WHERE IDMorte='$IDpersona'";
            $qEtaMorteE = mysqli_query($conn,$qEtaMorte);
            $EtaMorte = mysqli_fetch_array($qEtaMorteE);
            if ($Nascita){
              if($Nascita[1]=="Si"){
                  if (strpos($Nascita[0],",")!==false){
                    $explode = explode(",",$Nascita[0]);
                    $array=[];
                    foreach ($explode as $exp){
                      $array[]="'".$exp."'";
                    }
                    $implode=implode(",",$array);
                    $implode=preg_replace("/\s+/i","",$implode);
                    echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di nascita:</u></a></span><br> ");
                    $qAnno = "SELECT Anno,TrascrizioneImmagine FROM battesimo WHERE Anno<1900 AND IDBattesimo IN ($implode)";
                    $qAnnoE = mysqli_query($conn,$qAnno);
                    while($Anno = mysqli_fetch_array($qAnnoE)){
                      if ($EtaMorte[0]=="manca" || $EtaMorte[0]=="0*"){
                        $Eta=$EtaMorte[1]-$Anno[0];
                        echo("<li>$Anno[0] ($Eta anni)</li>");
                        $arrayImmagini["'".$Anno[1]."'"]=[$Anno[0],substr("$Anno[1]",0,7)];
                      }else{
                        echo("<li>$Anno[0] ($EtaMorte[0] anni)</li>");
                      }
                    }
                    echo("<br>");
                  }elseif ($Nascita[0]<>""){
                    $qAnno = "SELECT Anno,TrascrizioneImmagine FROM battesimo WHERE Anno<1900 AND IDBattesimo='$Nascita[0]'";
                    $qAnnoE = mysqli_query($conn,$qAnno);
                    $Anno = mysqli_fetch_array($qAnnoE);
                    echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di nascita:</u></a></span> ");
                    if ($EtaMorte[0]=="manca" || $EtaMorte[0]=="0*"){
                      $Eta=$EtaMorte[1]-$Anno[0];
                      echo("<li>$Anno[0] ($Eta anni)</li>");
                    }else{
                      echo("<li>$Anno[0] ($EtaMorte[0] anni)</li>");
                    }
                    $arrayImmagini["'".$Anno[1]."'"]=[$Anno[0],substr("$Anno[1]",0,7)];
                    echo("<br>");
                  }
              }elseif($Nascita[1]=="No"){
                $qAnno = "SELECT Anno,TrascrizioneImmagine FROM battesimo WHERE Anno<1900 AND IDBattesimo='$Nascita[0]'";
                $qAnnoE = mysqli_query($conn,$qAnno);
                $Anno = mysqli_fetch_array($qAnnoE);
                echo("<span class='font-weight-bold'>Anno di nascita:</span> ");
                if ($EtaMorte[0]=="manca" || $EtaMorte[0]=="0*"){
                  $Eta=$EtaMorte[1]-$Anno[0];
                  echo("$Anno[0] ($Eta anni)");
                }else{
                  echo("$Anno[0] ($EtaMorte[0] anni)");
                }
                $arrayImmagini["'".$Anno[1]."'"]=[$Anno[0],substr("$Anno[1]",0,7)];
                echo("<br>");
              }else{
                echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di nascita:</u></a></span> ");
                echo("Nessuna corrispondenza trovata");
              }
            }
          }else{
            $qIDMorte = "SELECT IDMorte,MorteIncerto FROM battesimomorte WHERE IDBattesimo='$IDpersona'";
            $qIDMorteE = mysqli_query($conn,$qIDMorte);
            $IDMorte = mysqli_fetch_array($qIDMorteE);
            if ($IDMorte){
              if($IDMorte[1]=="Si"){
                if (strpos($IDMorte[0],",")!==false){
                  $explode = explode(",",$IDMorte[0]);
                  $array=[];
                  foreach ($explode as $exp){
                    $array[]="'".$exp."'";
                  }
                  $implode=implode(",",$array);
                  $implode=preg_replace("/\s+/i","",$implode);
                  echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di morte:</u></a></span><br> ");
                  $qMorte = "SELECT Anno,EtaMorte,TrascrizioneImmagine FROM morte WHERE IDMorte IN ($implode)";
                  $qMorteE = mysqli_query($conn,$qMorte);
                  while($Morte = mysqli_fetch_array($qMorteE)){
                    if ($Morte[0]<1900){
                      if ($Morte[1]=="manca" || $Morte[1]=="0*" ){
                        $qAnnoNascita = "SELECT Anno FROM battesimo WHERE Anno<1900 AND IDBattesimo = '$IDpersona'";
                        $qAnnoNascitaE = mysqli_query($conn,$qAnnoNascita);
                        $AnnoNascita = mysqli_fetch_array($qAnnoNascitaE);
                        $EtaMorte=$Morte[0]-$AnnoNascita[0];
                        echo("<li>$Morte[0] ($EtaMorte anni)</li>");
                      }else{
                        echo("<li>$Morte[0] ($Morte[1] anni)</li>");
                      }
                      $arrayImmagini["'".$Morte[2]."'"]=[$Morte[0],substr("$Morte[2]",0,7)];
                    }else{
                      echo("Dati del '900");
                      echo("<br>");
                    }
                  }
                  echo("<br>");
                }elseif ($IDMorte[0]<>""){
                  $qMorte = "SELECT Anno,EtaMorte,TrascrizioneImmagine FROM morte WHERE IDMorte='$IDMorte[0]'";
                  $qMorteE = mysqli_query($conn,$qMorte);
                  $Morte = mysqli_fetch_array($qMorteE);
                  echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di morte:</u></a></span> ");
                  if ($Morte[0]<1900){
                    if ($Morte[1]=="manca" || $Morte[1]=="0*" ){
                      $qAnnoNascita = "SELECT Anno FROM battesimo WHERE Anno<1900 AND IDBattesimo = '$IDpersona'";
                      $qAnnoNascitaE = mysqli_query($conn,$qAnnoNascita);
                      $AnnoNascita = mysqli_fetch_array($qAnnoNascitaE);
                      $EtaMorte=$Morte[0]-$AnnoNascita[0];
                      echo("<li>$Morte[0] ($EtaMorte anni)</li>");
                    }else{
                      echo("<li>$Morte[0] ($Morte[1] anni)</li>");
                    }
                    $arrayImmagini["'".$Morte[2]."'"]=[$Morte[0],substr("$Morte[2]",0,7)];
                    echo("<br>");
                  }else{
                    echo("Dati del '900");
                    echo("<br>");
                  }
                }
              }elseif($IDMorte[1]=="No"){
                $qMorte = "SELECT Anno,EtaMorte,TrascrizioneImmagine FROM morte WHERE IDMorte='$IDMorte[0]'";
                $qMorteE = mysqli_query($conn,$qMorte);
                $Morte = mysqli_fetch_array($qMorteE);
                echo("<span class='font-weight-bold'>Anno di morte:</span> ");
                if ($Morte[0]<1900){
                  if ($Morte[1]=="manca" || $Morte[1]=="0*" ){
                    $qAnnoNascita = "SELECT Anno FROM battesimo WHERE Anno<1900 AND IDBattesimo = '$IDpersona'";
                    $qAnnoNascitaE = mysqli_query($conn,$qAnnoNascita);
                    $AnnoNascita = mysqli_fetch_array($qAnnoNascitaE);
                    $EtaMorte=$Morte[0]-$AnnoNascita[0];
                    echo("$Morte[0] ($EtaMorte anni)");
                  }else{
                    echo("$Morte[0] ($Morte[1] anni)");
                  }
                  $arrayImmagini["'".$Morte[2]."'"]=[$Morte[0],substr("$Morte[2]",0,7)];
                  echo("<br>");
                }else{
                  echo("Dati del '900");
                  echo("<br>");
                }
              }else{
                //ALTRE INFORMAZIONI
                $qInfo = "SELECT Informazioni FROM infopersona WHERE IdPersona='$IDpersona'";
                $qInfoE = mysqli_query($conn,$qInfo);
                $countInfo = mysqli_num_rows($qInfoE);
                if ($countInfo > 0){
                  echo "<br>";
                  echo("<span class='font-weight-bold'>Altre informazioni</span> <br>");
                  $Info = mysqli_fetch_array($qInfoE);
                  echo $Info[0];
                }
                echo("<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Possibile anno di morte:</u></a></span> ");
                echo("Nessuna corrispondenza trovata");
              }
            }
          }
          echo "<br>";
          echo "<span class='deep-orange-text font-weight-bold'><a data-toggle='modal' data-target='#crowdMessaggio'><u>Suggerisci altre informazioni relative a questo atto</u></a></span>";
        }
        ?>
        </div>
        <!-- anagrafica -->
        <!-- IMMAGINI ATTI -->
        <?php
          foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
            $Immagine=str_replace("'","",$Immagine);
        ?>
        <div class="col-md-6">
          <div class="row">
            <div class="col">
              <div id="<?php echo $Immagine; ?>" class="card mt-2 mb-2" style="height:300px;">
              </div>
              <figcaption class="text-right">
              <p>Atto di
              <?php
              if (preg_match("/^BT/",$Immagine)){
                echo "battesimo";
              }elseif(preg_match("/^MT/",$Immagine)){
                echo "matrimonio";
              }else{
                echo "morte";
              }
              ?>
              del <?php echo $ImmAnno; ?>
              </p>
              </figcaption>
            </div>
          </div>
        </div>
        <!-- immagini atti -->
      <?php
      }
      ?>

      <div class="col-md-12">
        <hr>
          <h4 class="font-weight-bold blue-grey-text mb-5">Immagini dei registri</h4>
          <?php
            $arrayNumRegistro=[];
            $conta=0;
            foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
              $Immagine=str_replace("'","",$Immagine);
              $conta=$conta+1;
          ?>
          <div id="<?php echo $ImmRegistro; ?>" class="card mt-2 mb-2" style="height:500px;">
          </div>
          <figcaption class="text-right">
          <p>Registro di
          <?php
          if (preg_match("/^BT/",$ImmRegistro)){
            $indImmagine="battesimoimg";
            $indRegistro="battesimi";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "battesimo";
          }elseif(preg_match("/^MT/",$ImmRegistro)){
            $indImmagine="matrimonioimg";
            $indRegistro="matrimoni";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "matrimonio";
          }else{
            $indImmagine="morteimg";
            $indRegistro="morti";
            $arrayNumRegistro["'".$conta."'"]=[$indImmagine,$indRegistro];
            echo "morte";
          }
          ?>
          (atto del <?php echo $ImmAnno; ?>)
          </p>
          <?php
          }
          ?>
      </div>
    </div>
    <!-- container informazioni persona -->
  </main>
  <!-- FOOTER -->
  <footer class="page-footer font-small unique-color">
    <div class="footer-copyright text-center py-3">
      Registri parrocchiali di Monterosso 2021
    </div>
  </footer>
  <!-- footer -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
<script src="openseadragon/openseadragon.min.js"></script>
<script src="js/sign.js"></script>
<script type="text/javascript">
  <?php
    $conta1=0;
    foreach ($arrayImmagini as $Immagine=>[$ImmAnno,$ImmRegistro]){
      $conta1=$conta1+1;
      $Immagine=str_replace("'","",$Immagine);
   ?>
    var <?php echo $Immagine; ?> = OpenSeadragon({
      id:"<?php echo $Immagine; ?>",
      prefixUrl:"openseadragon/images/",
      tileSources: {
        type: "image",
        url: "imgAtti/<?php echo $cognome; ?>/<?php echo $Immagine; ?>.jpg",
        buildPyramid: false
      },
      visibilityRatio: 1.0,
      constrainDuringPan: true,
      maxZoomPixelRatio:10
    });
    <?php
    $var=str_replace("'","",$arrayNumRegistro["'".$conta1."'"][0]);
    $qNumRegistro = "SELECT Cartella FROM $var WHERE Pagina='$ImmRegistro'";
    $qNumRegistroE = mysqli_query($conn,$qNumRegistro);
    $contaNumRegistro = mysqli_num_rows($qNumRegistroE);
    if ($contaNumRegistro>0){
      $numRegistro = mysqli_fetch_array($qNumRegistroE);
    }
    ?>

    var <?php echo $ImmRegistro; ?> = OpenSeadragon({
      id:"<?php echo $ImmRegistro; ?>",
      prefixUrl:"openseadragon/images/",
      tileSources: {
        type: "image",
        url: "imgRegistri/<?php echo $arrayNumRegistro["'".$conta1."'"][1]; ?>/<?php echo $numRegistro[0]; ?>/<?php echo $ImmRegistro; ?>.JPG",
        buildPyramid: false
      },
      visibilityRatio: 1.0,
      constrainDuringPan: true,
      maxZoomPixelRatio:10
    });
  <?php
  }
   ?>
   $("#crowMessaggioInvia").click(function(e){
     e.preventDefault();
       var messaggio=$("#messaggio").val();
       var IDPersona="<?php echo $IDpersona; ?>";
       if (messaggio!=""){
         $.ajax({
           type:'POST',
           url:'invioMessaggio.php',
           data:{
             messaggio:messaggio,
             IDPersona:IDPersona
           },
           dataType:"html",
           success:function(risposta){
             if (risposta==0){
               $("#messaggioInviato").html("Messaggio inviato");
               $("#messaggio").val("");
             }else{
               console.log(risposta);
             }
           }
         });
       }else{
         console.log();
       }
     });
     $("#crowdMessaggio").on("hidden.bs.modal", function () {
       $("#messaggioInviato").html("");
    });
</script>
</body>
</html>
<?php
  //chiudo la connessione
  mysqli_close($conn);
?>
