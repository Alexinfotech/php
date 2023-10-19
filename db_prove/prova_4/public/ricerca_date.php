<?php 
session_set_cookie_params(60, "/"); 
session_start();


include '../config/conn_db.php';

if (!isset($_SESSION['email'])) {
    
    header('Location: login.html');
    exit();
}
?>
<html>

<form action="../controller/ricerca_date.php" method="post">
    <label for="datain">Inserisci data iniziale:</label>
    <input type="date" id="datain" name="datain" required max="<?php echo date("Y-m-d"); ?>">
    <br><br>

    <label for="datafin">Inserisci data finale:</label>
    <input type="date" id="datafin" name="datafin" required max="<?php echo date("Y-m-d"); ?>">
    <br><br>

    <input type="submit" value="Mostra Email">
</form>

<br>
<form action="../controller/amministratore.php" method="post">
    <input type="submit" value="Amministratore">
    </form>
    </form>
    <br><form action="../controller/logout.php" method="post">
    <input type="submit" value="Esci">
</form>
</body>
</html>
<?php 