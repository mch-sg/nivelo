<?php
    session_start();
    include_once 'db/includes/header.php';
?>
<title>Hjem - Nivelo</title>
</head>

<body> 

<div id="preloader" class="loader"></div>

<?php
    include_once 'db/includes/nav.php';
?>

<main class="aalign overflow-hidden" style="transform: translate(-60%, -50%);width:60%;"> <!-- -70%, -50% -->
    <!-- <h1>Velkommen, <?php echo $_SESSION["useruid"]; ?>!</h1> -->

    <?php
        if(isset($_SESSION['useruid'])){
            // echo "<h1 style='text-align: left;align-items: left;'>Velkommen hos Nivelo, {$_SESSION['useruid']}</h1>";
            echo "<h1 class='drop-in' style='text-align: left;align-items: left;padding-right:15%'>Kommuniker med Nivelo, en digital chatportal</h1>";
            echo "<p class='drop-in-2' style='margin-top:35px;text-align:left;color: #7a7a7a;font-weight:200;width:70%;line-height:1.4;'>Udvid talen med Nivelo. Hos os kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.</p>";
            echo "<a href='/chat_room.php'><button class='startclr drop-in-3' style='margin-top: 75px;'>Kom i gang</button></a>";
        }
        else{
            echo "<h1 class='drop-in' style='text-align: left;align-items: left;padding-right:15%'>Kommuniker med Nivelo, en digital chatportal</h1>";
            echo "<p class='drop-in-2' style='margin-top:35px;text-align:left;color: #7a7a7a;font-weight:200;width:70%;line-height:1.4;'>Udvid talen med Nivelo. Hos os kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.</p>";
            echo "<a href='/signup.php'><button class='startclr drop-in-3' style='margin-top: 75px;'>Kom i gang</button></a>";

        }
    ?>

    <!-- <a href="/signup.php"><button class="startclr" style="margin-top: 75px;">Kom i gang</button></a> -->


</main>

<!-- <footer class="footer">
    <p class="copy">© Webportal by <a href="https://" target="_blank"> Magnus Hvidtfeldt</a></p>

</footer> -->


<?php
    include_once 'db/includes/footer.php';
?>