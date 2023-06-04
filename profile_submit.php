<?php

// Starter sessionen
session_start();

include_once 'db/includes/dbh.inc.php';

// Definerer variabler fra $_POST "name" i profile.php
$name = $_SESSION["useruid"];
$color = $_POST['color'];
$emailchange = $_POST['mailchange'];
$namechange = $_POST['namechange'];


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
    
    $stmt = $conn->prepare("UPDATE users SET usersColor = :uc WHERE usersUid = :ui"); 
    $stmt->bindParam(':uc', $color);
    $stmt->bindParam(':ui', $name);
    $stmt->execute();
    $messagePROFILE = "Opdateret!";
}

// Hvis emailen ikke er tom, så indsættes værdierne i databasen med en SQL forespørgsel
if (!empty($emailchange)) {
    $stmt = $conn->prepare("UPDATE users SET usersEmail = :uc WHERE usersUid = :ui"); 
    $stmt->bindParam(':uc', $emailchange);
    $stmt->bindParam(':ui', $name);
    $stmt->execute();
    $messagePROFILE = "Opdateret!";

}

// Hvis navnet ikke er tomt, så indsættes værdierne i databasen med en SQL forespørgsel
if (!empty($namechange)) {
    $stmt = $conn->prepare("UPDATE users SET usersName = :uc WHERE usersUid = :ui"); 
    $stmt->bindParam(':uc', $namechange);
    $stmt->bindParam(':ui', $name);
    $stmt->execute();
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