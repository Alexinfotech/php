<?php 
session_set_cookie_params(60, "/"); 
session_start();
include '../config/conn_db.php';
if (!isset($_SESSION['email'])) {
    
    header('Location: login.html');
    exit();
}
$datain = $_POST['datain'];
$datafin = $_POST['datafin'];
$conn = connessioneAmministratore();  // 
$result = mysqli_query($conn, "SELECT email, data_iscrizione FROM utenti WHERE data_iscrizione BETWEEN '$datain' AND '$datafin';");

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Email</th><th>Data di Registrazione</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["data_iscrizione"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun risultato trovato.";
}

mysqli_close($conn);
?>
<html>
<br><form action="../controller/amministratore.php" method="post">
    <input type="submit" value="Amministratore">
    </form>

    <body>
    <br><form action="logout.php" method="post">
    <input type="submit" value="Esci">
</form>