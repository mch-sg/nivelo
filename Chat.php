
<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
?>


<?php
    include_once 'db/includes/header.php';
?>
<title>Chatting</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>




<section class="signup-form aalign">

<div style="padding: 25px;font-size: 1.5rem;">
    <div class="title sysText" style="text-align: center;">Chat</div>
</div>

<form class="form" method="POST" action="Page2.php" style="background-color: var(--b);border: none;">
Send user a message: <input type="textarea" name="input" class="input3" autocomplete="off" placeholder="Send user a message..."/>
<!-- <input type="textarea" name="input" />     <textarea type="textarea" id="message" name="message"> </textarea> -->

<!-- <input type="submit" value="Send"/> -->

<div class="modal-spc" style="text-align:center;">
    <button class="modal-btn" type="submit" value="Send">Send</button>
</div>

</form>

<br>
<br>
<!-- <iframe src="Page1.php" width="100%" height="100%"></iframe> -->

<div style="color:white;">
<!-- <div class="title sysText" style="text-align: center;">Chat</div> -->
<br><br>
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
</div>

</section>



<div id="preloader" class="loader"></div>
<footer class="footer" style="position:fixed;">

<p class="copy">© Webportal by <a href="https://" target="_blank"> Magnus Hvidtfeldt</a></p>

</footer>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">