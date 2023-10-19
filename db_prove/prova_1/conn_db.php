<?php
function connessione(){
$ip = "31.190.92.36:3306";
$user = "alex";
$password = "tmax2011";
$db= "php";
$conn = mysqli_connect($ip, $user, $password, $db);
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}
echo "Connessione avventuta con successo";
return $conn;
}


//REQUISISTI/menu con:inserimento/update/eleminiazioen/select/TABELLA PERSONE/NOME/COGNOME /STIPENDIO
//OGNI PAGINA DEL MENU AVRà UN FORM
?>
