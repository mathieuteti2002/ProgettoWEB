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
else if($nome=='' OR $citta='' OR $indirizzo=''){
    alert("Campo vuoto");
}
else
{



    $stmt=$conn->prepare("INSERT INTO ospedale(nome, citta, indirizzo, direttoreSanitario)
                            VALUES (?,?,?,?)");
    $stmt->bind_param( $nome, $citta, $indirizzo, $direttore);
    $stmt->execute();
    //echo"Registration Successfully...";
    header( "Location: \ProgettoWEB\Ospedale.php" );
    $stmt->close();
    $conn->close();

}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}