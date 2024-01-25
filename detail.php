<?php
require 'config.php';

$id = $_GET['id'];

echo "ID van het agenda-item is: " . $id . "<br/>";
$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;

$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='border: 2px solid black; border-collapse: collapse;'>";
    $item = mysqli_fetch_assoc($result);
    echo "<table>";
   
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #507a87; color: white;'><th>Onderwerp</th><td>" . $item['Onderwerp'] . "</td></tr>";
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #ADD8E6;'><th>Inhoud</th><td>" . $item['Inhoud'] . "</td></tr>";
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #507a87; color: white;'><th>Begindatum</th><td>" . $item['Begindatum'] . "</td></tr>";
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #ADD8E6;'><th>Einddatum</th><td>" . $item['Einddatum'] . "</td></tr>";
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #507a87; color: white;'><th>Prioriteit</th><td>" . $item['Prioriteit'] . "</td></tr>";
    echo "<tr style='border: 1px solid black; padding: 10px; background-color: #ADD8E6;'><th>Status</th><td>" . $item['Status'] . "</td></tr>";
   
    echo "</table>";
}

else {
    echo "Er is geen record met ID: " . $id . "<br/>";
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";
?>
