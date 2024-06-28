<?php
$servername = "localhost";
$username = "programmazioneweb";  // Cambia se il tuo username è diverso
$password = "";      // Cambia se la tua password è diversa
$dbname = "my_programmazioneweb";  // Sostituisci con il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$sql = "SELECT * FROM cittadino";  
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
