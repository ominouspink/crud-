<?php
session_start();
require 'config.php'; 

if (isset($_POST['submit'])) {
    
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $hashed_password = sha1($password);

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
 
        header('Location: toonagenda.php');
        exit;
    } else {
       
        header('Location: inlog.php');
        exit;
    }
}
?>
