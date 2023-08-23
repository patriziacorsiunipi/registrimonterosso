<?php
// Includo il file di connessione al database e faccio partire la sessione
session_start();
include 'connect.php';

$errore = "false";

// Se i campi email e password sono inviati tramite POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Pulisco e preparo le variabili email e password per la query
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Utilizzo prepared statement per prevenire SQL injection
    $query = "SELECT * FROM amministratore WHERE Email = ? AND Password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Controllo il numero di righe restituite dalla query
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Imposto le variabili di sessione in modo sicuro
        $_SESSION['nome'] = $row['Nome']; // Cambio l'indice numerico con l'indice nominativo
        $_SESSION['loginAmministratore'] = true; // Utilizzo true invece di "true"

        echo $errore;
    } else {
        $errore = "Email o password errati"; // Miglioro il messaggio di errore
        echo $errore;
    }
    
    // Chiudo il prepared statement
    mysqli_stmt_close($stmt);
}

// Chiudo la connession
