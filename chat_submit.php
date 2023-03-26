<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";


$name = $_SESSION["useruid"];
$input = $_POST['input'];

// $chat_room_id = $_POST['chat_room_id'];
$chat_room_name = $_POST['room_name'];
$bruger = $_POST['bruger'];
$from = $_SESSION['useruid'];

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// echo "chat_room_id: $chat_room_id";


// Insert the new room into the database
$sql = "INSERT INTO chat_rooms (name, user_from, user_to) VALUES ('$chat_room_name', '$from', '$bruger')";



// $sql = "UPDATE 'messages' SET 'message' = '$input' WHERE 'messages'.'id' = 1;";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    header("location: chat_room.php?room=$chat_room_name");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>