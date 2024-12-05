'use strict'

let foto = document.getElementById('fotoperfil');
let clicado = document.getElementById('procuraimg')

foto.addEventListener('click', () => {
    clicado.click();
})

clicado.addEventListener('change', (Event) => {
    console.log(Event);

    if (clicado.files.length <= 0) {
        return;
    }
    let lendo = new FileReader();

    lendo.onload = () => {
        foto.src = lendo.result;
    }
    lendo.readAsDataURL(clicado.files[0]);
})




const submit = new FormData();
submit.append('fotoperfil', clicado.files[0]);
function envia() {
    fetch("http://localhost/0AAAA/php/perfiledita.php", {
        credentials: "same-origin", 
        body: submit,
        method: "POST"
    }).then(el => {
        return el.json();
    }
    )
}
