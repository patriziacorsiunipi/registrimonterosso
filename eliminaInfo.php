<?php
// Distruggo la sessione e indirizzo alla home
include 'connect.php';
session_start();

if (isset($_POST["idInfo"])) {
    $idInfo = $_POST["idInfo"];
    
    // Utilizza una query preparata per evitare SQL injection
    $qEliminaInfo = "DELETE FROM infopersona WHERE IdPersona = ?";
    $stmt = mysqli_prepare($conn, $qEliminaInfo);
    mysqli_stmt_bind_param($stmt, "s", $idInfo);

    if (mysqli_stmt_execute($stmt)) {
        $risposta = "Messaggio eliminato";
    } else {
        $risposta = "Errore durante l'eliminazione del messaggio";
    }

    mysqli_stmt_close($stmt);
    echo $risposta;
}
?>
