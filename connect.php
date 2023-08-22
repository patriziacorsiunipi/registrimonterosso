<?php
//definisco le variabili sottostanti
$nome_server = 'localhost';
$nome_utente = 'c1registri';
$password = '9dR4!bmNU';
$dbase = 'c1registri';
//apro la connessione al server
$conn = mysqli_connect($nome_server, $nome_utente, $password, $dbase);
mysqli_set_charset($conn, "utf8");
if(!$conn) {
	die("Non riesco a connettermi: ".mysqli_connect_error());
}
//seleziono il database
mysqli_select_db($conn, $dbase)
	or die ("Impossibile connettersi al database $dbase");
?>
