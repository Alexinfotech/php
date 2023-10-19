<?php
$host="31.190.92.36:3306";
$username="dipendenti";
$password="dipendenti";
$namedb="php";

$conn= mysqli_connect($host,$username,$password,$namedb);
if(!$conn) {
    die("connessione fallit" . mysqli_connect_error());
}

$sql= "select * from dipendenti";
$estrazione = mysqli_query($conn,$sql);

if(mysqli_num_rows($estrazione) > 0){
    echo "<table border='3'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Ruolo</th></tr>"; 
    while ($row = mysqli_fetch_assoc($estrazione)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>"; 
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['cognome'] . "</td>";
        echo "<td>" . $row['ruolo'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun risultato trovato.";
}
mysqli_close($conn);
?>
<html>

<body>
    <br>
   
    <a href="index.html">Torna al Menu</a><br><br>
</body>
</html>