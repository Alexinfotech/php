<?php
function connessioneNavigatore(){
    $host="31.190.110.70:3306";
    $usrname="navigatore";
    $password="%";
    $namedb="php";

    $conn=mysqli_connect($host,$usrname,$password,$namedb);
    if(!$conn){
        die("connessione fallita: " . mysqli_connect_error());
    }
    return $conn;
}

function connessioneAmministratore(){
    $host = "31.190.110.70:3306";
    $usrname = "alex";
    $password = "tmax2011";
    $namedb = "php";

    $conn = mysqli_connect($host, $usrname, $password, $namedb);
    if(!$conn){
        die("connessione fallita: " . mysqli_connect_error());
    }
    return $conn;
}
?>
