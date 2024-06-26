<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ospedale</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
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
			<input type="text" placeholder="Scrivi di tutto" name="codice" id="ricerca" class="codice" onkeyup="filtra()">
		</form>
		<h2>Aggiungi Ospedale:</h2>
		<!DOCTYPE html>
    
	<script>
        $(document).ready(function(){
            $('#ospedaleForm').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'php/aggiungi_ospedale.php',
                    data: $('#ospedaleForm').serialize(),
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            alert('Operazione completata: ' + response.message);
                            $('#ospedaleForm')[0].reset(); // Resetta il form
                                location.reload(); // Ricarica la pagina dopo 1 secondo
                        } else {
                            alert('Errore: ' + response.message);
                        }
                    },
                    error: function(){
                        alert('Si è verificato un errore durante la richiesta');
                    }
                });
            });
        });
    </script>

    <form action="php/aggiungi_ospedale.php" method="post" id="ospedaleForm">
        <input type="text" placeholder="Nome" name="nome" id="nome" class="nome">
        <input type="text" placeholder="Città" name="citta" id="citta" class="citta">
        <input type="text" placeholder="Indirizzo" name="indirizzo" id="indirizzo" class="indirizzo">
        <select required name="taskOption" id="taskOption" class="taskOption">
            <?php
                $connection = mysqli_connect('localhost', 'root', '', 'progettoweb');
                $sql = "SELECT CSSN FROM cittadino WHERE CSSN NOT IN (SELECT direttoreSanitario FROM ospedale)";
                $tendina = mysqli_query($connection, $sql);
                while($c = mysqli_fetch_array($tendina)){
            ?>
                <option value="<?php echo $c['CSSN'] ?>"><?php echo $c['CSSN'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="invia" title="Aggiungi questo ospedale">Aggiungi nuovo Ospedale</button>
    </form>

	<div id="editModal" class="modal">
    <div class="modal-content">
	<br>
        <h2 style="display:none" id="editH2">Modifica Ospedale</h2>
        <form id="editForm">
            <input type="hidden" id="editCodice">
            <input type="text" style="display:none" placeholder="Nome" id="editNome" name="nome">
            <input type="text" style="display:none" placeholder="Città" id="editCitta" name="citta">
            <input type="text" style="display:none" placeholder="Indirizzo" id="editIndirizzo" name="indirizzo">
            <!--<input type="text" style="display:none" placeholder="Direttore Sanitario" id="editDirettore" name="direttoreSanitario" > -->
			<div class="button-container">
				<button type="submit" style="display:none" id="editButton" class="editButton" title="Salva modifiche">Salva</button>
				<button type="submit" style="display:none" id="refreshButton" class="refreshButton" title="Annulla modifiche">Annulla</button>
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

