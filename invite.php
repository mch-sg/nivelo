<?php
    session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Inviter</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section class="signup-form aalign">
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Inviter brugere</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="chat_submit.php" method="POST" style="background-color: var(--b);border: none;width: 500px;">
            <input class="input3" type="text" name="bruger" id="bruger" placeholder="Skriv navn på bruger..." style="margin-bottom:15px;">
            <input class="input3"  type="text" name="room_name" id="name" placeholder="Skriv navn på chatrum..." style="margin-bottom:5px;">
            <input type='hidden' name='user_from' value='<?php $_SESSION['useruid'] ?>'>

            <!-- <small class="" style="font-weight: 300">Glemt adgangskode?</small> -->

            <div class="modal-spc" style="text-align:center;">
                <button class="modal-btn" type="submit" name="submit">Lav chat</button>
            </div>
        </form>
    </div>


    
    <?php
    // INSERT INTO chat_room (name) VALUES ('My Chat Room');

        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login!</p>";
            }
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