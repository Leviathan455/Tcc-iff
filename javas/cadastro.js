const enviaForm = document.getElementById('submitform');
const form = document.getElementById('form');
enviaForm.addEventListener('click', postCadastro);

function postCadastro(el) {
    el.preventDefault();
    let data = new FormData(form);

    fetch('http://localhost/0AAAA/php/cadastro.php', {

            method: 'POST',
            body: data,
            credentials: 'same-origin',

        }).then(async function(el){
            if (el.ok) {
                window.location = 'http://localhost/0AAAA/HomePag.php';
                console.log('aaaa');
            } else {
                x = await el.text();
                alert(x);
            }
        });


}
