<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patologia</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>
	<?php
	 // Imposta la variabile $paginaCorrente con il nome della pagina corrente
		$paginaCorrente = "Patologia.php";
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
		<form method="post">
			<h2>Filtro Ricerca</h2>
			
			<input type="text" placeholder="Cerca..." name="codice" id="ricerca" class="codice" onkeyup="filtra()">
			<br>
			<br>
		</form>
	</div>
	<div class="content">
		<div class="contentPatologia">
			<!-- Qui mettiamo i Contenuti/risultati -->
			<h2>Patologia</h2>
			<table id="tabella">
				<tr>
					<th>Cod</th>
					<th>Nome</th>
					<th>Criticità</th>
				</tr>		
			</table>
		</div>
	</div>
	<?php include 'navbar.php'; ?>
	</div>
	<?php include 'footer.html'; ?>
</body>
</html>