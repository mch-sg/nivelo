<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";
$input = $_POST['input'];

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

$sql = "INSERT INTO Chat1 (message) VALUES ('$input')";

// $sql = "UPDATE 'Chat1' SET 'message' = '$input' WHERE 'chat1'.'id' = 1;";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
    header("location: Chat.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>