<?php
// Starter sessionen
session_start();
?>

<?php

// Hvis der er trykket på submit knappen, gør følgende
if (isset($_POST['submit'])) {

    // Definer variabler fra $_POST "name" i signup.php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // Inkluderer forbindelsen til databasen og funktionerne
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Hvis der er tomme felter, så send brugeren tilbage med en fejl
    if (emptyInputSignup($name, $email, $username, $pwd) !== false) {
        echo "emptyInputSignup";
        header("location: ../../signup.php?error=emptyinput");
        exit();
    }

    // Hvis userid er invalid, så send brugeren tilbage med en fejl
    if (invalidUid($username) !== false) {
        echo "invalidUid";
        header("location: ../../signup.php?error=invaliduid");
        exit();
    }

    // Hvis email er invalid, så send brugeren tilbage med en fejl
    if (invalidEmail($email) !== false) {
        echo "invalidEmail";
        header("location: ../../signup.php?error=invalidemail");
        exit();
    }

    // Hvis brugernavn/mail eksisterer, så send brugeren tilbage med en fejl
    if (uidExists($conn, $username, $email) !== false) {
        echo "uidExists";
        header("location: ../../signup.php?error=usernametaken");
        exit();
    }

    // Ellers så lav brugeren
    lavBruger($conn, $name, $email, $username, $pwd);

}
else {
    header("location: ../../signup.php");
    exit();
}