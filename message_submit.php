<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


$name = $_SESSION["useruid"];
$input = html_entity_decode(htmlspecialchars($_POST['input'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
$chat_room_id = htmlspecialchars($_POST['chat_room_id'], ENT_QUOTES, 'UTF-8');
$chatToken = htmlspecialchars($_POST['chatToken'], ENT_QUOTES, 'UTF-8');

// Autoriser bruger
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
if (!$authorized) {
    die("Du har ikke tilladelse til at se denne side.");
}

if(!empty($input)) {
    $stmt = $conn->prepare("INSERT INTO messages (inboxid, user_id, message) VALUES (:inboxid, :user_id, :message)");
    $stmt->bindParam(':inboxid', $chat_room_id);
    $stmt->bindParam(':user_id', $name);
    $stmt->bindParam(':message', $input);

    if ($stmt->execute()) {
        header("location: chat_room.php?room=$chatToken");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    header("location: chat_room.php?room=$chatToken");
}



?>