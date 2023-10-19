<?php 
function connessione($isAdmin = false) {
    $host = '31.190.92.36:3306';
    $dbname = 'php';

    if ($isAdmin) {
        $username = 'alex'; 
        $password = 'tmax2011'; 
    } else {
        $username = 'utente_lettura';
        $password = 'lettore';
    }

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }
    
    return $conn;
}

?>