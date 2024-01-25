<?php
require 'config.php';
require_once 'session.inc.php';
//is er een formulier verstuurd?
// --> check of de knop is verstuurd:
if (isset($_POST['verzend'])) {
    // lees alle velden uit en stop de waarden in variabelen
    $id = $_POST['idVeld'];
    $ond = $_POST['onderwerpVeld'];
    $inh = $_POST['inhoudVeld'];
    $begin = $_POST['begindatumVeld'];
    $eind = $_POST['einddatumVeld'];
    $prior = $_POST['prioriteitVeld'];
    $stat = $_POST['statusVeld'];

    // Maak een aanpas-query (let op de verschillende aanhalingstekens en spaties!)
$query = "UPDATE crud_agenda";
$query .= " SET Onderwerp = '{$ond}', Inhoud = '{$inh}', Begindatum = '{$begin}'";
$query .= ", Einddatum = '{$eind}', Prioriteit = {$prior}, Status = '{$stat}'";
$query .= " WHERE ID = {$id}";

// Voer de query uit en vang het 'resultaat' op
$result = mysqli_query($mysqli, $query);

// controleer of het is gelukt
if ($result) {
    echo "Het item is aangepast<br/>";
} else {
    echo "FOUT bij aanpassen:<br/>";
    // echo $query . "<br/>"; // Tijdelijk (!) de query tonen
    // echo mysqli_error($mysqli); // Tijdelijk (!) de foutmelding tonen
}

echo "<br/><br/><a href='toonagenda.php'>OVERZICHT</a>";
}
