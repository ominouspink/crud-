<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
$db_hostname = 'localhost';
$db_username = 'ominous_db88137';
$db_password = 'MeowhihiJippie';
$db_database = 'ominous_school';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// if (!$mysqli) {
//     echo "fout: geen databse connectie";
//     echo "error: " . mysqli_connect_error();
//     exit;
// }

// else {
//     echo "verbinding met " . $db_database . "is gemaakt";
// }