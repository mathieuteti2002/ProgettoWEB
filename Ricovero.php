<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricovero </title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>
	<?php
	 // Imposta la variabile $paginaCorrente con il nome della pagina corrente
		$paginaCorrente = "Ricovero.php";
	 ?>
</head>
<body>
    <header>
        <!--<h1>Servizio Sanitario</h1>-->
		<img src="img/servizio_sanitario.png" height="100" width="600">
		<img class="right-image" src="img/ospedale2.png" height="100" width="100">
		<a href="index.php"><img class="left-image" src="img/home2.png" height="70" width="70" autoplay loop muted></img></a>
    </header>
   <div class="container">
	<div class="left-sidebar">
		<!-- Qui mettiamo i filtri da ricerca -->
		<h2>Filtro Ricerca</h2>
		<form method="post">
			<input type="text" placeholder="Cerca..." name="codice" id="ricerca" class="codice" onkeyup="filtra()">
			<br>
			<br>
		</form>
	</div>
	<div class="content">
		<div class="contentRicovero">
			<h2>Ricovero</h2>
			<table id="tabella">
				<tr>
					<th>CodOspedale</th>
					<th>Cod</th>
					<th>Paziente</th>
					<th>Data inizio</th>
					<th>Durata (giorni)</th>
					<th>Motivo</th>
					<th>Costo (€)</th>
				</tr>		
			</table>
		</div>
	</div>
	<?php include 'navbar.php'; ?>
   </div>
   <?php include 'footer.html'; ?>
</body>
</html>