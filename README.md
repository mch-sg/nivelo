# Nivelo

Hos Nivelo kan du frit kommunikere med dine udlånte selvstændige. Vi tilbyder en enkel og effektiv måde for brugere at kommunikere, dele feedback og holde sig organiseret i løbet af deres projekter.

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
