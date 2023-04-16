<?php

// Starter sessionen
session_start();

// Skaber forbindelse til databasen
$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Definerer variabler fra $_POST "name" i profile.php
$name = $_SESSION["useruid"];
$color = mysqli_real_escape_string($conn, $_POST['color']);
$emailchange = mysqli_real_escape_string($conn, $_POST['mailchange']);
$namechange = mysqli_real_escape_string($conn, $_POST['namechange']);


// Brugeren skal være logget ind for at kunne ændre i sin profil
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
// Ellers smides brugeren ud
if (!$authorized) {
    die("Du har ikke tilladelse til at se denne side.");
}


$messagePROFILE = '';

// Hvis farven ikke er tom, så indsættes værdierne i databasen med en SQL forespørgsel
if (!empty($color)) {
    // Hvis farven ikke starter med #, så tilføjes det
    if(strpos($color, '#') !== 0) {
        $color = "#" . $color;
    }
    
    $sql = "UPDATE users SET usersColor = ? WHERE usersUid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $color, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $messagePROFILE = "Opdateret!";
}

// Hvis emailen ikke er tom, så indsættes værdierne i databasen med en SQL forespørgsel
if (!empty($emailchange)) {
    $sql = "UPDATE users SET usersEmail = ? WHERE usersUid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $emailchange, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $messagePROFILE = "Opdateret!";
}

// Hvis navnet ikke er tomt, så indsættes værdierne i databasen med en SQL forespørgsel
if (!empty($namechange)) {
    $sql = "UPDATE users SET usersName = ? WHERE usersUid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $namechange, $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $messagePROFILE = "Opdateret!";
}

// Hvis der ikke er nogen værdi, så vises en fejlbesked
if (empty($color) && empty($emailchange) && empty($namechange)) {
    $messagePROFILE = "Indtast en værdi!";
}

// Hvis der er en fejl, så vises en fejlbesked
if ($messagePROFILE == '') {
    $messagePROFILE = "Fejl!";
}

// Brugeren bliver sendt tilbage til profilen
header("location: ../../profile.php?message=" . urlencode($messagePROFILE));


?>