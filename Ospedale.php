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
		&nbsp
		&nbsp
		&nbsp
		<form action="/submit.php">
			<input type="hidden" name="source" value="Ospedale">
			<input type="text" placeholder="Codice">
			<br>
			<br>
			<input type="text" placeholder="Nome">
			<br>
			<br>
			<input type="text" placeholder="Città">
			<br>
			<br>
			<input type="text" placeholder="Indirizzo">
			<br>
			<br>
			<input type="text" placeholder="Direttore Sanitario">
			<br>
			<br>
			<button type="button">Filtra</button>
		</form>
		<br>
		<div id="editModal" class="modal">
    <div class="modal-content">
        
        <h2>Modifica Ospedale</h2>
        <form id="editForm">
            <input type="hidden" id="editCodice">
            <input type="text" placeholder="Nome" id="editNome" name="nome"><br><br>
            <input type="text" placeholder="Città" id="editCitta" name="citta"><br><br>
            <input type="text" placeholder="Indirizzo" id="editIndirizzo" name="indirizzo"><br><br>
            <input type="text" placeholder="Direttore Sanitario" id="editDirettore" name="direttoreSanitario" ><br><br>
            <button type="submit">Salva</button>
        </form>
    </div>
</div>
		<br>
		<h2>Aggiungi Ospedale:</h2>
		&nbsp
		&nbsp
		&nbsp
		<form action="php\aggiungi_ospedale.php" method="post">
			<input type="text" placeholder="Nome" name="nome" id="nome" class="nome">
			<br>
			<br>
			<input type="text" placeholder="Città" name="citta" id="citta" class="citta">
			<br>
			<br>
			<input type="text" placeholder="Indirizzo" name="indirizzo" id="indirizzo" class="indirizzo">
			<br>
			<br>
			<select option="required" name="taskOption" id="taskOption" class=""taskOption>
				<?php
					$connection = mysqli_connect('localhost', 'root', '', 'progettoweb');
					$sql = "SELECT CSSN FROM cittadino";
					$tendina=mysqli_query($connection,$sql);
					while($c=mysqli_fetch_array($tendina)){
				?>

				<option value="<?php echo $c['CSSN'] ?>"> <?php echo $c['CSSN'] ?></option>
				<?php } ?>
				
			</select>
			<br>
			<br>
			<button type="submit" name="invia">Aggiungi nuovo Ospedale</button>
		</form>
	</div>
	<div class="content">
		<!-- Qui mettiamo i Contenuti/risultati -->
		<h2>Ospedale</h2>
		<table>
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