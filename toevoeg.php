<?php
// Voeg de database-verbinding toe
require 'config.php';
require_once 'session.inc.php';
// Maak een toevoeg-query (let op de verschillende aanhalingstekens!)
$query = "INSERT INTO crud_agenda";
$query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
$query .= " VALUES ('PROCES2', 'ERD opdrachten afronden', '2022-10-20', '2022-10-27', 2, 'b')";

// Voer de query uit en vang het 'resultaat' op
// LET OP: het resultaat geeft aan of het wel of niet is gelukt ('true'/'false')
$result = mysqli_query($mysqli, $query);

// controleer of het is gelukt
if ($result) {
    echo "Het item is toegevoegd<br/>";
} else {
    echo "FOUT bij toevoegen<br/>";
    // Tijdelijk (!) de foutmelding tonen
    echo mysqli_error($mysqli);
}

// Terug naar het overzicht
echo "<a href='toonagenda.php'>OVERZICHT</a>";
?>
