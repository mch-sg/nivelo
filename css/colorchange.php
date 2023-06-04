
<?php

session_start();

include_once '../db/includes/dbh.inc.php';

$stmt = $conn->prepare("SELECT usersColor FROM users WHERE usersUid = :usersUid");
$stmt->bindParam(':usersUid', $_SESSION['useruid']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_SESSION['useruid'])) {
  $usersColor = $result['usersColor'];
} else {
  $usersColor = '#86a2b8';
}

header("Content-type: text/css");
$butClr = $usersColor; // #86a2b8
$butClrHvr = $usersColor; // #668299
$white = '#fff';
?>

:root {
  --spinclr: <?php echo $butClr; ?> !important;
  --butClr: <?php echo $butClr; ?> !important;
  --butClrHvr: <?php echo $butClrHvr; ?> !important;
}