<?php
// Voeg de database-verbinding toe
require 'config.php';
require_once 'session.inc.php';
// Controle op herkomst van het formulier
if (isset($_POST['verzend'], $_POST['onderwerpVeld'], $_POST['inhoudVeld'], $_POST['begindatumVeld'], $_POST['einddatumVeld'], $_POST['prioriteitVeld'], $_POST['statusVeld'])) {
    
    // lees alle velden uit en stop de waarden in variabelen
    $ond = trim($_POST['onderwerpVeld']);
    $inh = trim($_POST['inhoudVeld']);
    $begin = trim($_POST['begindatumVeld']);
    $eind = trim($_POST['einddatumVeld']);
    $prior = trim($_POST['prioriteitVeld']);
    $stat = trim($_POST['statusVeld']);

    // Controleer of de begindatum en einddatum wel echte datums zijn
    $begindatumIsValid = DateTime::createFromFormat('Y-m-d', $begin) !== false;
    $einddatumIsValid = DateTime::createFromFormat('Y-m-d', $eind) !== false;

    // Controleer of prioriteit een getal is tussen 1 en 5
    $prioriteitIsValid = filter_var($prior, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>5)));

    // Als de validaties kloppen, voer de query uit
    if ($begindatumIsValid && $einddatumIsValid && $prioriteitIsValid) {
        
        // Opschonen (sanitizing) van de input
        $ond = mysqli_real_escape_string($mysqli, $ond);
        $inh = mysqli_real_escape_string($mysqli, $inh);
        $begin = mysqli_real_escape_string($mysqli, $begin);
        $eind = mysqli_real_escape_string($mysqli, $eind);
        $prior = mysqli_real_escape_string($mysqli, $prior);
        $stat = mysqli_real_escape_string($mysqli, $stat);

        // Maak een toevoeg-query
        $query = "INSERT INTO crud_agenda (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status) ";
        $query .= "VALUES ('$ond', '$inh', '$begin', '$eind', $prior, '$stat')";

        // Voer de query uit
        $result = mysqli_query($mysqli, $query);
        if ($result) {
            echo "Het item is toegevoegd<br/>";
        } else {
            // Toon mysqli_error alleen tijdens development, niet op een live site
            echo "Er is een fout opgetreden bij het toevoegen: " . mysqli_error($mysqli) . "<br/>";
        }
    } else {
        echo "De ingevoerde gegevens zijn ongeldig.<br/>";
    }
} else {
    echo "Het formulier is niet (goed) verstuurd<br/>";
}
?>
