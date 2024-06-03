document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente"); //per verficare sia partito il .js

    fetch('./php/data.php')
        .then(response => response.json())
        .then(data => {
            let table = document.querySelector('.content table');

            data.forEach(item => {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                let cell4 = row.insertCell(3);
                let cell5 = row.insertCell(4);
                let cell6 = row.insertCell(5);
                let cell7 = row.insertCell(6);

                cell1.textContent = item.codice;
                cell2.textContent = item.nome;
                cell3.textContent = item.citta;
                cell4.textContent = item.indirizzo;
                cell5.textContent = item.direttoreSanitario;
 
                let editLink = document.createElement('a');
                editLink.href = '#'; // Lascia il link vuoto
                editLink.dataset.id = item.codice; // Imposta l'ID come attributo del dataset
                let editImg = document.createElement('img');
                editImg.src = 'img/edit.png';
                editImg.alt = 'Modifica';
                editImg.width = 35;
                editImg.height = 35;
                editLink.appendChild(editImg);
                editLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    showEditModal(item);
                });
                cell6.appendChild(editLink);


        let deleteLink = document.createElement('b');
        deleteLink.href = '#'; // Lascia il link vuoto
        deleteLink.dataset.id = item.codice; // Imposta l'ID come attributo del dataset
        //creo le immagini del cestino
        let deleteImg = document.createElement('img');
        deleteImg.src = 'img/delete.png';
        deleteImg.alt = 'Elimina';
        deleteImg.width = 55;
        deleteImg.height = 40;
        deleteLink.appendChild(deleteImg);
       //aggiungo un evento listener per controllare il click
        deleteLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    deleteHospital(item.codice, row);
                });
        cell7.appendChild(deleteLink);
            });
        })
        .catch(error => console.error('Errore:', error));
});

//DELETE------------------------------------------------------------------------------------------------------------
function deleteHospital(codice, row) {
    if (confirm('Sei sicuro di voler eliminare questo ospedale?')) {
        console.log('deleteHospital chiamata');
        console.log('Codice da eliminare:', row);
        fetch('php/elimina_ospedale.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ codice: codice })
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            if (data.success) {
                row.remove(); // Rimuove la riga dalla tabella
                location.reload();
            } else {
                alert('Errore durante l\'eliminazione dell\'ospedale.' + data.message);
            }
        })
        .catch(error => console.error('Errore:', error));
        alert('Eliminazione avvenuta con successo!');

    }
}
//DELETE------------------------------------------------------------------------------------------------------------



//EDIT------------------------------------------------------------------------------------------------------------
function showEditModal(item) {
    let modal = document.getElementById('editModal');
    modal.style.display = "block";

    document.getElementById('editCodice').value = item.codice;
    document.getElementById('editNome').value = item.nome;
    document.getElementById('editCitta').value = item.citta;
    document.getElementById('editIndirizzo').value = item.indirizzo;
    document.getElementById('editDirettore').value = item.direttoreSanitario;

    let span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let codice = document.getElementById('editCodice').value;
    let nome = document.getElementById('editNome').value;
    let citta = document.getElementById('editCitta').value;
    let indirizzo = document.getElementById('editIndirizzo').value;
    let direttoreSanitario = document.getElementById('editDirettore').value;

    fetch('php/modifica_ospedale.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ codice: codice, nome: nome, citta: citta, indirizzo: indirizzo, direttoreSanitario: direttoreSanitario })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Ricarica la pagina per aggiornare la tabella
        } else {
            alert('Errore durante la modifica dell\'ospedale.');
        }
    })
    .catch(error => console.error('Errore:', error));
});
//EDIT------------------------------------------------------------------------------------------------------------
