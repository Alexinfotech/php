<?php
session_set_cookie_params(60, "/"); 
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.html');
    exit();
}

echo "Benvenuto Navigatore, " . $_SESSION['nome'] . "!";
?>
<html>
    <body>
    <form action="logout.php" method="post">
    <input type="submit" value="Esci">
</form>

    </body>
</html>