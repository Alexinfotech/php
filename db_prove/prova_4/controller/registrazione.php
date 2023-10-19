<?php
include '../config/conn_db.php';

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data_nascita=$_POST['data_nascita'];
$data_iscrizione= date('Y-m-d');
$email = $_POST['email'];
$password = $_POST['password'];
$confermaPassword = $_POST['confermaPassword'];
if ($password !== $confermaPassword) {
    header("Location: ../public/index.php?error=passwordMismatch");
    exit(); 
}

$conn = connessioneNAvigatore();

$sql = "insert into utenti (nome, cognome, data_nascita,data_iscrizione, email, password) values ('$nome', '$cognome','$data_nascita','$data_iscrizione', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "Registrazione completata con successo!";
    header("Refresh: 2; ../public/login.html");

} else {
    echo "Errore: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
