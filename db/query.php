<?php
include 'conn_db.php';
function eseguiQuery() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['azione'])) {
        $conn = connessione();
        $azione = $_POST['azione'];

        switch ($azione) {
            case 'insert':
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $stipendio = $_POST["stipendio"];
            
                $sql = "INSERT INTO dipendenti (nome, cognome, stipendio) VALUES ('$nome', '$cognome', '$stipendio')";
            
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                break;

            case 'delete':
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
            
                $sql = "DELETE FROM dipendenti WHERE nome = '$nome' AND cognome = '$cognome'";
            
                if (mysqli_query($conn, $sql)) {
                    if(mysqli_affected_rows($conn) > 0) {
                        echo "Record eliminato con successo";
                    } else {
                        echo "Nessun record corrispondente trovato";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                break;
            case 'update':
                $nome = $_POST["nome"];
                $cognome = $_POST["cognome"];
                $stipendio = $_POST["stipendio"];
            
                $sql = "UPDATE dipendenti SET stipendio = '$stipendio' WHERE nome = '$nome' AND cognome = '$cognome'";
            
                if (mysqli_query($conn, $sql)) {
                    if(mysqli_affected_rows($conn) > 0) {
                        echo "Record aggiornato con successo";
                    } else {
                        echo "Nessun record corrispondente trovato";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                break;
           
        }

        mysqli_close($conn);
    }
}

?>