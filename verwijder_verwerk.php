<?php
// Voeg de database-verbinding toe
require 'config.php';
require_once 'session.inc.php';
$id = $_GET['id'];
if ($id !=""){
    echo "Item met ID " . $id . " wordt verwijderd...<br/>";
    // Maak de query om het item te verwijderen
    $query = "DELETE FROM crud_agenda WHERE ID = " . $id;
    // Voer de query uit, en vang het 'resultaat' op
    $result = mysqli_query($mysqli, $query);
    // Als het is gelukt:
    if ($result) {
        echo "Het item is verwijderd<br/>";
    }
    // Anders:
    else {
        echo "FOUT bij verwijderen<br/>";
        // echo $query . "<br/>"; // Tijdelijk (!) de query tonen
        // echo mysqli_error($mysqli); // Tijdelijk (!) de foutmelding tonen
    }
    
}else {
    echo "Het gaat allemaal niet goed (geen id gevonden)<br/>";
}// Terug naar het overzicht
echo "<a href='toonagenda.php'>OVERZICHT</a>";
