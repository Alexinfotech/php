<?php
session_set_cookie_params(60, "/"); 
session_start();

if (!isset($_SESSION['email'])) {
    
    header('Location: login.html');
    exit();
}
include '../config/conn_db.php';
echo "Benvenuto Amministratore, " . $_SESSION['nome'] . "!<br><br>";
?>
<html>
    <body>
<form action="iscritti.php" method="post">
    <input type="submit" value="Mostra utenti iscritti">
    </form>
    <br><form action="../public/ricerca_date.php" method="post">
    <input type="submit" value="Ricerca per date">
    </form>
    <br><form action="logout.php" method="post">
    <input type="submit" value="Esci">
</form>
    </body>
</html>