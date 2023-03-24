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
    <h1>Welcome!</h1>
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