<?php

$servername = "31.190.92.36:3306";
$username = "dipendenti";
$password = "dipendenti";
$dbname = "php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
