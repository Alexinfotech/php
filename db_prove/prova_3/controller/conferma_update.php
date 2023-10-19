<?php
include '../helpers/funzione_visual.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $percorso = "id_confermato.php?id=%s";
    
    fetch_employee_details($id, $percorso);
} else {
    echo "ID non fornito.";
}

mysqli_close($conn);
?>
<html>
    <body>
    <br><br><br><a href="../public/index.html">Torna al Menu</a><br><br>

    </body>
</html>