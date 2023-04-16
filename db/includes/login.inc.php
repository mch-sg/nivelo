<?php
    // Starter sessionen
    session_start();
?>

<?php

// Hvis der er trykket på submit knappen, gør følgende
if(isset($_POST['submit'])){

    // Starter sessionen
    session_start();

    // Definer variabler fra $_POST "name" i login.php
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // Inkluderer forbindelsen til databasen og funktionerne
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';

    // Hvis der er tomme felter, så send brugeren tilbage med en fejl
    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../../login.php?error=emptyinput");
        exit();
    }

    // Ellers så log brugeren ind
    loginBruger($conn, $username, $pwd);

}
else {
    header("location: ../attributes/login.php");
    exit();
}