<html>
    
</head>
<body>

<h2>Interagisci con il tuo Database</h2>

<form action="" method="post">
    <label for="azione">Scegli un'azione:</label>
    <select name="azione" required>
        <option value="insert">Inserisci</option>
        <option value="delete">Elimina</option>
        <option value="update">Aggiorna</option>
    </select><br><br>

    Nome: <input type="text" name="nome" required><br><br>
    Cognome: <input type="text" name="cognome" required><br><br>
    Stipendio: <input type="number" name="stipendio" step="0.01"><br><br>
    <input type="submit" value="Esegui">
</form>
<form action="select.php" method="post">
    <input type="submit" value="Visualizza Tabella">

<?php
include 'query.php';
eseguiQuery();

?>

</body>
</html>