<?php
// Apri la sessione e includi la connessione al database
session_start();
include 'connect.php';

$erroreReg = "false";

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Recupera i valori immessi nei campi di registrazione
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $password = $_POST['password'];
    $email = strtolower($_POST['email']);

    // Fai le query che ti serviranno per i confronti
    $qEmail = "SELECT Email FROM utente WHERE Email = ?";
    $stmtEmail = mysqli_prepare($conn, $qEmail);
    mysqli_stmt_bind_param($stmtEmail, "s", $email);
    mysqli_stmt_execute($stmtEmail);
    mysqli_stmt_store_result($stmtEmail);
    $contaEmail = mysqli_stmt_num_rows($stmtEmail);

    // Se il nome è più lungo di 50 caratteri stampa errore
    if (strlen($nome) > 50) {
        $erroreReg = 'Lunghezza massima 50 car.';
    }
    // Se il nome contiene caratteri non validi stampa errore
    elseif (!preg_match('/^[a-zA-Z\s]+$/', $nome)) {
        $erroreReg = 'Nome non valido';
    }
    // Se l'email è già utilizzata stampa errore
    elseif ($contaEmail > 0) {
        $erroreReg = 'Email già utilizzata';
    }
    // Se l'email non è valida stampa errore
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroreReg = 'Email non valida!';
    }
    // Se la password è minore di 8 o maggiore di 12 caratteri stampa errore
    elseif (strlen($password) < 8 || strlen($password) > 12) {
        $erroreReg = 'Password non valida! Min: 8 caratteri - Max: 12 caratteri';
    }

    // Se non ci sono errori
    if ($erroreReg == "false") {
        // Hash della password con password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Inserisci tutto nel database utilizzando un prepared statement
        $qRegistr = "INSERT INTO utente (Email, Nome, Password) VALUES (?, ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $qRegistr);
        mysqli_stmt_bind_param($stmtInsert, "sss", $email, $nome, $hashedPassword);

        if (mysqli_stmt_execute($stmtInsert)) {
            echo $erroreReg;
        } else {
            echo "Errore durante la registrazione.";
        }

        mysqli_stmt_close($stmtInsert);
    } else {
        echo $erroreReg;
    }

    mysqli_stmt_close($stmtEmail);
}

mysqli_close($conn);
?>
