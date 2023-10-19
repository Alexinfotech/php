<?php 
if(isset($_GET['error']) && $_GET['error'] == 'passwordMismatch') {
    echo "<p style='color:red;'>Le password inserite non coincidono!</p>";
}
?>
<html>
<body>
<h1>Registrati</h1>
<form action="../controller/registrazione.php" method="post">

        <label for="nome">Nome</label>
        <input type="text"  id="nome" name="nome" required>

        <label for="cognome">Cognome</label>
        <input type="text"  id="cognome" name="cognome" required><br><br>

        <label for="data_nascita">Data di nascita:</label>
        <input type="date" id="data_nascita" name="data_nascita" required max="<?php echo date("Y-m-d"); ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email"  id="email" name="email" required>
    
        <label for="password">Password:</label>
        <input type="password"  id="password" name="password" required><br><br>

        <label for="confermaPassword">Conferma Password:</label>
        <input type="password" id="confermaPassword" name="confermaPassword" required><br><br>

   
        <input type="submit"  value="Registrati"><br><br>

       <a href ="login.html">Login</a>
    </body>
</html>


