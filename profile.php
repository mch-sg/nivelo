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


        <?php
        if(isset($_SESSION['useruid'])){
            echo "
            <section class='signup-form aalign'>


    <div style='padding: 25px;font-size: 1.5rem;'>
        <div class='title sysText'> 

            <h1 style='font-size:30px;margin-bottom:35px'>{$_SESSION["username"]}</h1>
            
            <div class='modal-bodyi'>
            <form class='form' action='profile_submit.php' method='POST' style='background-color: var(--b);border: none;width: 500px;'>
                <label class='label' for='color' style='color: #818181;font-size: 18px;text-align:left'>Skift chatfarve</label>
                <input minlength='7' maxlength='7' pattern='^#.*$' required class='input3' type='text' name='color' id='color' placeholder='F.eks. #b392ac' style='margin-bottom:15px;margin-top:15px'>
                <!-- <input class='input3'  type='text' name='room_name' id='name' placeholder='Skriv navn på chatrum...' style='margin-bottom:5px;'> -->
    
                <div class='modal-spc' style='text-align:center;'>
                    <button class='modal-btn' type='submit' name='submit'>Opdater ændringer</button>
                </div>
            </form>";

            echo "<div style='text-align:center;margin-top:35px;opacity:0.4;font-weight:300'><a class='pro' href='db/includes/logout.inc.php'>Log ud</a></div>
            
            </div>
            </div>
            </section>
            ";
            
        }
        else{
            echo "<div class='aalign'>";
            echo "<p style='margin-top: 25px;'>Du har ikke adgang! Log på for at se din profil.</p>";
        
            echo "<div class='modal-spc' style='text-align:center;'>";
            echo "<a href='/login.php'><button>Log på</button></a>";
            echo "</div>";
            echo "</div>";
        }
        ?>

        <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                echo '<div style="color: #a2c275;font-size:18px;margin-top:50px;text-align:center">' . $message . '</div>';
                // #a2c275 - #818181
            }
        ?>


    <?php
    


    ?>





<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">