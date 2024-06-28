//Ospedale
document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente"); //per verficare sia partito il .js

    fetch('./php/dataOspedale.php')
        .then(response => response.json())
        .then(data => {
            let table = document.querySelector('.contentOspedale table');

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
                //cell5.textContent = item.direttoreSanitario;
                let link = document.createElement('a');
                link.textContent = item.direttoreSanitario; 
                link.href = "Ospedale_direttore.php?CSSN=" + encodeURIComponent(item.direttoreSanitario);
                cell5.appendChild(link);
//--------------------------------------------------------------------------------------------------------------------
//LAMPEGGIO DELLA FORM EDIT-------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------
                let editLink = document.createElement('a');
                editLink.href = '#'; // Lascia il link vuoto
                editLink.dataset.id = item.codice; // Imposta l'ID come attributo del dataset
                let editImg = document.createElement('img');
                editImg.src = 'img/edit.png';
                editImg.alt = 'Modifica';
                editImg.width = 35;
                editImg.height = 35;
                editImg.title="Modifica questo ospedale";
                editLink.appendChild(editImg);
                editLink.addEventListener('click', function(event) {
                    event.preventDefault();
              //Evento per scorrere fino in fondo alla pagina---------------
               /*     window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
              */      let testo= document.getElementById('editH2');
                    let nome= document.getElementById('editNome');
                    let citta= document.getElementById('editCitta');
                    let indirizzo= document.getElementById('editIndirizzo');
                    let direttore= document.getElementById('editDirettore');
                    let button= document.getElementById('editButton');
                    let btn_refresh= document.getElementById('refreshButton');

                    nome.style="display:true";
                    citta.style="display:true";
                    indirizzo.style="display:true";
                    direttore.style="display:true";
                    testo.style="display:true";
                    button.style="display:true";
                    btn_refresh.style="display:true";

              //Evento per scorrere fino in fondo alla pagina---------------
                    showEditModal(item);
                });
                cell6.appendChild(editLink);

        let deleteLink = document.createElement('a');
        deleteLink.href = '#'; // Lascia il link vuoto
        deleteLink.dataset.id = item.codice; // Imposta l'ID come attributo del dataset
        //creo le immagini del cestino
        let deleteImg = document.createElement('img');
        deleteImg.src = 'img/delete.png';
        deleteImg.alt = 'Elimina';
        deleteImg.width = 55;
        deleteImg.height = 40;
        deleteImg.title="Elimina questo ospedale";
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
//----------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function() {
    fetch('./php/dataDirettore.php')
        .then(response =>  response.json()
         )
        .then(data => {    
            let table = document.querySelector('.contentDirettore table'); //console.log(table);           
            // Inserimento dei dati nella tabella
            data.forEach(item => {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                let cell4 = row.insertCell(3);
                let cell5 = row.insertCell(4);
                cell1.textContent = item.codice;
                cell2.textContent = item.nome;
                cell3.textContent = item.citta;
                cell4.textContent = item.indirizzo;
                cell5.textContent = item.direttoreSanitario;
            });             

        })
        .catch(error => console.error('Errore:', error));           

});

//----------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------

//Cittadino
document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente"); //per verficare sia partito il .js

    fetch('./php/dataCittadino.php')
        .then(response => response.json())
        .then(data => {
            let table = document.querySelector('.contentCittadino table');

            data.forEach(item => {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                let cell4 = row.insertCell(3);
                let cell5 = row.insertCell(4);
                let cell6 = row.insertCell(5);

                cell1.textContent = item.CSSN;
                cell2.textContent = item.nome;
                cell3.textContent = item.cognome;
                cell4.textContent = item.dataNascita;
                cell5.textContent = item.luogoNascita;
                cell6.textContent = item.indirizzo;
 
                let editLink = document.createElement('a');
                editLink.href = '#'; // Lascia il link vuoto
                editLink.dataset.id = item.CSSN; // Imposta l'ID come attributo del dataset
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
                


        let deleteLink = document.createElement('b');
        deleteLink.href = '#'; // Lascia il link vuoto
        deleteLink.dataset.id = item.CSSN; // Imposta l'ID come attributo del dataset
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
        
            });
        })
        .catch(error => console.error('Errore:', error));
});

//Ricovero
document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente"); //per verficare sia partito il .js

    fetch('./php/dataRicovero.php')
        .then(response => response.json())
        .then(data => {
            let table = document.querySelector('.contentRicovero table');

            data.forEach(item => {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);
                let cell4 = row.insertCell(3);
                let cell5 = row.insertCell(4);
                let cell6 = row.insertCell(5);
                let cell7 = row.insertCell(6);

                cell1.textContent = item.codOspedale;
                cell2.textContent = item.cod;
                cell3.textContent = item.paziente;
                cell4.textContent = item.data;
                cell5.textContent = item.durata;
                cell6.textContent = item.motivo;
                cell7.textContent = item.costo;
            });
        })
        .catch(error => console.error('Errore:', error));
});


//Patologia
document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente"); //per verficare sia partito il .js
    fetch('./php/dataPatologia.php')
        .then(response => response.json())
        .then(data => {
            let table = document.querySelector('.contentPatologia table');

            data.forEach(item => {
                let row = table.insertRow();
                let cell1 = row.insertCell(0);
                let cell2 = row.insertCell(1);
                let cell3 = row.insertCell(2);

                cell1.textContent = item.cod;
                cell2.textContent = item.nome;
                cell3.textContent = item.criticita;


            });
        })
        .catch(error => console.error('Errore:', error));
});


//DELETE------------------------------------------------------------------------------------------------------------
//Ospedale
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
    
}
document.getElementById('refreshButton').addEventListener('click', function(event) {
    event.preventDefault();
    location.reload(); // Ricarica la pagina per aggiornare la tabella
});


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
            alert("Modifica avvenuta con successo!")
            location.reload(); // Ricarica la pagina per aggiornare la tabella
                    let testo= document.getElementById('editH2');
                    let nome= document.getElementById('editNome');
                    let citta= document.getElementById('editCitta');
                    let indirizzo= document.getElementById('editIndirizzo');
                    let direttore= document.getElementById('editDirettore');
                    let button= document.getElementById('editButton');
                    let btn_refresh=document.getElementById('refreshButton');
                    nome.style="display:none";
                    citta.style="display:none";
                    indirizzo.style="display:none";
                    direttore.style="display:none";
                    testo.style="display:none";
                    button.style="display:none";
                    btn_refresh.style="display:none";
        } else {
            alert('Errore durante la modifica dell\'ospedale.');
        }
    })
    .catch(error => console.error('Errore:', error));
});
//EDIT------------------------------------------------------------------------------------------------------------


//FILTRA----------------------------------------------------------------------------------------------------------

//filtra Ospedale
function filtra() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue, count_td, column_length;
  column_length = document.getElementById('tabella').rows[0].cells.length;
  input = document.getElementById("ricerca");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabella");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) { // except first(heading) row
    count_td = 0;
    for(j = 0; j < column_length; j++){ // except first column
        td = tr[i].getElementsByTagName("td")[j];
        /* ADD columns here that you want you to filter to be used on */
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1)  {            
            count_td++;
          }
        }
    }
    if(count_td > 0){
        tr[i].style.display = "";
    } else {
        tr[i].style.display = "none";
    }
  } 
}


//filtra ricovero

//filtra patologia

//FILTRA----------------------------------------------------------------------------------------------------------
 
