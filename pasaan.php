<html>
    <head><title>Gegevens aanpassen</title></head>

    <body>

    
<?php
require 'config.php';
require_once 'session.inc.php';
$id = $_GET['id'];

$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;

$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table style='border: 2px solid black; border-collapse: collapse;'>";
    $item = mysqli_fetch_assoc($result);/////
    ?>
<form name="aanpasFormulier" method="post" action="pasaanVerwerk.php">
    <p>
    <input type="hidden" name="idVeld" value="<?php echo $item['ID'];?>">
</p>
        <p>
            <label for="onderwerpVeld">Onderwerp:</label>
            <input type="text" name="onderwerpVeld" value="<?= $item['Onderwerp'];?>">
        </p>
        <p>
            <label for="inhoudVeld">Inhoud:</label>
            <textarea id="inhoudVeld" name="inhoudVeld"><?= $item['Inhoud'];?></textarea>
        </p>
        <p>
            <label for="begindatumVeld">Begindatum:</label>
            <input type="date" id="begindatumVeld" name="begindatumVeld" value="<?= $item['Begindatum'];?>" >
        </p>
        <p>
            <label for="einddatumVeld">Einddatum:</label>
            <input type="date" id="einddatumVeld" name="einddatumVeld" value="<?= $item['Einddatum'];?>" >
        </p>
        <p>
            <label for="prioriteitVeld">Prioriteit:</label>
            <input type="number" id="prioriteitVeld" name="prioriteitVeld" min="1" max="5" value="<?= $item['Prioriteit'];?>" >
        </p>
        <p>
            <label for="statusVeld">Status:</label>
            <select id="statusVeld" name="statusVeld">
    <option value="">--Kies een status--</option>
    <option value="n" <?= $item['Status'] == 'n' ? 'selected' : ''; ?>>Niet begonnen</option>
    <option value="b" <?= $item['Status'] == 'b' ? 'selected' : ''; ?>>Bezig</option>
    <option value="a" <?= $item['Status'] == 'a' ? 'selected' : ''; ?>>Afgerond</option>
</select>

        </p>
        <p>
            <input type="submit" name="verzend" value="item aanpassen">
        </p>
    </form>

    <?php
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

echo "<br/><br/><a href='toonagenda.php'>OVERZICHT</a>";
?>
</body>
</html>
