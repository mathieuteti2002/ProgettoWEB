<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direttore Sanitario</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>

</head>
<body>
    <header>
        <!--<h1>Servizio Sanitario</h1>-->
		<img src="img/servizio_sanitario.png" height="100" width="600">
		<img class="right-image" src="img/ospedale2.png" height="100" width="100">
		<img class="left-image" src="img/home.png" height="100" width="100">
    </header>
   <div class="container">
	<div class="left-sidebar">
		<!-- Qui mettiamo i filtri da ricerca -->
		<h2>Filtro Ricerca</h2>
		<form method="post">
			<input type="hidden" name="source" value="Ospedale">
			<input type="text" placeholder="Cerca..." name="codice" id="ricerca" class="codice" onkeyup="filtra()">
		</form>
		
	</div>
	<div class="content">
	<div class="contentDirettore">
		<!-- Qui mettiamo i Contenuti/risultati -->
		<h2>Direttore Sanitario</h2>
		<table id="tabella">
			<tr>
				<th>Codice</th>
				<th>Nome</th>
				<th>Città</th>
				<th>Indirizzo</th>
				<th>Direttore Sanitario</th>
			</tr>
			<tbody>
                <?php
                // Connessione al database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "progettoweb";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Controlla la connessione
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }

                // Recupera il parametro CSSN dalla URL
                $cssn = isset($_GET['CSSN']) ? $_GET['CSSN'] : '';

                if (!empty($cssn)) {
                    // Prepara la query SQL
                    $sql = "SELECT codice, nome, citta, indirizzo, direttoreSanitario FROM ospedale WHERE direttoreSanitario=?";
                    $stmt = $conn->prepare($sql);
                    
                    // Associa il parametro
                    $stmt->bind_param("s", $cssn);
                    
                    // Esegui la query
                    $stmt->execute();
                    
                    // Ottieni i risultati
                    $result = $stmt->get_result();

                    // Costruisci le righe della tabella HTML
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['codice']}</td>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['citta']}</td>
                                    <td>{$row['indirizzo']}</td>
                                    <td>{$row['direttoreSanitario']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nessun risultato trovato.</td></tr>";
                    }

                    // Chiudi la query
                    $stmt->close();
                } else {
                    echo "<tr><td colspan='5'>Parametro CSSN mancante.</td></tr>";
                }

                // Chiudi la connessione
                $conn->close();
                ?>
            </tbody>	
		</table>
	</div>
	</div>
	<div class="right-navbar" >
		<a href="index.html" ><input type="button" value="Home"></a><br><br>
		<a href="Ospedale_direttore.php"><input type="button" value="Direttore" class="active"></a><br><br>
		<a href="Ospedale.php"><input type="button" value="Ospedale"></a><br><br>
		</div>    
   </div>
    </div>
    <footer>
        <!-- Contenuto del footer -->
        <p>Programmazione Web 2023/2024 - Teti, Bonfanti, Selmani</p>
    </footer>
</body>
</html>

