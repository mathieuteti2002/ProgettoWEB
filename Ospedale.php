<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ospedale</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<?php
	 // Imposta la variabile $paginaCorrente con il nome della pagina corrente
		$paginaCorrente = "Ospedale.php";
	 ?>
</head>
<body>
	<header>
	<?php include 'header.html'; ?>
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

			
<script>
				$(document).ready(function() {
					$('#ospedaleForm').submit(function(e) {
						e.preventDefault();
						$.ajax({
							type: 'POST',
							url: 'php/aggiungi_ospedale.php',
							data: $('#ospedaleForm').serialize(),
							dataType: 'json',
							success: function(response) {
								if (response.success) {
									alert('Operazione completata: ' + response.message);
									$('#ospedaleForm')[0].reset(); // Resetta il form
									location.reload(); // Ricarica la pagina dopo 1 secondo
								} else {
									alert('Errore: ' + response.message);
								}
							},
							error: function() {
								alert('Si è verificato un errore durante la richiesta');
							}
						});
					});
				});
			</script>
			<form action="php\aggiungi_ospedale.php" method="post" id="ospedaleForm">
				<input type="text" placeholder="Nome" name="nome" id="nome" class="nome">
				<input type="text" placeholder="Città" name="citta" id="citta" class="citta">
				<input type="text" placeholder="Indirizzo" name="indirizzo" id="indirizzo" class="indirizzo">
				<select option="required" name="taskOption" id="taskOption" class="" taskOption>
                    <option selected disabled>Direttore Sanitario</option>
						<?php
						$connection = mysqli_connect('localhost', 'programmazioneweb', '', 'my_programmazioneweb');
						$sql = "SELECT CSSN FROM cittadino WHERE CSSN not in(SELECT direttoreSanitario FROM ospedale)";
						$tendina = mysqli_query($connection, $sql);
						while ($c = mysqli_fetch_array($tendina)) {
						?>

							<option value="<?php echo $c['CSSN'] ?>"> <?php echo $c['CSSN'] ?></option>
						<?php } ?>
					</optgroup>
				</select>
				<button type="submit" name="invia" title="Aggiungi questo ospedale">Aggiungi un nuovo Ospedale</button>
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
						<input type="text" style="display:none" placeholder="Direttore Sanitario" id="editDirettore" name="direttoreSanitario">

						<div class="button-container">
							<button type="submit" style="display:none" class="editButton" id="editButton" title="Salva modifiche">Salva</button>
							<button type="submit" style="display:none" class="refreshButton" id="refreshButton" title="Annulla modifiche">Annulla</button>
						</div>
					</form>
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
		<?php include 'navbar.php'; ?>
	</div>
</body>
<?php include 'footer.html'; ?>
</html>