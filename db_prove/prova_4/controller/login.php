<?php
session_set_cookie_params(60, "/"); 
session_start();
include '../config/conn_db.php';

$email = $_POST['email'];
$parolaChiave = $_POST['password'];
$parolaChiaveAmministratore = $_POST['root_password'];


$connessione = connessioneNavigatore();

$risultato = mysqli_query($connessione, "select * from utenti where email='$email'");
$utente = mysqli_fetch_assoc($risultato);

if ($utente && $utente['password'] == $parolaChiave) {
    $_SESSION['nome'] = $utente['nome'];
    $_SESSION['email'] = $utente['email'];
    
    if ($parolaChiaveAmministratore) {
        $risultatoAmministratore = mysqli_query($connessione, "select root_password from utenti_root where user_id=" . $utente['id']);
        $utenteAmministratore = mysqli_fetch_assoc($risultatoAmministratore);

        if ($utenteAmministratore && $utenteAmministratore['root_password'] == $parolaChiaveAmministratore) {
            mysqli_close($connessione);  
            
        
            $connessione = connessioneAmministratore();
            if (!$connessione) {
                die("Errore nella connessione come amministratore");
            }

            header('Location: amministratore.php');
        } else {
            echo "Parola chiave dell'amministratore non valida.";
        }
    } else {
        header('Location: navigatore.php');
    }
} else {
    echo "Credenziali non valide.";
}

mysqli_close($connessione);
?>
<html>
    <body>
    <form action="logout.php" method="post">
    <input type="submit" value="Esci">
</form>

    </body>
</html>