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


<section class='logScale'>
    <div style="padding: 25px;font-size: 1.5rem;">
        <div class="title sysText" style="text-align: center;">Tilmeld</div>
    </div>
    <div class="modal-bodyi">
        <form class="form" action="/db/includes/signup.inc.php" method="post" style="background-color: var(--b);border: none;width: 450px;">
            <input class="input3" type="text" name="name" placeholder="Fulde Navn" style="margin-bottom:20px;">
            <input class="input3"  type="text" name="email" placeholder="Email" style="margin-bottom:20px;">
            <input class="input3"  type="text" name="uid" placeholder="Brugernavn" style="margin-bottom:20px;">
            <input class="input3"  type="password" name="pwd" placeholder="Adgangskode" style="margin-bottom:20px;">

            <div class="" style="text-align:center">
                <button class="modal-btn startclr" type="submit" name="submit" style="width:100%;margin-top:3px;">Lav din nye konto</button>
            </div>
        </form>
    </div>

    <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p style='margin-top:25px;text-align:center'>Udfyld alle felter!</p>";
            }
            else if($_GET["error"] == "invaliduid") {
                echo "<p style='margin-top:25px;text-align:center'>Dette brugernavn er ikke tilgængeligt!</p>";
            }
            else if($_GET["error"] == "invalidemail") {
                echo "<p style='margin-top:25px;text-align:center'>Denne email er ikke tilgængelig!</p>";
            }
            else if($_GET["error"] == "passwordsdontmatch") {
                echo "<p style='margin-top:25px;text-align:center'>Adgangskoderne er ikke det samme!</p>";
            }
            else if($_GET["error"] == "stmtfailed") {
                echo "<p style='margin-top:25px;text-align:center'>Noget gik galt, prøv igen!</p>";
            }
            else if($_GET["error"] == "usernametaken") {
                echo "<p style='margin-top:25px;text-align:center'>Brugernavnet er allerede i brug!</p>";
            }
            else if($_GET["error"] == "none") {
                echo "<p style='margin-top:25px;text-align:center'>Du har nu tilmeldt dig!</p>";
            }
        }
    ?>

</section>


<div id="preloader" class="loader"></div>


<?php
    include_once 'db/includes/footer.php';
?>

 