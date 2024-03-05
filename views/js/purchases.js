const factures = document.querySelectorAll('.facture-row');
const printWindow = document.querySelector('.print-window');

for (const facture of factures){
    facture.querySelector('.btn').addEventListener('click', function () {
        printWindow.querySelector('.title').innerText = facture.getAttribute('titre');
        printWindow.querySelector('.window-facture-id').innerText = '#'+facture.querySelector('.facture-id').innerText;
        printWindow.querySelector('.date').innerText = facture.getAttribute('date');
        printWindow.querySelector('.normal-prix').innerText = facture.getAttribute('tarifnomalprix')
        printWindow.querySelector('.normal-qt').innerText = facture.querySelector('.count-normal').innerText;
        printWindow.querySelector('.normal-total').innerText = facture.getAttribute('totalnormal');
        printWindow.querySelector('.reduit-prix').innerText = facture.getAttribute('tarifreduit');
        printWindow.querySelector('.reduit-qt').innerText = facture.querySelector('.count-reduit').innerText;
        printWindow.querySelector('.reduit-total').innerText = facture.getAttribute('totalreduit');
        printWindow.querySelector('.total-billet').innerText = facture.getAttribute('totalbillet');
        printWindow.querySelector('.total-prix').innerText = facture.querySelector('.total').innerText;
        printWindow.querySelector('.email').innerText = facture.getAttribute('email');
        printWindow.querySelector('.user-name').innerText = facture.getAttribute('userName');
        window.print();
    });
}