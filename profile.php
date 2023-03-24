<?php
    session_start();
?>

<?php
    include_once 'db/includes/header.php';
?>
<title>Log In</title>
</head>
<body>

<?php
    include_once 'db/includes/nav.php';
?>


<section class="signup-form aalign">




    <div style='padding: 25px;font-size: 1.5rem;'>
    <div class='title sysText' style='text-align: center;'> we<?php $_SESSION["useruid"] ?></div>
    </div>


</section>



<div id="preloader" class="loader"></div>



<?php
    include_once 'db/includes/footer.php';
?>

<link rel="stylesheet" href="css/palette-selector.css">