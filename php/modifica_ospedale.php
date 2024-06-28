<?php
header('Content-Type: application/json');

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

if (isset($data['codice']) && isset($data['nome']) && isset($data['citta']) && isset($data['indirizzo']) && isset($data['direttoreSanitario'])) {
    $codice = $data['codice'];
    $nome = $data['nome'];
    $citta = $data['citta'];
    $indirizzo = $data['indirizzo'];
    $direttoreSanitario = $data['direttoreSanitario'];

    // Prepara la dichiarazione per aggiornare l'ospedale
    $stmt = $conn->prepare("UPDATE ospedale SET nome = ?, citta = ?, indirizzo = ?, direttoreSanitario = ? WHERE codice = ?");
    $stmt->bind_param("ssssi", $nome, $citta, $indirizzo, $direttoreSanitario, $codice);

    if ($stmt->execute()) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Errore durante la modifica: ' . $stmt->error));
    }

    $stmt->close();
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
}

$conn->close();
?>
