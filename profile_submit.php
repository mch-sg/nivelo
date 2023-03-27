<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";


$name = $_SESSION["useruid"];
$color = $_POST['color'];

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);


$sql = "UPDATE users SET usersColor = '$color' WHERE usersUid = '$name'";



if (mysqli_query($conn, $sql)) {
    $messagePROFILE = "Opdateret!";
    header("location: profile.php?message=" . urlencode($messagePROFILE));
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>