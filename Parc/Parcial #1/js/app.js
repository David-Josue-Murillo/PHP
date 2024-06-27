// Declaración de las variables
const piePagina = document.getElementById('pie');
const formulario = document.getElementById('form');
const contenido = document.getElementById('contenidoTransacción');
const img = document.getElementById('f');


//1- Cambiar el contenido del pie de página por tu nombre
piePagina.textContent = 'David Murillo';


//Eventos
formulario.addEventListener('submit', enviarFormulario);


//Funciones
function enviarFormulario(e){
    e.preventDefault();
    
    // Precios de los productos
    const precios = [120, 160, 340, 65, 30];

    //Extraer los datos del formulario
    const nombre = document.getElementById('name').value;
    const tvLG = document.getElementById('01');
    const tvSM = document.getElementById('02');
    const impresoraEpson = document.getElementById('03');
    const BateriaT = document.getElementById('04');
    const CargadorC  = document.getElementById('05');
    const tienda = document.getElementById('tienda');
    const domicilio = document.getElementById('domicilio');
    const metodoPago = document.getElementById('metodoPago');

    const productos = {
        tvLG,
        tvSM,
        impresoraEpson,
        BateriaT,
        CargadorC,
        tienda,
        domicilio
    }

    const resultado = obtenerChecks(productos);
    resultadoHTML(resultado,precios,nombre, metodoPago);

    const btn = document.getElementById('btnCorreo');
    btn.addEventListener('click', () => {
    e   .preventDefault()
        alert('Hemos enviado la información a su correo registrado con nosotros')
    })

    limpiarHTML();
}

const obtenerChecks = (items) =>{
    return Object.values(items).filter( item => item.checked  === true);
}   

const resultadoHTML = (obj, precios ,name, pago) => {
    const articulos = Object.values(obj).filter(element => element.value !== "");

    let lista = document.createElement('li');
    totalCash = 0;
    for (let i = 0; i < articulos.length; i++) {
        let indicePrecio = Number(articulos[i].id) -1
        lista.textContent += `${i+1}- ${articulos[i].value} - Precio: ${precios[indicePrecio]}<br>`
        totalCash += precios[indicePrecio];
    }

    const entrega = Object.values(obj).filter(element => element.value === "");

    const div = document.createElement('div');
    div.classList.add('color__text')
    div.innerHTML = `
        <h1>Cotización</h1>
        <h2>Nombre del cliente: ${name}<h2>
        
        <h3>Factura</h3>
        <p>${lista.textContent }</p>
        
        <h4>Total a pagar: ${totalCash}<h4>

        <p>Hemos recibido su transferencia de retiro a ${entrega[0].id} y que estaría pagando mediante ${pago.value}</p>

        <button id="btnCorreo" type="submit">Enviar correo</button>
    `
    contenido.appendChild(div);

}

function limpiarHTML() {
    const nombre = document.getElementById('name');
    const tvLG = document.getElementById('01');
    const tvSM = document.getElementById('02');
    const impresoraEpson = document.getElementById('03');
    const BateriaT = document.getElementById('04');
    const CargadorC  = document.getElementById('05');
    const tienda = document.getElementById('tienda');
    const domicilio = document.getElementById('domicilio');
    const metodoPago = document.getElementById('metodoPago');

    nombre.value = '';
    tvLG.checked = false; 
    tvSM.checked = false;
    impresoraEpson.checked = false;
    BateriaT.checked = false;
    CargadorC.checked = false;
    tienda.checked = false;
    domicilio.checked = false;
    metodoPago.value = 0;   
}

const imagenes = {
    0: "../img/reacreditacion1.png",
    1: "../img/reacreditacion2.png",
    2: "../img/reacreditacion3.png",
    3: "../img/reacreditacion4.png",
    4: "../img/reacreditacion5.png",
    5: "../img/reacreditacion6.png",
    6: "../img/reacreditacion7.png",
}

const indexIMG_1 = document.getElementById('1');
const indexIMG_2 = document.getElementById('2');
const indexIMG_3 = document.getElementById('3');
const indexIMG_4 = document.getElementById('4');
const indexIMG_5 = document.getElementById('5');
const indexIMG_6 = document.getElementById('6');
const indexIMG_7 = document.getElementById('7');

const indexIMG = [
    indexIMG_1,
    indexIMG_2,
    indexIMG_3,
    indexIMG_4,
    indexIMG_5,
    indexIMG_6,
    indexIMG_7,
]


let i = 0;
let delay = 7000;
setInterval(() => {
    img.src = imagenes[i];
    i++;
    
    indexIMG.forEach(element => {
        element.addEventListener('click', clickIMG)
    });


    if(i > 6) i = 0;
}, delay);

let j = 0
setInterval(() => {
    indexIMG[i].checked === false ? indexIMG[i].checked = true : indexIMG[i].checked = false;
    j++

    if(j > 6) j = 0;
}, delay)

function clickIMG(e) {
    i = (parseInt(e.target.id) - 1)
    img.src = imagenes[i];
}



