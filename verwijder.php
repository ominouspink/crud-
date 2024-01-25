<?php
require_once 'session.inc.php';
$id = $_GET['id'];

if ($id !=""){
    echo "Verwijder item met ID: " . $id . "<br/>";
    echo "<p>Weet je het zeker?</p>";
    echo "<a href='verwijder_verwerk.php?id={$id}'> JA </a> <br/><br/>";
}

else{
    echo "Geen ID gevonden...<br/>";
}
// Terug naar het overzicht
echo "<a href='toonagenda.php'>OVERZICHT</a>";