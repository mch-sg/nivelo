<?php
    session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Log På</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section class="signup-form aalign">
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Log på</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="db/includes/login.inc.php" method="post" style="background-color: var(--b);border: none;width: 500px;">
            <input class="input3" type="text" name="uid" placeholder="Brugernavn/Email..." style="margin-bottom:15px;">
            <input class="input3"  type="password" name="pwd" placeholder="Adgangskode..." style="margin-bottom:5px;">

            <small class="" style="font-weight: 300">Glemt adgangskode?</small>

            <div class="modal-spc" style="text-align:center;">
                <button class="modal-btn" type="submit" name="submit">Log på</button>
            </div>
        </form>


    </div>

    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Udfyld alle felter!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p>Forkert login!</p>";
            }
        }
    ?>

</section>

<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">