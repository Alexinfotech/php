<?php
include 'conn_db.php';
$conn = connessione();

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Ti sei tesserato con successo";
    sleep(2); 
    header('Location: ../html/loging.html');
} else {
    if (mysqli_errno($conn) == 1062) {
        echo "L'email inserita è già stata utilizzata. Per favore, prova con un'altra email.";
        sleep(2); 
        header('Location: ../html/index.html');
} else {
    echo "Errore: " . $sql . "<br>" . mysqli_error($conn);
}
}

mysqli_close($conn);
?>
