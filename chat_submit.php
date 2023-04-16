<?php

// Starter sessionen
session_start();

// Skaber forbindelse til databasen
$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// Definerer variabler fra $_POST "name" i invite.php
$chat_room_name = html_entity_decode(htmlspecialchars($_POST['room_name'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
$from = $_SESSION['useruid'];
$bruger = htmlspecialchars($_POST['bruger'], ENT_QUOTES, 'UTF-8');
$chat_id = uniqid();


// Man skal være logget ind for at kunne oprette en chat
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
// Ellers bliver man smidt ud
if (!$authorized) {
    die("Du har ikke tilladelse til at se denne side.");
}

// Opretter chat, ved at indsætte værdierne i databasen med en SQL forespørgsel
$stmt = $conn->prepare("INSERT INTO chat_rooms (name, user_from, user_to, uuid) VALUES (:name, :user_from, :user_to, :uuid)");
$stmt->bindParam(':name', $chat_room_name);
$stmt->bindParam(':user_from', $from);
$stmt->bindParam(':user_to', $bruger);
$stmt->bindParam(':uuid', $chat_id);

// Hvis indsendelsen er succes, så ska den sende brugeren til chat_room.php
if ($stmt->execute()) {
    header("location: chat_room.php");
} else {
    // Ellers skal den vise fejlen
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>