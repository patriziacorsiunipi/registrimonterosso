<?php
    //distruggo la sessione e indirizzo alla home
    session_start();
    session_destroy();
    header("Location: index.php");
?>
