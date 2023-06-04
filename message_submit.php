<?php

// Starter sessionen
session_start();

include_once 'db/includes/dbh.inc.php';

// Definerer variabler fra $_POST "name" i chat_room.php
$name = $_SESSION["useruid"];
// Decoding inkluderer specielle tegn som ' og " - og htmlspecialchars forebygger XSS angreb
$input = html_entity_decode(htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8'); 
$chat_room_id = htmlspecialchars($_POST['chat_room_id'], ENT_QUOTES, 'UTF-8');
$chatToken = htmlspecialchars($_POST['chatToken'], ENT_QUOTES, 'UTF-8');

// Brugeren skal være logget ind, for at kunne sende beskeder
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
// Ellers smides brugeren ud
if (!$authorized) {
    die("Du har ikke tilladelse til at se denne side.");
}

// Hvis input ikke er tom, så indsættes værdierne i databasen med en SQL forespørgsel
if(!empty($input)) {
    $stmt = $conn->prepare("INSERT INTO messages (inboxid, user_id, message) VALUES (:inboxid, :user_id, :message)");
    $stmt->bindParam(':inboxid', $chat_room_id);
    $stmt->bindParam(':user_id', $name);
    $stmt->bindParam(':message', $input);

    // Hvis indsendelsen er succes, så ska den sende brugeren til chat_room.php med chatToken
    if ($stmt->execute()) {
        header("location: chat_room.php?room=$chatToken");
    } else {
        // Ellers viser fejl
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("location: chat_room.php?room=$chatToken");
}



?>