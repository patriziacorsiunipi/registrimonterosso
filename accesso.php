<?php
session_start();
include 'connect.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $qNickPass = "SELECT * FROM utente WHERE Email = '$email'";
    $qNickPassE = $conn->query($qNickPass);

    if($qNickPassE && $qNickPassE->num_rows == 1) {
        $aNickPass = $qNickPassE->fetch_assoc();
        $storedHash = $aNickPass['Password'];

        if(password_verify($password, $storedHash)) {
            $_SESSION['emailUtente'] = $aNickPass['Email'];
            $_SESSION['nome'] = $aNickPass['Nome'];
            $_SESSION['loginUtente'] = true;
            ?>

            <script>
                window.location.replace("/")
            </script>


            <?php

        } else {
            echo "Nickname o password errati";
        }
    } else {
        echo "Nickname o password errati";
    }
}

$conn->close();
?>
