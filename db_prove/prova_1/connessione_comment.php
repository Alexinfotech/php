<!DOCTYPE html>
<!-- Specifica che il documento è di tipo HTML5 -->
<html lang="it">
<!-- Inizio del documento HTML. L'attributo 'lang' specifica la lingua del documento, in questo caso italiano. -->

<head>
    <meta charset="UTF-8">
    <!-- Specifica l'insieme di caratteri per il documento, in questo caso UTF-8. È essenziale per visualizzare correttamente i caratteri speciali. -->
    
    <title>Studenti</title>
    <!-- Il titolo del documento che appare nella barra del titolo o nella scheda del browser. -->

    <style>
        /* Questo è un tag di stile, dove definiamo gli stili CSS per migliorare l'aspetto dei nostri elementi HTML. */
        
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        /* Stilizzazione della tabella. 
             'border-collapse: collapse;' assicura che i bordi della tabella siano combinati in un unico bordo.
             'width: 80%;' imposta la larghezza della tabella all'80% del suo contenitore.
             'margin: 20px auto;' centra la tabella e le assegna un margine superiore e inferiore di 20px. */
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        /* Stilizzazione delle intestazioni della tabella (th) e dei dati della tabella (td).
             Ogni cella ha un bordo, un padding e un testo allineato a sinistra. */
        
        th {
            background-color: #f2f2f2;
        }
        /* Assegna un colore di sfondo grigio chiaro alle intestazioni della tabella per una migliore visibilità e distinzione. */
        
    </style>
</head>

<body>
    <!-- Il tag body contiene il contenuto del documento, che verrà visualizzato dal browser. -->

    <?php
    // Inizio del segmento di codice PHP.

    displayStudents();
    // Chiamata della funzione 'displayStudents' per eseguirne il contenuto.

    function displayStudents() {
        // Definizione di una nuova funzione PHP chiamata 'displayStudents'.

        $serverName = "localhost";
        // L'indirizzo del server. 'localhost' indica che il database si trova sullo stesso server di questo script.
        
        $username = "root";
        // Username dell'utente del database.
        
        $password = "";
        // Password per l'utente del database. Qui è vuota, cosa non consigliata in ambienti di produzione.
        
        $dbName = "mysql";
        // Nome del database a cui ci stiamo connettendo.

        $connection = new mysqli($serverName, $username, $password, $dbName);
        // Creazione di una nuova istanza della classe 'mysqli' per connettersi al database. 
        // Richiede come argomenti l'indirizzo del server, l'username, la password e il nome del database.

        if ($connection->connect_error) {
            // La proprietà 'connect_error' dell'oggetto 'mysqli' verifica la presenza di errori di connessione.

            die("Connessione fallita: " . $connection->connect_error);
            // In caso di errore, 'die' termina lo script e stampa un messaggio di errore.
        }

        $sql = "SELECT id, nome, cognome, matricola, email, telefono FROM studenti";
        // Query SQL memorizzata come stringa. Recupera i dati dalla tabella 'studenti'.

        $result = $connection->query($sql);
        // Il metodo 'query' dell'oggetto 'mysqli' esegue la query SQL e restituisce il risultato.

        if ($result && $result->num_rows > 0) {
            // Verifica se il risultato esiste e ha più di 0 righe.

            echo "<table>";
            // Echo viene utilizzato per stampare contenuti. Qui inizia la tabella HTML.

            echo "<tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Matricola</th><th>Email</th><th>Telefono</th></tr>";
            // Definizione delle intestazioni della tabella.

            while ($row = $result->fetch_assoc()) {
                // Il metodo 'fetch_assoc' recupera ogni riga come un array associativo.
                // Il ciclo while continua fintanto ci sono righe nel risultato.

                echo "<tr>";
                // Inizio di una nuova riga nella tabella.

                // Per ogni colonna nella riga, stampiamo i dati all'interno dei tag dei dati della tabella.
                // Utilizziamo 'htmlspecialchars' per convertire i caratteri speciali nelle loro entità HTML per prevenire potenziali attacchi XSS.
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["cognome"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["matricola"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["telefono"]) . "</td>";

                echo "</tr>";
                // Fine della riga corrente.
            }
            echo "</table>";
            // Fine della tabella HTML.
        } else {
            echo "0 risultati";
            // Se non ci sono risultati o 0 righe, viene stampato questo messaggio.
        }

        $connection->close();
        // Il metodo 'close' dell'oggetto 'mysqli' chiude la connessione al database.
    }
    // Fine della funzione 'displayStudents'.

    ?>
    <!-- Fine del segmento di codice PHP. -->

</body>
<!-- Fine della sezione body del documento HTML. -->
</html>
<!-- Fine del documento HTML. -->
