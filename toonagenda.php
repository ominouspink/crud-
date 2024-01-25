<?php
//Voeg de database-verbinding toe
require 'config.php';
//Maak de query
$query = "SELECT * FROM crud_agenda";
//Voer de query uit, en vang het resultaat op
$result = mysqli_query($mysqli, $query);
if (!$result){
    echo "<p> FOUT!</p>";
    echo "<p> " . $query . "<p>";
    echo "<p> ".mysqli_error($mysqli). "<p> ";
    exit;
}
//Als er records zijn
if (mysqli_num_rows($result) > 0)
{
    echo "<table style='border: 2px solid black; border-collapse: collapse;'>";

    while ($item = mysqli_fetch_assoc($result)) {
      
        echo "<tr style='background-color: #f0f0f0;'>";
  
        echo "<td style='border: 1px solid black; padding: 10px; background-color: #507a87; color: white;'>" . $item['Onderwerp'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 10px; background-color: #ADD8E6;'>" . $item['Inhoud'] . "</td>";
        echo "<td style='border: 1px solid black; padding: 10px; background-color: white;'><a href='detail.php?id=" . $item['ID'] . "'>detail</a></td>";
        echo "<td style='border: 1px solid black; padding: 10px; background-color: white;'><a href='verwijder.php?id=" . $item['ID'] . "'>verwijder</a></td>";
        echo "<td style='border: 1px solid black; padding: 10px; background-color: white;'><a href='pasaan.php?id=" . $item['ID'] . "'>aanpassen!</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}
//Als er geen records zijn
else
{
    echo "<p>Geen items gevonden. Gaap..</p>";
}
?>
