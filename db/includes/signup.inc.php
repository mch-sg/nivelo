<?php
    session_start();
?>

<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    echo $name;
    echo $email;
    echo $username;
    echo $pwd;
    echo "<br>";

    if (emptyInputSignup($name, $email, $username, $pwd) !== false) {
        echo "emptyInputSignup";
        header("location: ../../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        echo "invalidUid";
        header("location: ../../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        echo "invalidEmail";
        header("location: ../../signup.php?error=invalidemail");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        echo "uidExists";
        header("location: ../../signup.php?error=usernametaken");
        exit();
    }

    echo "lavbruger";
    lavBruger($conn, $name, $email, $username, $pwd);


}
else {
    header("location: ../../signup.php");
    exit();
}