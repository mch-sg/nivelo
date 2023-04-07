<?php

    include_once 'db/includes/header.php';
?>
<title>Hjem - Nivelo</title>
</head>
<body> 

<?php

    echo "<div id='preloader' class='loader'></div>";

    include_once 'db/includes/nav.php';
?>

<main class="overflow-hidden aalign marleft wid" style="transform: translate(-70%, -50%);"> <!-- transform: translate(-60%, -50%);width:60%; -->

<?php 
    if(isset($_SESSION['useruid'])){
        echo "<h1 class='drop-in pad' style='text-align: left;align-items: left'>Kommuniker med Nivelo, en digital chatportal</h1>";
        echo "<p class='drop-in-2 pad-xl' style='margin-top:35px;text-align:left;color: var(--modaltext);font-weight:300;width:70%;line-height:1.4;'>Udvid talen med Nivelo. Hos os kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.</p>";
        echo "<a href='/chat_room.php'><button class='startclr drop-in-3' style='margin-top: 75px;'>Kom i gang</button></a>";
    }
    else{
        echo "<h1 class='drop-in pad' style='text-align: left;align-items: left'>Kommuniker med Nivelo, en digital chatportal</h1>";
        echo "<p class='drop-in-2 pad-xl' style='margin-top:35px;text-align:left;color: #7a7a7a;font-weight:200;width:70%;line-height:1.4;'>Udvid talen med Nivelo. Hos os kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.</p>";
        echo "<a href='/signup.php'><button class='startclr drop-in-3' style='margin-top: 75px;'>Kom i gang</button></a>";

    }


    echo "
    </main>
    ";

?>


<?php
    include_once 'db/includes/footer.php';
?>