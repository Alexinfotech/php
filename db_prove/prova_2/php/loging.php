<?php 

$root_pass = isset($_POST['root_password']) ? $_POST['root_password'] : null;

include 'conn_db.php';
$email = $_POST['email'];
$password = $_POST['password'];

$conn = connessione();

$sql = "SELECT * FROM utenti WHERE email='$email' AND password='$password'";
$risultato = mysqli_query($conn, $sql);

    if (mysqli_num_rows($risultato) > 0) {
        $row = mysqli_fetch_assoc($risultato);
        $IDutente = $row['id'];
        $nome = $row['nome'];
        $cognome = $row['cognome'];
    
        $sqlR = "SELECT root_password FROM utenti_root WHERE user_id = $IDutente";
        $risultatoR = mysqli_query($conn, $sqlR);
    
        if (mysqli_num_rows($risultatoR) > 0) {
            $rootDato = mysqli_fetch_assoc($risultatoR);
            
            if ($rootDato['root_password'] === $root_pass) {
                echo "Autenticazione come amministratore riuscita.";
                
                mysqli_close($conn);
                
                $conn = connessione(true);
                
                header("Location: ../html/tessera_att.php?nome=$nome&cognome=$cognome&admin=true");
                exit;
            } else {
                echo "Autenticazione come amministratore fallita.";
                header("Location: ../html/tessera_att.php?nome=$nome&cognome=$cognome");
                exit;
            }
        } else {
            sleep(2); 
            header("Location: ../html/tessera_att.php?nome=$nome&cognome=$cognome");
            exit;
        }
    } else {
        echo "Email o password non valide.";
    }

?>
