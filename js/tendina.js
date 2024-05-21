document.addEventListener("DOMContentLoaded", function() {
    console.log("Script caricato correttamente");

    fetch('./php/tendina.php')
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

                cell1.textContent = item.codice;
                cell2.textContent = item.nome;
                cell3.textContent = item.citta;
                cell4.textContent = item.indirizzo;
                cell5.textContent = item.direttoreSanitario;
            });
        })
        .catch(error => console.error('Errore:', error));
});
