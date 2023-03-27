<?php
    session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Profil</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section class="signup-form aalign">


    <div style='padding: 25px;font-size: 1.5rem;'>
        <div class='title sysText' style='text-align: center;'> 
        <?php
        if(isset($_SESSION['useruid'])){
            echo "<h1 style='font-size:30px;margin-bottom:35px'>{$_SESSION["username"]}</h1>";
        }
        else{
            echo "<h1></h1>";
        }
        ?>
    </div>

    <div class="modal-bodyi">
        <form class="form" action="profile_submit.php" method="POST" style="background-color: var(--b);border: none;width: 500px;">
            <label class="label" for="color" style="color: #818181;font-size: 18px;">Skift chatfarve</label>
            <input minlength="7" maxlength="7" pattern="^#.*$" required class="input3" type="text" name="color" id="color" placeholder="F.eks. #b392ac" style="margin-bottom:15px;margin-top:15px">
            <!-- <input class="input3"  type="text" name="room_name" id="name" placeholder="Skriv navn på chatrum..." style="margin-bottom:5px;"> -->

            <div class="modal-spc" style="text-align:center;">
                <button class="modal-btn" type="submit" name="submit">Opdater ændringer</button>
            </div>
        </form>

        <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                echo '<div style="color: #a2c275;font-size:18px;margin-top:50px;text-align:center">' . $message . '</div>';
                // #a2c275 - #818181
            }
        ?>
    </div>


    <?php
    


    ?>


</section>



<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">