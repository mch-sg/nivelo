<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";


$name = $_SESSION["useruid"];
$input = $_POST['input'];
$chat_room_id = $_POST['chat_room_id'];
$chat_room_name = $_POST['chat_room_name'];

// Autoriser bruger
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
if (!$authorized) {
    die("You are not authorized to view this page.");
}


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


$sql = "INSERT INTO messages (inboxid, user_id, message) VALUES ('$chat_room_id', '$name', '$input')";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    header("location: chat_room.php?room=$chat_room_id");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>