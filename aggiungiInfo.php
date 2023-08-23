<?php
// Apri la sessione e includi la connessione al database
session_start();
include 'connect.php';

$erroreReg = "false";

if (isset($_POST['idInfo']) && isset($_POST['info'])) {
    // Recupera i valori immessi nei campi di registrazione
    $info = mysqli_real_escape_string($conn, $_POST['info']);
    $idInfo = intval($_POST['idInfo']); // Converte in intero per evitare SQL injection

    // Fai la query per verificare l'id
    $qIDInfo = "SELECT IdPersona FROM infopersona WHERE IdPersona = ?";
    $stmt = mysqli_prepare($conn, $qIDInfo);
    mysqli_stmt_bind_param($stmt, "i", $idInfo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $contaInfo = mysqli_stmt_num_rows($stmt);

    // Se l'id è già utilizzato stampa errore
    if ($contaInfo > 0) {
        $erroreReg = 'Informazione già presente';
    }
    // Se la lunghezza dell'informazione supera i 1000 caratteri stampa errore
    elseif (strlen($info) > 1000) {
        $erroreReg = 'Lunghezza massima 1000 car.';
    }

    // Se non ci sono errori
    if ($erroreReg == "false") {
        // Inserisci tutto nel database utilizzando un prepared statement
        $qRegistr = "INSERT INTO infopersona (IdPersona, Informazioni) VALUES (?, ?)";
        $stmtInsert = mysqli_prepare($conn, $qRegistr);
        mysqli_stmt_bind_param($stmtInsert, "is", $idInfo, $info);

        if (mysqli_stmt_execute($stmtInsert)) {
            echo $erroreReg;
        } else {
            echo "Errore durante l'inserimento dell'informazione.";
        }

        mysqli_stmt_close($stmtInsert);
    } else {
        echo $erroreReg;
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
