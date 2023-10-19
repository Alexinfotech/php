
<?php
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo=$_POST['ruolo'];
$host="31.190.92.36:3306";
$username="dipendenti";
$password="dipendenti";
$namedb="php";

$conn= mysqli_connect($host,$username,$password,$namedb);
if(!$conn) {
    die("connessione fallito" . mysqli_connect_error());
}

$sql= "insert into dipendenti(nome,cognome,ruolo) values ('$nome','$cognome','$ruolo')";
if(mysqli_query($conn, $sql)){
    $message2 = "Inserimento avvenuto con successo";
} else {
    $message2 = "Errore: " . $sql . mysqli_error($conn);
}

?>
<html>
<body>
    <h2><?php echo $message2; ?></h2>
</body>
</html>
<?php
$sql = "select * from dipendenti order by id desc limit 1";
$estrazione = mysqli_query($conn, $sql);

if (mysqli_num_rows($estrazione) > 0) {
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
?>
<html>
<body>
    <br><a href="../public/index.html">Torna al Menu</a><br><br>
</body>
</html>