<?php
session_start();
include 'connect.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $qNickPass = "SELECT * FROM utente WHERE Email = '$email'";
    $qNickPassE = mysqli_query($conn, $qNickPass);

    if(mysqli_num_rows($qNickPassE) == 1) {
        $aNickPass = mysqli_fetch_array($qNickPassE);
        $storedHash = $aNickPass['Password'];

        if(password_verify($password, $storedHash)) {
            $_SESSION['emailUtente'] = $aNickPass['Email'];
            $_SESSION['nome'] = $aNickPass['Nome'];
            $_SESSION['loginUtente'] = true;
            echo "Success"; // Puoi anche evitare di inviare messaggi direttamente qui
        } else {
            echo "Nickname o password errati";
        }
    } else {
        echo "Nickname o password errati";
    }
}

mysqli_close($conn);
?>
