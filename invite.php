<?php
session_start();

?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Inviter - Nivelo</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>

<?php
if(isset($_SESSION['useruid'])){
echo "
<section class='logScale'>
    <div style='padding: 25px;font-size: 1.5rem;'>
        <div class='title sysText' style='text-align: center;'>Opret nyt chatrum</div>
    </div>
    <div class='modal-bodyi'>
        <form class='form' action='chat_submit.php' method='POST' style='background-color: var(--b);border: none;width: 450px;'>

            <input class='input3' type='text' required name='bruger' id='bruger' placeholder='Brugernavn (inviterede bruger)' style='margin-bottom:20px'>

            <input class='input3' autocomplete='off' type='text' required name='room_name' id='name' placeholder='Chatnavn' style='margin-bottom:20px'>
            
            <input type='hidden' name='user_from' value='{$_SESSION['useruid']}'>

            <div class='' style='text-align:center;'>
                <button class='startclr' type='submit' name='submit' style='width:100%;margin-top:3px;''>Lav chat</button>
            </div>

        </form>
    </div>";

?>
    
    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login!</p>";
            }
        }
    ?>

<?php echo "</section>";

}

else {
    echo "<div class='aalign'>";
    echo "<p style='margin-top: 25px;text-align:center'>Du har ikke adgang! <br> Log på for at invitere en bruger til et chatrum.</p>";

    echo "<div style='text-align:center;margin-top: 2rem;'>";
    echo "<a href='/login.php'><button class='startclr'>Log på</button></a>";
    echo "</div>";
    echo "</div>";
}


?>

<div id="preloader" class="loader"></div>




<?php
    include_once 'db/includes/footer.php';
?>

 