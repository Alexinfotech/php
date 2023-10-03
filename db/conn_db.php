<?php
function connessione(){
$servername = "31.190.92.36";
$username = "alex";
$password = "tmax2011";
$dbName = "php";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}
echo "Connessione avventuta con successo";
return $conn;
}


//REQUISISTI/menu con:inserimento/update/eleminiazioen/select/TABELLA PERSONE/NOME/COGNOME /STIPENDIO
//OGNI PAGINA DEL MENU AVRà UN FORM
?>
