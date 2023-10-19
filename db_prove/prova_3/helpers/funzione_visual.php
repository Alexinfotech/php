<?php
include '../config/conn_db.php';


function fetch_employee_details($id, $percorso = "") {
    global $conn;
    
    $sql = "select nome, cognome, ruolo from dipendenti where id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "Nome: " . $row['nome'] . "<br>";
        echo "Cognome: " . $row['cognome'] . "<br>";
        echo "Ruolo: " . $row['ruolo'] . "<br>";
        
        if (!empty($percorso)) {
            $href = sprintf($percorso, $id);
            echo "<br><a href='$href'>Modifica questo record</a>";
        }
    } else {
        echo "Nessun record trovato con questo ID.";
    }
}


?>
