const good = document.getElementById('good')
const warning = document.getElementById('warning');

const account_From = document.getElementById('account_From');
const account_To = document.getElementById('account_To');
const amount = document.getElementById('amount');
const recibe = document.getElementById('recibe');
const enviar = document.getElementById('good');


warning.addEventListener('click', function() {
    (`Estas enviando dinero a ${recibe.value}`)
})
