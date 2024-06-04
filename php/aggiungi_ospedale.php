<?php
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
else
{
    $nome = $_POST['nome'];
    $citta = $_POST['citta'];
    $indirizzo = $_POST['indirizzo'];
    $direttore = $_POST['taskOption'];


    $stmt=$conn->prepare("INSERT INTO ospedale(nome, citta, indirizzo, direttoreSanitario)
                            VALUES (?,?,?,?)");
    //preveniamo SQL Injection
    $stmt->bind_param("ssss", $nome, $citta, $indirizzo, $direttore);
    $stmt->execute();
    //echo"Registration Successfully...";
    header( "Location: \ProgettoWEB\Ospedale.php");
    $stmt->close();
    $conn->close();

}


