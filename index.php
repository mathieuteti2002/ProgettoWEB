<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage </title>
	<link rel="stylesheet" href="css/style.css">
	<?php
	 // Imposta la variabile $paginaCorrente con il nome della pagina corrente
		$paginaCorrente = "index.php";
	 ?>
</head>

<body>
	<header>
		<!--<h1>Servizio Sanitario</h1>-->
		<img src="img/servizio_sanitario.png" height="100" width="600">
		<img class="right-image pulsa" src="img/cuore1.png" height="100" width="100" >
		<img class="left-image" src="img/siringa3.gif" height="100" width="100">
	</header>
	<div class="container">
		<div class="left-sidebar">
			<!-- Qui mettiamo i filtri da ricerca -->
			<h1>Benvenuto!</h1>
		</div>
		<img class="left-image-home" src="img/termometro2.gif"></img>

		<div class="content">
			<!-- Qui mettiamo i Contenuti/risultati -->
			<h2>Informazioni Generali</h2>
			<p>La Regione gestisce una base di dati comprensiva delle informazioni sui ricoveri ospedalieri. Ogni
				cittadino è identificato dal codice del Servizio Sanitario Nazionale, che permette di associare i dati
				anagrafici a ciascun paziente.</p>
			<h2>Ospedali</h2>
			<p>Gli ospedali sono identificati da un codice unico e comprendono informazioni dettagliate come nome,
				città, indirizzo e il nome del Direttore Sanitario, che può dirigere un solo ospedale.</p>

			<h2>Ricoveri</h2>
			<p>I ricoveri sono identificati da un codice univoco per ciascun ospedale e includono dettagli come la data
				di inizio, la durata, il motivo del ricovero, il costo e il paziente ricoverato. Ogni ricovero è
				associato a una o più patologie, ciascuna con un livello di criticità specifico.</p>

			<h2>Patologie</h2>
			<p>Le patologie sono identificate da un codice e sono caratterizzate da nome e livello di criticità. La
				gestione include i sottoinsiemi delle patologie mortali e croniche, che possono sovrapporsi ma non sono
				esaustivi.</p>

			<!--<p>NOTA: Il colore assegnato al gruppo è Magenta, tuttavia per questioni stilistiche abbiamo optato per tonalità simili tramite la palette di CSS</p>
		-->
		</div>
		<?php include 'navbar.php'; ?>
	</div>
	<?php include 'footer.html'; ?>
</body>

</html>