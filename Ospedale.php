<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedale</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>

</head>
<body>
    <header>
        <!--<h1>Servizio Sanitario</h1>-->
		<img src="img/servizio_sanitario.png" height="100" width="600">
		<img class="right-image" src="img/ospedale2.png" height="100" width="100">
		<img class="left-image" src="img/home.png" height="100" width="100">
    </header>
   <div class="container">
	<div class="left-sidebar">
		<!-- Qui mettiamo i filtri da ricerca -->
		<h2>Filtro Ricerca</h2>
		
		<form method="post">
			<input type="hidden" name="source" value="Ospedale">
			<input type="text" placeholder="Cerca..." name="codice" id="ricerca" class="codice" onkeyup="filtra()">
		</form>
		<h2>Aggiungi Ospedale:</h2>
		<form action="php\aggiungi_ospedale.php" onsubmit="Controllo()" method="post">
			<input type="text" placeholder="Nome" name="nome" id="nome" class="nome">
			<input type="text" placeholder="Città" name="citta" id="citta" class="citta">
			<input type="text" placeholder="Indirizzo" name="indirizzo" id="indirizzo" class="indirizzo">
			<select option="required" name="taskOption" id="taskOption" class=""taskOption >
			<optgroup label="Direttore Sanitario">	
				<?php
					$connection = mysqli_connect('localhost', 'root', '', 'progettoweb');
					$sql = "SELECT CSSN FROM cittadino WHERE CSSN not in(SELECT direttoreSanitario FROM ospedale)";
					$tendina=mysqli_query($connection,$sql);
					while($c=mysqli_fetch_array($tendina)){
				?>

				<option value="<?php echo $c['CSSN'] ?>"> <?php echo $c['CSSN'] ?></option>
				<?php } ?>
			</optgroup>
			</select>
			<button type="submit" name="invia" title="Aggiungi questo ospedale">Aggiungi nuovo Ospedale</button>
		</form>
	<div id="editModal" class="modal">
    <div class="modal-content">
	<br>
        <form id="editForm">
		<h2 style="display:none" id="editH2">Modifica Ospedale</h2>
            <input type="hidden" id="editCodice">
            <input type="text" style="display:none" placeholder="Nome" id="editNome" name="nome">
            <input type="text" style="display:none" placeholder="Città" id="editCitta" name="citta">
            <input type="text" style="display:none" placeholder="Indirizzo" id="editIndirizzo" name="indirizzo">
            <input type="text" style="display:none" placeholder="Direttore Sanitario" id="editDirettore" name="direttoreSanitario" >
            <button type="submit" style="display:none" id="editButton" title="Salva modifiche">Salva</button>
        </form>
		<button type="submit" style="display:none" id="refreshButton" title="Annulla modifiche">Annulla</button>
    </div>
</div>
		
	</div>
	<div class="content">
	<div class="contentOspedale">
		<!-- Qui mettiamo i Contenuti/risultati -->
		<h2>Ospedale</h2>
		<table id="tabella">
			<tr>
				<th>Codice</th>
				<th>Nome</th>
				<th>Città</th>
				<th>Indirizzo</th>
				<th>Direttore Sanitario</th>
				<th>Modifica</th>
				<th>Elimina</th>
			</tr>		
		</table>
	</div>
	</div>
	<div class="right-navbar" >
		<a href="index.html" ><input type="button" value="Home"></a><br><br>
		<a href="Ospedale.php"><input type="button" value="Ospedale" class="active"></a><br><br>
		<a href="Cittadino.html"><input type="button" value="Cittadino"></a><br><br>
		<a href="Ricovero.html"><input type="button" value="Ricovero"></a><br><br>
		<a href="Patologia.html"><input type="button" value="Patologia"></a><br><br></div>    
   </div>
    </div>
    <footer>
        <!-- Contenuto del footer -->
        <p>Programmazione Web 2023/2024 - Teti, Bonfanti, Selmani</p>
    </footer>
</body>
</html>

