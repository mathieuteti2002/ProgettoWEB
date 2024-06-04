<?php
// Connetti al database
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "progettoweb";

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
}

// Inizializza variabili per i filtri
$codice = isset($_POST['codice']) ? $_POST['codice'] : '';
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$citta = isset($_POST['citta']) ? $_POST['citta'] : '';
$indirizzo = isset($_POST['indirizzo']) ? $_POST['indirizzo'] : '';
$taskOption = isset($_POST['taskOption']) ? $_POST['taskOption'] : '';

// Questa è la query SQL con i filtri
$query = "SELECT * FROM ospedale WHERE 1=1";

if ($codice != '') {
    $query .= " AND codice LIKE '%" . mysqli_real_escape_string($connection, $codice) . "%'";
}
if ($nome != '') {
    $query .= " AND nome LIKE '%" . mysqli_real_escape_string($connection, $nome) . "%'";
}
if ($citta != '') {
    $query .= " AND citta LIKE '%" . mysqli_real_escape_string($connection, $citta) . "%'";
}
if ($indirizzo != '') {
    $query .= " AND indirizzo LIKE '%" . mysqli_real_escape_string($connection, $indirizzo) . "%'";
}
if ($taskOption != '') {
    $query .= " AND CSSN = '" . mysqli_real_escape_string($connection, $taskOption) . "'";
}

// Esegui la query
$result = mysqli_query($connection, $query);

// Verifica se ci sono risultati
if (mysqli_num_rows($result) > 0) {
    // Stampa i dati in una tabella HTML
    echo "<table border='1'>";
    echo "<tr><th>Codice</th><th>Nome</th><th>Città</th><th>Indirizzo</th><th>CSSN</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['codice'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['citta'] . "</td>";
        echo "<td>" . $row['indirizzo'] . "</td>";
        echo "<td>" . $row['CSSN'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun risultato trovato.";
}

// Chiudi la connessione
mysqli_close($connection);
?>
