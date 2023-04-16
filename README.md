# Nivelo

Hos Nivelo kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.



## Afprøv hjemmesiden
For at afprøve Nivelo, skal du gøre følgende:

1. Besøg Nivelo's hjemmeside på www.devmch.online og klik på "Tilmeld" knappen.
2. Indtast dit navn, e-mailadresse, brugernavn og opret en adgangskode.
3. Når du har tilmeldt dig, kan du gå til chatrummet, eller oprette et nyt chatrum ved at klikke på "Opret nyt rum".
4. Giv din chat et navn og inviter din modpart til at skrive, ved at indtaste deres brugernavn.
5. Når chatrummet er oprettet, kan det findes inde i "Chatrum", i navigationsbaren. Her kan chatrummet tilgås ude i højre side.
6. Du kan nu sende beskeder med modparten! Vær sikker på, at brugernavnet på modparten er det rigtige.

Udover at oprette chatrum kan du også tilpasse din profil ved at ændre chatfarve, navn og e-mailadresse. For at gøre dette skal du blot klikke på "Konto" i navigationsbaren.



## Dokumentation

Følgende fil skaber forbindelse til databasen (db/includes/dbh.inc.php):

```db/includes/dbh.inc.php

<?php

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}


```



## Lokal opsætning af hjemmesiden
Dette er, hvordan man kan opsætte en PHP side lokalt gennem XAMPP på en computer. Vi forklarer også, hvordan man kan importere database-strukturen.

### 1. Download XAMPP
XAMPP er en open source softwarepakke. Denne pakke kan bruges til at oprette en lokal webserver på din egen computer.

Gå til https://www.apachefriends.org/index.html og klik på download knappen.
Kør installationen.

### 2. Start Apache og MySQL servere
Når XAMPP er blevet installeret, skal du starte Apache og MySQL servere, for at oprette en lokal webserver.

Åbn XAMPP Control Panel.
Klik på Start knappen ved siden af Apache og MySQL servere.

### 3. Importer databasen
For at kunne bruge databasen, som PHP siden bruger, skal den importeres til MySQL serveren.

1. Download filen med database-strukturen fra dette link: https://github.com/mch-sg/webportal-exam/blob/main/u463909974_portal.sql.
2. Åbn PHPMyAdmin i browser, ved at skrive http://localhost/phpmyadmin/ i URL'en.
3. Opret en ny database med navnet "u463909974_portal"
4. Vælg "Import" fanen
5. Vælg "Vælg fil", og vælg filen med database-strukturen
6. Vælg "Go" knappen nederst på siden
7. Nu er databasen importeret

### 4. Kopier koden til htdocs mappen
1. Download koden
2. Indlæg filen til C:\xampp\htdocs mappen

### 5. Åbn siden i din browser
1. Åbn din webbrowser
2. Indtast følgende i adresselinjen: http://localhost/<stien til siden>/index.php

Nu skulle siden gerne være tilgængelig i din browser.
