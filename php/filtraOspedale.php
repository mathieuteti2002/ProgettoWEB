
<?php

$con = new mysqli("localhost", "root", "", "progettoweb");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST["submit"])) {
    $str = $con->real_escape_string($_POST["codice"]);
    $query = "SELECT * FROM ospedale WHERE codice = '$str'";

    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_object();
        ?>
            <tr>
                <td><?php echo $row->codice; ?></td>
				<td><?php echo $row->nome; ?></td>
				<td><?php echo $row->citta; ?></td>
				<td><?php echo $row->indirizzo; ?></td>
				<td><?php echo $row->direttoreSanitario; ?></td>
            </tr>
        <?php
    }
}

$con->close();

?>