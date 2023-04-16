<?php

// * Selv-lavet kode
// *
// Starter sessionen
session_start();

// Skaber forbindelse til databasen
$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
} catch(PDOException $e) {
    // Hvis databasen fejler, så vises fejlbeskeden
    die("Database connection failed: " . $e->getMessage());
}

// Inkluderer "header" filen som indeholder <head> og de basiske ting til filerne
include_once 'db/includes/header.php';

// Henter dataen til ændring af titlen, baseret på hvilket chatrum, man befinder sig i
$ranid = htmlspecialchars($_GET['room'], ENT_QUOTES);
$stmt = $conn->prepare("SELECT id, name, user_from, user_to FROM chat_rooms WHERE uuid = :uuid");
$stmt->bindParam(':uuid', $ranid);
$stmt->execute();
$row3 = $stmt->fetch(PDO::FETCH_ASSOC);

// Definerer variabler til ændring af titlen
$chat_room_id = $row3['id']; 
$user_from_id = $row3['user_from']; 
$user_to_id = $row3['user_to']; 
$chat_room_name = $row3['name']; 
$host = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];

?>
<!-- Ændrer titlen -->
<title><?php if($host != 'devmch.online/chat_room.php' && isset($chat_room_name)) { echo htmlspecialchars($chat_room_name, ENT_QUOTES); } else { echo "Chatrum"; } ?> - Nivelo</title>
<script src="/scripts/script.js"></script>
</head>
<body>

<?php
// Inkluderer navigationsbaren
include_once 'db/includes/nav.php';

// Hvis man er logget ind, vises chatrummet og sidebaren
// Ellers vises "log på for at skrive og se beskeder"
if(isset($_SESSION['useruid'])){

    $uuid = $_SESSION['useruid'];

    // Henter alle unikke chatrum, som brugeren er en del af
    $stmt = $conn->prepare("SELECT DISTINCT * FROM chat_rooms WHERE (user_from = :uf OR user_to = :ut)");
    $stmt->bindParam(':uf', $uuid);
    $stmt->bindParam(':ut', $uuid);
    $stmt->execute();
    $chat_rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // HTML til sidebaren, som viser de tilgængelige chatrum for brugeren
    echo "
    
    <div class='sidebar'>

    <div class='sidebar-content'>

        <div class='sidebar-header'>
        </div>
        
        <div class='aalign' style='text-align:left;font-weight:300;top: 45%;'>
        <a style='pointer-events:none;opacity:0.35;font-size:13px;font-weight:200;'>CHATRUM<br><br></a>";

        // ! Lånt kode
        // !
        // Skaber en liste i sidebaren med alle chatrum, som brugeren er en del af
        foreach($chat_rooms as $row) {
            $chat_room_id = $row['id'];
            $chat_room_name = $row['name'];
            $user_from_id = $row['user_from'];
            $user_to_id = $row['user_to'];
            $ranid = $row['uuid'];

            if($uuid === $user_from_id || $uuid === $user_to_id) {
                echo "
                <a href='chat_room.php?room=" . htmlspecialchars($ranid, ENT_QUOTES) . "' class='sid' style='list-style-type: none;'><i class='bi bi-hash i-a' style='vertical-align: bottom;margin-right: 5px;font-size:19px'></i>" . htmlspecialchars($chat_room_name, ENT_QUOTES) . "</a><br><br>
                ";
            }
        }

        echo "
            </div>
        </div>
    </div>
            ";

// Henter rummets unikke id fra URL'en
$ranid = $_GET['room'];

// Henter dataen fra chatrum
$stmt = $conn->prepare("SELECT * FROM chat_rooms WHERE uuid = :s");
$stmt->bindParam(':s', $ranid);
$stmt->execute();
$row3 = $stmt->fetch(PDO::FETCH_ASSOC);
// Sætter variabler fra chatrum
$user_from_id = $row3['user_from'];
$user_to_id = $row3['user_to'];
$chat_room_name = $row3['name'];
$chat_room_id = $row3['id'];


// * Selv-lavet kode
// *

$host = $_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];

// Hvis brugeren har adgang til chatrummet, og URL'en ikke er startsiden, vises chatrummet
if($_SESSION['useruid'] == $user_from_id || $_SESSION['useruid'] == $user_to_id && $host !== 'devmch.online/chat_room.php'){
    echo "<br><br>
    <div class='main-content' style='position: relative;'>
    <div class='chatbox-container chat-scale' style='margin-bottom: 50px;bottom: 80px;'>"; // ! Lånt chat-scale css
    echo "<div class='chatbox' id='chatbox' style='font-weight: 200;color:white; white-space: normal; overflow: auto; word-wrap: break-word;'>"; 

} 
// Hvis brugeren ikke har adgang til chatrummet, og URL'en ikke er startsiden, vises et udvidet chatrum, uden mulighed for at skrive
else if ($_SESSION['useruid'] != $user_from_id || $_SESSION['useruid'] != $user_to_id && $host !== 'devmch.online/chat_room.php') {
    echo "<br><br>
    <div class='main-content' style='position: relative;'>
    <div class='chatbox-container chat-scale' style='margin-bottom: 0;bottom: 45px;'>"; // ! Lånt chat-scale css
    echo "<div class='chatbox' id='chatbox' style='font-weight: 200;color:white; white-space: normal; overflow: auto; word-wrap: break-word;'>"; 
}
// Hvis URL'en er startsiden, vises et udvidet chatrum, uden mulighed for at skrive
if($host == 'devmch.online/chat_room.php'){
    echo "<br><br>
    <div class='main-content' style='position: relative;'>
    <div class='chatbox-container chat-scale' style='margin-bottom: 0;bottom: 45px;'>"; // ! Lånt chat-scale css
    echo "<div class='chatbox' id='chatbox' style='font-weight: 200;color:white; white-space: normal; overflow: auto; word-wrap: break-word;'>";
} 


// ! Lånt kode
// !
// Hvis man er på forsiden af chatrummet, vises en besked om at vælge et rum, sammen med ingen mulighed for at skrive
if($host == 'devmch.online/chat_room.php' && $_SESSION['useruid']){
    echo "Vælg et rum for at begynde, eller <a class='creat' href='/invite.php'> lav et nyt.</a><br>";
}

// * Selv-lavet kode
// *

// Brugeren skal autoriseres, for at kunne skrive i chatrummet
// Ellers skal resten af kode undviges med die(), og skrive, at man ikke har adgang.
$authorized = false;
$session_user_id = $_SESSION['useruid'];
// Hvis ens eget id matcher en af chatrummets brugerid, er man autoriseret
if ($session_user_id == $user_from_id || $session_user_id == $user_to_id) {
    $authorized = true;

    // Udskriv informationer til debugging
    if(isset($_SESSION['useruid']) && $host != 'devmch.online/chat_room.php') {
        echo "<h1 style='color: #fff; opacity:0.25;font-weight:200;pointer-events: none;text-align:left;font-size:18px'>$chat_room_name<br></h1>";
        echo "<h1 style='color: #fff; opacity:0.25;font-weight:200;pointer-events: none;text-align:left;font-size:18px'>$user_from_id & $user_to_id<br><br><br></h1>";
    }
}
if (!$authorized  && $host != 'devmch.online/chat_room.php') {
    die("Du har ikke adgang til denne chat.");
}

// Henter alle beskeder fra chatrummet, chatrummet er chat_room_id
// Til at vise beskederne
$stmt2 = $conn->prepare("SELECT * FROM messages WHERE inboxid = :inboxid");
$stmt2->bindParam(':inboxid', $chat_room_id);
$stmt2->execute();
$rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);


// Hvis der er flere rækker i databasen, og URL'en ikke er startsiden, gøres følgende
if(count($rows) > 0 && $host != 'devmch.online/chat_room.php') {

    // Verificere, at session bruger er den samme som en bruger fra chatten
    // ellers skal den ikke vise beskederne, men i stedet skrive, at de ikke har adgang til chatten.
    if($uuid == $user_from_id || $uuid == $user_to_id){
        // For hver række, udskriv beskederne i chatrummet, hvor id'en matcher chatrummet
        foreach($rows as $row) {
            // ! Lånt linjekode
            // !
            $date = new DateTime($row['timestamp']); // Tidspunkt  
            $msg = htmlspecialchars($row["message"], ENT_QUOTES); // Splitter beskeder i multiline og undgår XSS 

            // Laver linebreak som i database, og laver links klikbare
            $msg = nl2br($msg);
            $msg = preg_replace('/(<\/?\w+(?:(?!<\/?\w+>).)*>|^)\K((?:https?:\/\/)[^\s<>"\']+(?:\([\w\d]+\)|[^<>"\'()\[\]\s]))/i', '$1<a class="chatlink" href="$2" target="_blank" rel="noopener noreferrer">$2</a>', $msg);

            // * Selv-lavet kode
            // *
            // Sender farver
            $sender_id = $row['user_id']; // Sender ID

            $stmt = $conn->prepare("SELECT usersColor FROM users WHERE usersUid = :usersUid");
            $stmt->bindParam(':usersUid', $sender_id); 
            $stmt->execute();
            $row_color = $stmt->fetch(PDO::FETCH_ASSOC);
            $userColor = htmlspecialchars($row_color['usersColor']);

            // Udskriver beskederne
            echo "<div style='line-height: 1.5;'><a style='color: $userColor; font-weight:300;pointer-events: none;'>".$row["user_id"]. "</a> " ."<a style='opacity:0.15;pointer-events: none;font-weight:200'>" . $date->format('d/m'). "</a> " . " <div style='display: inline-grid;margin-bottom: 15px;'>" . $msg. "</div><br></div>";
        }
    } 
} else if(count($rows) == 0 && $host != 'devmch.online/chat_room.php') {
    // Hvis der er 0 rækker i messages databasen
    echo "<p style='color:white'>Der er ingen beskeder her endnu.</p>";

} 

echo "
</div>
</div>
</section>
";

// Tjekker igen, hvis brugerens id er det samme som chatrummets autoriserede id
// så skal den vise inputfeltet, til at skrive beskeder i, samt send knappen
if($_SESSION['useruid'] == $user_from_id || $_SESSION['useruid'] == $user_to_id) {
    echo "<br><br>";
    echo "<div class='fixed-input main-content'>"; // ! Lånt fixed-input css
    echo "<form class='form' method='POST' action='message_submit.php' style='background-color: var(--b);border: none;' >"; 
    echo "<textarea type='textarea' id='messageid' name='input' class='input5' style='display:inline-block;height: 4rem' autocomplete='off' placeholder='Skriv en besked...'></textarea>";
    echo "  <input type='hidden' name='chat_room_id' value='$chat_room_id'>";
    echo "  <input type='hidden' name='chatToken' value='$ranid'>";
    echo "  <input type='hidden' name='chat_room_name' value='$chat_room_name'>";


    echo "    
    <button type='submit' id='msgbtn' value='Send' style='border:none;background:none'>
    
    <i id='iconbtn' class='fa-regular fa-paper-plane fa-xl icon-placement' style='
        font-weight:900;
        float: right;
        position: absolute;
        background: none;
        color:white;
        align-items: flex-end;
        top: 2rem;
    '></i>
    </button>"; 

    echo "</form>";
    echo "</div>";
}

}
// Hvis brugeren ikke er logget ind, skal den vise en besked om at logge ind
else {
    echo "</div>";
    echo "<div class='aalign'>";
    echo "<p style='margin-top: 25px;'>Log på for at skrive og se beskeder!</p>";
    
    echo "<div style='text-align:center;margin-top: 2rem;'>";
    echo "<a href='/login.php'><button class='startclr'>Log på</button></a>";
    echo "</div>";

    }
?>

</div>
<!-- loader i starten -->
<div id="preloader" class="loader"></div>
<script src="/scripts/chat.js"></script>

<?php
    include_once 'db/includes/footer.php';

    $conn->close();
?>