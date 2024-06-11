<?php
$servername = "localhost";
$username = "root";  // Cambia se il tuo username è diverso
$password = "";      // Cambia se la tua password è diversa
$dbname = "progettoweb";  // Sostituisci con il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
$direttore = $_POST['direttoreSanitario'];
$sql = "SELECT codice,nome,citta,indirizzo,direttoreSanitario FROM ospedale WHERE direttoreSanitario=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $direttore); // "s" indica un parametro stringa
$stmt->execute();
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} 

echo json_encode($data);

$conn->close();
?>
