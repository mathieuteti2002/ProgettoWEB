<?php
$servername = "localhost";
$username = "root";  // Cambia se il tuo username è diverso
$password = "";      // Cambia se la tua password è diversa
$dbname = "progettoweb";  // Sostituisci con il nome del tuo database

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);
$nome = $_POST['nome'];
$citta = $_POST['citta'];
$indirizzo = $_POST['indirizzo'];
$direttore = $_POST['taskOption'];

// Controlla la connessione
if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
}

else if ($nome == '' || $citta == '' || $indirizzo == '' || $direttore) {
    echo json_encode(array('success' => false, 'message' => 'Compilare tutti i campi'));
} else {
    $stmt = $conn->prepare("INSERT INTO ospedale(nome, citta, indirizzo, direttoreSanitario)
                            VALUES (?,?,?,?)");

    // Preveniamo SQL Injection
    $stmt->bind_param("ssss", $nome, $citta, $indirizzo, $direttore);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(array('success' => true, 'message' => 'Ospedale aggiunto con successo'));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Errore durante l\'aggiunta dell\'ospedale'));
    }


    $stmt->close();
    $conn->close();
}