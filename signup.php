<?php
    session_start();
    include_once 'db/includes/header.php';
?>
<title>Tilmeld - Nivelo</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section class="signup-form aalign">
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Tilmeld</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="db/includes/signup.inc.php" method="post" style="background-color: var(--b);border: none;width: 500px;">
            <input class="input3" type="text" name="name" placeholder="Fulde navn..." style="margin-bottom:15px;">
            <input class="input3"  type="text" name="email" placeholder="Email..." style="margin-bottom:15px;">
            <input class="input3"  type="text" name="uid" placeholder="Brugernavn..." style="margin-bottom:15px;">
            <input class="input3"  type="password" name="pwd" placeholder="Adgangskode..." style="margin-bottom:15px;">
            <input class="input3"  type="password" name="pwdrepeat" placeholder="Gentag adgangskode..." style="margin-bottom:5px;">
            
            <small class="" style="font-weight: 300">Glemt adgangskode?</small>

            <div class="modal-spc" style="text-align:center;">
                <button class="modal-btn" type="submit" name="submit">Tilmeld</button>
            </div>
        </form>


    </div>

    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Udfyld alle felter!</p>";
            }
            else if($_GET["error"] == "invaliduid") {
                echo "<p>Dette brugernavn er ikke tilgængeligt!</p>";
            }
            else if($_GET["error"] == "invalidemail") {
                echo "<p>Denne email er ikke tilgængelig!</p>";
            }
            else if($_GET["error"] == "passwordsdontmatch") {
                echo "<p>Adgangskoderne er ikke det samme!</p>";
            }
            else if($_GET["error"] == "stmtfailed") {
                echo "<p>Noget gik galt, prøv igen!</p>";
            }
            else if($_GET["error"] == "usernametaken") {
                echo "<p>Brugernavnet er allerede i brug!</p>";
            }
            else if($_GET["error"] == "none") {
                echo "<p>Du har nu tilmeldt dig!</p>";
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