<?php
session_start();

?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Profil - Nivelo</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<?php
    if(isset($_SESSION['useruid'])){
        echo "
        <section class='logScale'> <!-- style='margin-top: 75px;' -->


        <div style='padding: 25px;font-size: 1.5rem;'>
        <div class='title sysText'> 

        <h1 style='font-size:30px;margin-bottom:35px'>{$_SESSION["username"]}</h1>

        <div class='modal-bodyi'>
        <form class='form' action='profile_submit.php' method='POST' style='background-color: var(--b);border: none;width: 450px;'>
        <input minlength='6' maxlength='7' class='input3' type='text' name='color' id='color' placeholder='Skift Chatfarve (#b392ac)' style='margin-bottom:20px'>
        <input class='input3' type='text' name='namechange' autocomplete='off'  id='namechange' placeholder='Skift Fulde Navn' style='margin-bottom:20px'>
        <input class='input3' type='text' name='mailchange' id='mailchange' placeholder='Skift Email' style='margin-bottom:20px'>

        <div class='' style='text-align:center'>
        <button class='startclr' type='submit' name='submit' style='width:100%;margin-top:3px'>Opdater</button>
        </div>
        </form>";

        if (isset($_GET['message'])) {
        $message = htmlspecialchars($_GET['message'], ENT_QUOTES, 'UTF-8');
        $allowed_messages = array('Opdateret!');
        if (in_array($message, $allowed_messages)) {
        echo '<div style="color: #a2c275;font-size:18px;margin-top:50px;text-align:center">' . $message . '</div>';
        }
        else {
        echo '<div style="color: #C27575;font-size:18px;margin-top:50px;text-align:center">' . $message . '</div>';

        }
        // #a2c275 - #818181
        }

        // echo "<div style='text-align:center;margin-top:55px;opacity:0.2;font-weight:300'><a class='pro' onclick='deleteAllCookies()'>Slet cookies<br></a></div>";
        echo "<div style='text-align:center;margin-top:30px;opacity:0.25;font-weight:300'><a class='hv' href='db/includes/logout.inc.php'>Log ud</a></div>

        </div>
        </div>
        </section>
        ";

    }
    else{
    echo "<div class='aalign'>";
    echo "<p style='margin-top: 25px;'>Du har ikke adgang! Log på for at se din profil.</p>";

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

