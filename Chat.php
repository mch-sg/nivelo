<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
?>


<!doctype html>

<head></head>
<body>

<form method="POST" action="Page2.php">
Send user a message: <input type="textarea" name="input" />

<input type="submit" value="Send" />
</form>

<br>
<br>
<!-- <iframe src="Page1.php" width="100%" height="100%"></iframe> -->

<?php
    // $sql = "SELECT 'message' FROM chat1";
    $sql = "SELECT * FROM Chat1";
    $result = $conn->query($sql); // mysqli_query($conn, $sql)

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "".$row["message"]. "<br><br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>

</body>
