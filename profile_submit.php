<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";


$name = $_SESSION["useruid"];
$color = $_POST['color'];
$emailchange = $_POST['mailchange'];
$namechange = $_POST['namechange'];

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

if($color != '') {
$sql = "UPDATE users SET usersColor = '$color' WHERE usersUid = '$name'";
}

if($emailchange != '') {
$sql = "UPDATE users SET usersEmail = '$emailchange' WHERE usersUid = '$name'";
}

if($namechange != '') {
$sql = "UPDATE users SET usersName = '$namechange' WHERE usersUid = '$name'";
}



if (mysqli_query($conn, $sql)) {
    $messagePROFILE = "Opdateret!";
    header("location: profile.php?message=" . urlencode($messagePROFILE));
} else if($color == '' && $emailchange == '' && $namechange == '') {
    $messagePROFILE = "Indtast en værdi!";
    header("location: profile.php?message=" . urlencode($messagePROFILE));
} else {
    $messagePROFILE = "Fejl!";
    header("location: profile.php?message=" . urlencode($messagePROFILE));}

?>