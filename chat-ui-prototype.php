
<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
?>


<?php
    include_once 'db/includes/header.php';
?>
<title>Prot.Chatting</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';

?>




<section class="signup-form aalign">

<div style="color:white;width: 600px; white-space: normal; overflow: auto; word-wrap: break-word;">
<!-- <div class="title sysText" style="text-align: center;">Chat</div> -->
<br><br>
<?php
    // $sql = "SELECT 'message' FROM chat1";
    $sql = "SELECT * FROM Chat1";
    $result = $conn->query($sql); // mysqli_query($conn, $sql)

    if($result->num_rows > 0 && isset($_SESSION['useruid'])) {
        while($row = $result->fetch_assoc()) {
            // echo "".$row["user_id"]. " " ."- " . $row["message"]. "<br><br>";

            $date = new DateTime($row['timestamp']) ;  
            // echo $date->format('Y-m-d');
            // echo "<a style='opacity:0.7'>".$row["user_id"]. " " ."(" . $date->format('H:i'). ") " . "- </a>";
            // echo ""$row["message"]. "<br><br>";

            echo "<a style='opacity:0.60;pointer-events: none;'>".$row["user_id"]. " " ."(" . $date->format('H:i'). ") " . "-</a> " . $row["message"]. "<br><br>";
        }
    } else if (!isset($_SESSION['useruid'])) {
        echo "";
    } else {
        echo "Der er ingen beskeder her endnu.";
    }
    $conn->close();
?>
</div>



<?php

if(isset($_SESSION['useruid'])){
    echo "<br><br>";
    echo "<form class='form' method='POST' action='Page2.php' style='background-color: var(--b);border: none;' >";
    echo "<input type='textarea' name='input' class='input5' autocomplete='off' placeholder='Skriv en besked...'/>";
    // echo "<textarea type='textarea' id='input' name='input' class='input5' autocomplete='off' placeholder='Skriv en besked...'></textarea>";
    echo "    <button class='modal-btn' type='submit' value='Send' style='margin-left: 10px;padding: 1.25rem 2.75rem;border: 1px solid var(--borderclr);background: #ff462e;'>Send</button>";
    echo "</form>";
}
else{
    echo "<p style='margin-top: 25px;'>Log på for at skrive og se beskeder!</p>";

    echo "<div class='modal-spc' style='text-align:center;'>";
    echo "<a href='/login.php'><button>Log på</button></a>";
    echo "</div>";
}

?>


</section>



<div id="preloader" class="loader"></div>
<!-- <footer class="footer" style="position:fixed;">

<p class="copy">© Webportal by <a href="https://" target="_blank"> Magnus Hvidtfeldt</a></p>

</footer> -->



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">