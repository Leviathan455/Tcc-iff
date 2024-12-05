//document.getElementsByClassName('fundoCard')[0].style.display = 'none';

const btnModal = document.getElementById('btnModal');
const btnSave = document.getElementById('salvar');
const formSave = document.getElementById('formSave');
const closeModal = document.getElementById('closeModal');
var C = function () {
    cards = document.querySelectorAll('.cards')
    cards.forEach(function movimenta(card) {
        card.addEventListener('dragstart', dragstart)
        card.addEventListener('drag', drag)
        card.addEventListener('dragend', dragend)
    })

}
C();

/** Facilita console
 */
function log(message) {
    console.log(message)
}

/** Local fala */

function dragstart() {
    log(dropando)
    dropando.forEach(dropzone => dropzone.classList.add('highlight'))
    this.classList.add('sas')
}

function drag() {
    //log('mexendo ')
}

function dragend() {
    log('DragEnd ')
    dropando.forEach(dropzone => dropzone.classList.remove('highlight'))
    this.classList.remove('sas')
    moveCard(this.parentElement.id, this.id)
    console.log(this)
    console.log(this.parentElement)

}

/** Local dos cartões (soltar um para o outro) */

let D = function () {
    dropando = document.querySelectorAll('.dropzone')
    dropando.forEach(function puxas(dropando) {
        dropando.addEventListener('dragenter', dragenter)
        dropando.addEventListener('dragover', dragover)
        dropando.addEventListener('dragleave', dragleave)
        dropando.addEventListener('drop', drop)
    })
}

D();

function dragenter() {
    // log('entrooooooooooo')
}
function dragover() {//Elemento arrastado
    //log('tamo dentro da zona putero isso ai')
    this.classList.add('corover')

    log('Dragover')
    cardBeingDragged = document.querySelector('.sas')

    this.appendChild(cardBeingDragged)
    console.log(this)
    console.log(this.parentElement)
}
function dragleave() {//Elemento onde é solto

    log('dragLeave')

    this.classList.remove('corover')
}
function drop() {
    log('drop')
    this.classList.remove('corover')
}

//Preenche
function preenche() {

    //Titulo do quadro
    document.getElementById('titulo').textContent = x.Titulo;

    //criação de listas
    for (lista of x.listas) {
        criaLista(lista)

    }

    C();

    D();
}


preenche();


//Função Arrasta cards

function moveCard(idLista, idCard) {
    let data = new FormData()
    data.append('idLista', idLista);
    data.append('idCard', idCard);

    fetch('http://localhost/0AAAA/php/moveCard.php',
        {
            credentials: 'same-origin',
            method: 'POST',
            body: data
        })
}


//TODO Botão Adicionar Lista -- Refazer para sincronizar com banco de dados e modal
document.getElementById("adiciona").addEventListener("click", function (s) {
    let data = new FormData();
    data.append('idQuadro', x.idQUADRO);
    fetch('http://localhost/0AAAA/php/novaLista.php', {
        credentials: 'same-origin',
        method: 'POST',
        body: data
    })
        .then(res => res.json())
        .then(lista => {

            criaLista(lista)
        })


});


//Botão Adicionar Card
function addCard(){
    let addscard = document.getElementsByClassName('cardsadd');
    for (addC of addscard){
        addC.addEventListener('click', e => {
            e.preventDefault();
            let data = new FormData();
            data.append('idLista', addC.parentElement.id);
            fetch('http://localhost/0AAAA/php/criaCard.php', {
                method:'POST',
                credentials:'same-origin',
                body:data
            })
            .then(res => res.json())
            .then(card => {
                criacard(card, addC.parentElement)
            })
        })
    }
}


//Botão Excluir
function btnexlcuir(div, titulo) {
    //Botão de Excluir
    div.style.position = "relative";
    let excluir = document.createElement('i');
    excluir.classList.add('bi-trash');
    excluir.classList.add('btn', 'btn-outline-danger');
    excluir.style.fontSize = '1rem';

    excluir.style.position = "absolute"
    excluir.style.left = "85%";

    let button = document.createElement('button');
    button.classList.add('btn', 'btn-outline-danger');
    button.type = 'button';

    //Evento do botão de excluir


    div.appendChild(excluir);


    excluir.addEventListener('click', e => {
        e.preventDefault()


        let data = new FormData();
        data.append('idLista', excluir.nextElementSibling.id)
        if (confirm('Você deseja excluir está lista e todos os cards que ela contém?')) {
            fetch('http://localhost/0AAAA/php/excluirLista.php', {
                method: 'post',
                credentials: 'same-origin',
                body: data
            })
                .then(res => {
                    excluir.parentElement.remove();

                })

        }
    })
}

function titulo(div, Ltitulo) {

    let titulo = document.createElement('input');
    console.log(lista);
    titulo.value = Ltitulo
    titulo.classList.add('tlista');
    div.appendChild(titulo);

    titulo.addEventListener('focusout', e => {
        e.preventDefault(); let data = new FormData();
        data.append('idLista', titulo.nextElementSibling.nextElementSibling.id)
        data.append('titulo', titulo.value);
        fetch('http://localhost/0AAAA/php/editTituloLista.php', {
            method: 'post',
            credentials: 'same-origin',
            body: data
        })


    })
}

function criacard(card, dropzone) {
    let carde = document.createElement('div');
    carde.draggable = true;
    carde.classList.add('cards');
    carde.id = card.idCARD;
    let content = document.createElement('div');
    content.innerHTML = '<h4>' + card.Titulo + '</h4>';
    carde.appendChild(content);
    dropzone.appendChild(carde)

    carde.addEventListener('click', e => {
        e.preventDefault();

        let data = new FormData();
        data.append('idCard', carde.id);
        fetch('http://localhost/0AAAA/php/getInfoCard.php', {
            body: data,
            credentials: 'same-origin',
            method: 'POST'
        }).then(res => res.json())
            .then(json => {
                document.getElementById('modalTitulo').value = json.Titulo;
                document.getElementById('modalDescricao').value = json.Descricao;
                document.getElementById('modalData').value = json.Data == undefined ? '' : json.Data;

                btnModal.click();
            })
        btnSave.addEventListener('click', e => {
            document.getElementById('modal').click();
           
            e.preventDefault();
            let Sdata = new FormData();
            Sdata.append('idCard', carde.id);
            Sdata.append('Titulo', document.getElementById('modalTitulo').value);
            Sdata.append('Descricao', document.getElementById('modalDescricao').value);
            Sdata.append('Data', document.getElementById('modalData').value);

            content.getElementsByTagName('h4')[0].textContent = document.getElementById('modalTitulo').value;
            fetch('http://localhost/0AAAA/php/editCard.php', {
                body: Sdata,
                credentials: 'same-origin',
                method: 'POST'
            })
            
           

        })




    })
}

function criaLista(lista) {
    let div = document.createElement('div');
    div.id = lista.idLISTA;
    div.classList.add('fundoCard');

    console.log(lista);

    let dropzone = document.createElement('div');
    dropzone.classList.add('dropzone');
    dropzone.id = lista.idLISTA;

    titulo(div, lista.Titulo)
    btnexlcuir(div, titulo)


    let addcard = document.createElement('div');
    addcard.classList.add('cardsadd');
    addcard.classList.add('btn');
    addcard.classList.add('btn-addcard');
    addcard.id = lista.idLISTA;
    addcard.innerHTML = '<div  data-toggle="modal" data-target="#modalAddCard">Adicionar card</div>';

    addcard.addEventListener('click', e => {
        e.preventDefault();
        let data = new FormData();
        data.append('idLista', addcard.parentElement.id);
        fetch('http://localhost/0AAAA/php/criaCard.php', {
            method:'POST',
            credentials:'same-origin',
            body:data
        })
        .then(res => res.json())
        .then(card => {
            criacard(card, dropzone)
        })
    })

    dropzone.appendChild(addcard);

    /*Listener Add card */
/*     addcard.addEventListener('click', el => {
        el.preventDefault();
        modalAddCard.style.display = 'flex';
        document.getElementById('passaidlista').value = addcard.id;

        document.getElementById('passaordemlista').value = dropzone.children.length;

    }) */

    if (lista.hasOwnProperty("cards")) {
        for (card of lista.cards) {
            criacard(card, dropzone)
        }
    }



    div.appendChild(dropzone);
    document.getElementsByClassName('placa')[0].appendChild(div);

    C();

    D();
    


}
