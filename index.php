<?php
    session_start();
    include_once 'db/includes/header.php';
?>
<title>Hjem</title>
</head>

<body> 

<div id="preloader" class="loader"></div>

<?php
    include_once 'db/includes/nav.php';
?>

<main class="centerMain aalign">
    <!-- <h1>Velkommen, <?php echo $_SESSION["useruid"]; ?>!</h1> -->

    <?php
        if(isset($_SESSION['useruid'])){
            echo "<h1>Velkommen, {$_SESSION['useruid']}!</h1>";
        }
        else{
            echo "<h1>Velkommen!</h1>";
        }
    ?>

    <a href="/chat_room.php"><button style="margin-top: 25px;">Prøv det!</button></a>


</main>

<!-- <footer class="footer">
    <p class="copy">© Webportal by <a href="https://" target="_blank"> Magnus Hvidtfeldt</a></p>

</footer> -->


<?php
    include_once 'db/includes/footer.php';
?>