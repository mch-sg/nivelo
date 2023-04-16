<?php
// Starter sessionen
session_start();
?>

<?php
    // Inkluderer headeren
    include_once 'db/includes/header.php';
?>
<title>Log på - Nivelo</title>
</head>
<body>

<?php
    // Inkluderer navbar
    include_once 'db/includes/nav.php';
?>


<section class="logScale">
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Log på</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="db/includes/login.inc.php" method="post" style="background-color: var(--b);border: none;width: 450px;">
        <input class="input3" type="text" name="uid" placeholder="Brugernavn / Email" style="margin-bottom:20px">
            <input class="input3"  type="password" name="pwd" placeholder="Adgangskode" style="margin-bottom:20px">
            <div class="" style="text-align:center;">
                <button class="startclr" type="submit" name="submit" style="width: 100%;">Log på</button>
            </div>
        </form>
        
    </div>

    <?php
        // Hvis der er en fejl i URL'en, så vises denne tekst
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p style='margin-top:25px;text-align:center'>Udfyld alle felter!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p style='margin-top:25px;text-align:center'>Forkert login!</p>";
            }
        }

    ?>

</section>

<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

 