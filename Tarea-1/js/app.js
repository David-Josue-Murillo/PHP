// Obteniendo los elementos del DOM
const titularNombre = document.getElementById('nombre');
const titularCFP = document.getElementById('CFP');
const clickFormulario = document.getElementById('formulario');
const contenidoFormulario = document.getElementById('contenido');
const menuLateral = document.getElementById('menu_lateral');
const imagen = document.getElementById('fotos');
const footer = document.getElementById('abajo');


// Eventos
document.addEventListener('DOMContentLoaded', cargarPagina);
clickFormulario.addEventListener('click', cargarFormulario);
// Evento que hace refencia al punto 8 del laboratorio
imagen.addEventListener('click', disminuirImagen);

// Funciones de eventos
function cargarPagina() {
    // Evento que hace refencia al punto 1 del laboraorio
    titularNombre.textContent = 'Laboratorio de JavaScript';

    // Esta es la función que hacer refencia al punto 2 del laboratorio
    insertandoFooter();

    // Funcion que hace refencia al punto 3 del laboratorio
    insertarCFP();
}

function cargarFormulario(e) {
    // Evento que hace refencia al punto 4 del laboratorio
    const div = document.createElement('div');
    div.innerHTML = `
        <form action="#" id="form" >
	    	<h2>Formulario</h2>

	    	<label class="label" id="ced">C&eacute;dula:</label> 
            <input type="text" id="cedula"  required />  <br/>

	    	<label class="label"> D&iacute;as de la semana que tienes clases de tecnologi&oacute;a web II:</label><br/>
	    	<input type="checkbox" id = "20" value="1"/> <label>Lunes</label> <br/>
	    	<input type="checkbox" id = "21" value="1"/>  <label>Martes</label> <br/>
	    	<input type="checkbox" id = "22" value="0"/>  <label >Mi&eacute;rcoles</label> <br/>
	    	<input type="checkbox" id = "23" value="0"/>  <label >Jueves</label> 	<br/>
	    	<input type="checkbox" id = "24" value="0"/>  <label >Viernes</label> 	<br/>
            
	    	<label class="label"> Turno en que se desarrolla la clase:</label><br/>
	    	<input type="radio" id = "25" name = "turno" value="0"/>  <label >Nocturno</label> <br/>
	    	<input type="radio" id = "26" name = "turno" value="1"/>  <label>Diurno</label> <br/>
	    	<label class="label"> Carrera que estudias:</label>

	    	<select id="carrera" name="carrera">
	    	    <option value="0" name="carrera">Selecciona</option>
	    	    <option value="1" name="carrera">LIGEE</option>
	    	    <option value="0" name="carrera">LII</option>
	    	    <option value="0" name="carrera">TIE</option>
	    	</select>

		  </br></br>

          <input id="submit" name="dsubmit" type="submit" value="Enviar">
        </form>
    `;
    // Agrega el formulario al contenido html
    contenidoFormulario.appendChild(div);

    // Obteniendo elementos del formulario
    const boton = document.getElementById('submit');

    // Evento que hace refencia al punto 5 del laboratorio
    boton.addEventListener('click', habilitarBoton);

    
}

function habilitarBoton(e) {
    e.preventDefault();

    const cedula = document.getElementById('cedula');
    const lunes = document.getElementById('20');
    const martes = document.getElementById('21');
    const miercoles = document.getElementById('22');
    const jueves = document.getElementById('23');
    const viernes = document.getElementById('24');
    const nocturno = document.getElementById('25');
    const diurno = document.getElementById('26');
    const carrera = document.getElementById('carrera');

    const puntosObtenidos = document.getElementById('0');
    puntosObtenidos.addEventListener('click', mostrarPuntosObtenidos);

    const respuestaCorrecta = document.getElementById('1');
    respuestaCorrecta.addEventListener('click', mostrarRespuestaCorrecta);

    // Reseteando el formulario
    //reseteandoFormulario();
}

function mostrarPuntosObtenidos(e) {
    const cedula = document.getElementById('cedula');
    const lunes = document.getElementById('20');
    const martes = document.getElementById('21');
    const miercoles = document.getElementById('22');
    const jueves = document.getElementById('23');
    const viernes = document.getElementById('24');
    const diurno = document.getElementById('26');
    const carrera = document.getElementById('carrera');

    // Esta función me rerorna los puntos obtenidos
    const puntos = puntosObtenidos(cedula, lunes, martes, miercoles, jueves, viernes, diurno, carrera);

    const div = document.createElement('div');
    div.innerHTML = `
        <h2>Puntos obtenidos: ${puntos}</h2>
        <p>Cedula: ${cedula.value}</p>
        <p>Dias de la semana que hay clase de tecnología web II:</p>
        <ul>
            <li>Lunes
            <li>Martes
            <li>Jueves
        </ul>
        <p>Turno: Diurno</p>
        <p>Carrera: LIGEE</p>
    `;
    
    menuLateral.appendChild(div);
}

function mostrarRespuestaCorrecta(e) {
    const cedula = document.getElementById('cedula');
    const lunes = document.getElementById('20');
    const martes = document.getElementById('21');
    const miercoles = document.getElementById('22');
    const jueves = document.getElementById('23');
    const viernes = document.getElementById('24');
    const nocturno = document.getElementById('25');
    const diurno = document.getElementById('26');
    const carrera = document.getElementById('carrera');

    cedula.value;
    lunes.checked = true;
    martes.checked = true;
    miercoles.checked = false;
    jueves.checked = true;
    viernes.checked = false;
    nocturno.checked = false;
    diurno.checked = true;
    carrera.value = 1;
}

function disminuirImagen(e) {
    const ancho = e.target.width;
    const alto = e.target.height;
    
    // Se disminuye el tamaño de la imagen con cada click en la imagen
    e.target.width = ancho - 5;
    e.target.height = alto - 5;
}


// Funciones de la aplicación (lo hice con arrow functions para distinguirlo de las funciones del evento)
const insertandoFooter = () => {
    // Creando un div y agregandolo al footer con mi nombre
    const div = document.createElement('div');
    div.textContent = 'David Murillo';
    footer.appendChild(div);
}

const insertarCFP = () => {
    const listaTextos = [
        'Implemento funciones manejadoras de eventos',
        'Uso manejadores de eventos semánticos',
        'Uso el método del objeto document: getElementById',
        'Obtengo valores de diferentes campos de un formulario',
        'Manipulo el contenido de diferentes campos del formulario',
        'Manipulo el estilo del contenido de la pagina',];

    // Contador para cambiar el texto
    let contador = 0;
    // Cambiando el texto cada 3 segundos
    setInterval(() => {
        titularCFP.textContent = listaTextos[contador];
        contador++;
        if (contador == listaTextos.length) {
            contador = 0;
        }
    }, 3000);
}

const puntosObtenidos = (cedula, lunes, martes, miercoles, jueves, viernes, diurno, carrera) => {
    // Contador de puntos
    let puntos = 0;
    // Verificando si los checkbox estan seleccionados
    cedula.value.length > 6 ? puntos += 1 : puntos += 0;
    if(cedula){
        puntos += 1;
    }
    if((lunes.checked && martes.checked && jueves.checked) && (!miercoles.checked && !viernes.checked)) {
        puntos += 5;

        diurno.checked ? puntos += 1 : puntos += 0;
        carrera.value == 1 ? puntos += 1 : puntos += 0;
        return puntos;
    }

    if((lunes.checked && martes.checked && jueves.checked) && (miercoles.checked && viernes.checked)) {
        puntos += 3;

        diurno.checked ? puntos += 1 : puntos += 0;
        carrera.value == 1 ? puntos += 1 : puntos += 0;
        return puntos;
    }


    lunes.checked ? puntos += 1 : puntos += 0;
    martes.checked ? puntos += 1 : puntos += 0;
    jueves.checked ? puntos += 1 : puntos += 0;
    diurno.checked ? puntos += 1 : puntos += 0;
    carrera.value == 1 ? puntos += 1 : puntos += 0;

    return puntos;
}

/*const reseteandoFormulario = () => {
    const formulario = document.getElementById('form');
    formulario.reset();
}*/