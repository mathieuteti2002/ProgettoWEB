<?php
$mysqli = new mysqli('host', 'username', 'password', 'dbname');

$mysqli->close();

//COME CAPIRE DA DOVE PROVENGONO I DATI--------------------------
if(isset($_POST['source'])) {
    $source = $_POST['source'];
    echo "I dati provengono da: " . $source;
} else {
    echo "Nessuna informazione sulla provenienza dei dati.";
}
//----------------------------------------------------------------

?>