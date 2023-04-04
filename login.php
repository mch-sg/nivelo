<?php
session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Log på - Nivelo</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section style="margin-top: 75px;">
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Log på</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="db/includes/login.inc.php" method="post" style="background-color: var(--b);border: none;width: 500px;">
        <label class="label" for="uid" style="color: #818181;font-size: 18px;">Brugernavn/email</label>
        <input class="input3" type="text" name="uid" placeholder="johndoe15..." style="margin-bottom:30px;margin-top:15px">
        <label class="label" for="pwd" style="color: #818181;font-size: 18px;">Adgangskode</label>
            <input class="input3"  type="password" name="pwd" placeholder="********" style="margin-top:15px">

            <small class="" style="font-weight: 200;color:white;opacity:0.3">Glemt adgangskode?</small>

            <div class="modal-spc" style="text-align:center;">
                <button class="modal-btn" type="submit" name="submit">Log på</button>
            </div>
        </form>


    </div>

    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p style='margin-top:5px;text-align:center'>Udfyld alle felter!</p>";
            }
            else if($_GET["error"] == "wronglogin") {
                echo "<p style='margin-top:5px;text-align:center'>Forkert login!</p>";
            }
        }
    ?>

</section>

<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">