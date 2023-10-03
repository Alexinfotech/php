<?php
include 'conn_db.php';

$conn = connessione();

$sql = "SELECT * FROM dipendenti";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Stipendio</th></tr>";
    while($riga = mysqli_fetch_assoc($result)) {
        echo "<tr><td>". $riga["id"] ."</td><td>". $riga["nome"]. "</td><td>" . $riga["cognome"]. "</td><td>" . $riga["stipendio"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nessun record trovato";
}

mysqli_close($conn);
?>
<html>
<form action="index.php" method="post">
    <input type="submit" value="Menu">

</html>