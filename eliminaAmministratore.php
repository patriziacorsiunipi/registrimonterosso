<?php
// Distruggo la sessione e indirizzo alla home
include 'connect.php';
session_start();

if (isset($_POST["id"])) {
    $IDAmministratore = $_POST["id"];
    $qEliminaUtente = "DELETE FROM amministratore WHERE IDAmministratore = ?";
    $stmt = mysqli_prepare($conn, $qEliminaUtente);
    mysqli_stmt_bind_param($stmt, "s", $IDAmministratore);

    if (mysqli_stmt_execute($stmt)) {
        $risposta = "Utente eliminato";
    } else {
        $risposta = "Errore durante l'eliminazione dell'utente";
    }

    mysqli_stmt_close($stmt);
    echo $risposta;
}
?>
