<?php
if (!isset($_GET['id'])) {
    die('ID non fornito.');
}
$id = $_GET['id'];
?>
<html>
<body>
    <h1>Update</h1>
    <h3>Aggiornare i campi dell'ID <?php echo $id; ?></h3>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" required><br><br>

        <label for="ruolo">Ruolo:</label>
        <input type="text" id="ruolo" name="ruolo" required><br><br>

        <input type="submit" value="Invia">
    </form>
</body>
</html>
