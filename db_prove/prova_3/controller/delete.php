<?php
if (!isset($_GET['id'])) {
    die('ID non fornito.');
}
$id = $_GET['id'];

$host="31.190.92.36:3306";
$username="dipendenti";
$password="dipendenti";
$dbname="php";


$conn= mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die("connessione fallita". mysqli_connect_error());
}

$sql="delete from dipendenti where id='$id'";
if(mysqli_query($conn,$sql)){
    $message="cancellazione avvenuta con successo";

}else{
    $message="errore: ". $sql . mysqli_error($conn);
}
?>
<html>
<body>
    <h2><?php echo $message; ?></h2>
</body>
</html>
<?php
$sql = "select * from dipendenti";
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