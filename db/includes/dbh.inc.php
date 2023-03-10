<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_login";
$dBPassword = "Jsu78khv";
$dBName = "u463909974_demo";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
