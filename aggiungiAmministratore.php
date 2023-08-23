<?php
// Apri la sessione e includi la connessione al database
session_start();
include 'connect.php';

$erroreReg = "false";

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Recupero i valori immessi nei campi di registrazione
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $password = $_POST['password'];
    $email = strtolower($_POST['email']);

    // Faccio le query che mi serviranno per i confronti
    $qEmail = "SELECT Email FROM amministratore WHERE Email='$email'";
    $qEmailE = mysqli_query($conn, $qEmail);
    $contaEmail = mysqli_num_rows($qEmailE);

    // Se il nome è più lungo di 50 caratteri stampo errore
    if (strlen($nome) > 50) {
        $erroreReg = 'Lunghezza massima 50 car.';
    }
    // Se il nome contiene caratteri non validi stampo errore
    elseif (!preg_match('/^[a-zA-Z\s]+$/', $nome)) {
        $erroreReg = 'Nome non valido';
    }
    // Se l'email è già utilizzata stampo errore
    elseif ($contaEmail > 0) {
        $erroreReg = 'Email già utilizzata';
    }
    // Se l'email non è valida stampo errore
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroreReg = 'Email non valida!';
    }
    // Se la password è minore di 8 o maggiore di 12 caratteri stampo errore
    elseif (strlen($password) < 8 || strlen($password) > 12) {
        $erroreReg = 'Password non valida! Min: 8 caratteri - Max: 12 caratteri';
    }

    // Se non ci sono errori
    if ($erroreReg === "false") {
        // Hash della password per la sicurezza
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Inserisco tutto nel database utilizzando un prepared statement
        $query = "INSERT INTO amministratore (Email, Nome, Password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $email, $nome, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo $erroreReg;
        } else {
            echo "Errore durante la registrazione.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo $erroreReg;
    }
}

mysqli_close($conn);
?>
