<?php
    //distruggo la sessione e indirizzo alla home
    session_start();
    include 'GoogleConfig.php';
    $google_client->revokeToken();
    session_destroy();
    header("Location:".$_SERVER['HTTP_REFERER']);
?>
