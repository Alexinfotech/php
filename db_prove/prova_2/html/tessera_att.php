<?php
$nome = $_GET['nome'] ?? 'Nome non trovato';
$cognome = $_GET['cognome'] ?? 'Cognome non trovato';
$isAdmin = isset($_GET['admin']) && $_GET['admin'] == 'true';

?>

<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loggati</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .flip-card {
            background-color: transparent;
            width: 600px;
            height: 400px;
            perspective: 1500px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 2s;
            transform-style: preserve-3d;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            overflow: hidden;
        }

        .flip-card-front {
            background-color: #FECB00;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 60px;
        }

        .flip-card-back {
            background-color: #0055A5;
            color: #FFF;
            transform: rotateY(180deg);
            padding: 60px;
        }

        .form-group label {
            font-weight: bold;
            color: #FECB00;
        }
        .login-btn {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 30px;
            background-color: #0055A5;
            color: #FECB00;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #003f8a;
        }

    </style>
</head>
<body>
   
<div class="flip-card">
    <div class="flip-card-inner">
        <div class="flip-card-front">
            <h1>Salve</h1>
        </div>
        <div class="flip-card-back">
    <?php if ($isAdmin) : ?>
        <h1><?php echo $nome . "<br><br> " . $cognome . "<br><br>AMMINISTRATORE"; ?></h1>
    <?php else : ?>
        <h1><?php echo $nome . "<br><br> " . $cognome.  "<br><br>LETTORE"; ?></h1>
    <?php endif; ?>
</div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<button class="login-btn btn-outside" onclick="location.href='index.html'">Esci</button>



</body>
</html>
