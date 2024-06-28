<?php
header('Content-Type: application/json');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/php-error.log'); // Assicurati di impostare il percorso corretto per il file di log degli errori

$servername = "localhost";
$username = "programmazioneweb";  // Cambia se il tuo username è diverso
$password = "";      // Cambia se la tua password è diversa
$dbname = "my_programmazioneweb";  // Sostituisci con il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die(json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error)));
}

// Recupera i dati dal corpo della richiesta
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['codice'])) {
    $codice = $data['codice'];

    // Prepara la dichiarazione per eliminare l'ospedale
    $stmt = $conn->prepare("DELETE FROM ospedale WHERE codice = ?");
    $stmt->bind_param("i", $codice);
    
    if ($stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Errore durante l\'eliminazione: ' . $stmt->error));
    }
    $stmt->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
}

$conn->close();
?>
