<?php
    session_start();
    include_once 'db/includes/header.php';
?>
<title>Home</title>
</head>

<body> 

<div id="preloader" class="loader"></div>

<?php
    include_once 'db/includes/nav.php';
?>

<main class="centerMain aalign">
    <!-- <p style="margin-bottom: -10px;">welcome to..</p> -->
    <h1>Welcome, <?php echo $_SESSION["useruid"]; ?>!</h1>

    <?php

        // if(isset($_SESSION['name'])){
        //     echo "<p style='margin-top: 25px;'>You are logged in!</p>";
        // }
        // else{
        //     echo "<p style='margin-top: 25px;'>You are logged out!</p>";
        // }
    ?>

    <a href="https://"><button style="margin-top: 25px;">Try it today!</button></a>


</main>

<footer class="footer">
    <!-- <p>
        adfasdasd
        <br/><br/>
    </p> -->
    <p class="copy">© Webportal by <a href="https://" target="_blank"> Magnus Hvidtfeldt</a></p>

</footer>


<?php
    include_once 'db/includes/footer.php';
?>