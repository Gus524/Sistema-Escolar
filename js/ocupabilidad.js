document.addEventListener('DOMContentLoaded', initialize);
var selectCarrera, selectPlan, formHorario, selectTurno, selectSemestre, selectGrupo, txtMateria, showHorarios;

// funcion para obtener los elementos y asignar los eventos a los elementos de la pagina
function initialize() {
    selectCarrera = $('selectCarrera');
    formHorario = $('formHorario');
    selectPlan = $('selectPlan');
    selectTurno = $('selectTurno');
    selectGrupo = $('selectGrupo');
    selectSemestre = $('selectSemestre');
    showHorarios = $('showHorarios');
    selectCarrera.addEventListener('change', ajaxPlanes);
    selectPlan.addEventListener('change', getHorario);
    selectTurno.addEventListener('change', getHorario);
    selectGrupo.addEventListener('change', getGrupo);
    selectSemestre.addEventListener('change', getHorario);
}

function ajaxPlanes() {
    // Obtiene el contenido del formulario
    let data = new FormData(formHorario);
    //Manda a llamar la funcion de php a traves de un Fetch
    fetch('ajax/asyncPlanes.php', {
        method: 'POST',
        body: data
    })
        // Obtiene la respuesta y manda a llamar la funcion para llenar el select de planes
        .then(response => response.text())
        .then(data => loadPlans(JSON.parse(data)))
        .catch(error => console.error('Error:', error));
}

function loadPlans(planes) {
    selectPlan.innerHTML = '';
    // Llena los datos del select planes
    planes.planes.forEach(plan => {
        let option = document.createElement('option');
        option.value = plan.id_plan;
        option.innerText = plan.plan;
        selectPlan.appendChild(option);
    });
    selectSemestre.innerHTML = '';
    for (let i = 1; i <= planes.semestres[0].no_sem; i++) {
        selectSemestre.appendChild(generarOption(i, i));
    }
    // Dispara el evento change del select para cargar el resto de datos
    selectPlan.dispatchEvent(new Event('change'));
}

function getGrupo() {
    let data = new FormData(formHorario);
    fetch('ajax/asyncHorarios.php', {
        method: 'POST',
        body: data
    })
        .then(response => response.text())
        .then(data => JSON.parse(data))
        .then(response => {
            // Verifica si el Json tiene detalles o es solo el horario (revisar)
            if (response.detalles != undefined) {
                sendData(response.detalles)
            } else {
                sendData(response);
            }
        })
        .catch(err => console.error(err));
}

function getHorario() {
    // Habilita los select
    selectPlan.disabled = false;
    selectTurno.disabled = false;
    selectSemestre.disabled = false;
    selectGrupo.disabled = true;
    let data = new FormData(formHorario);
    // Llama a la funcion para obtener el horario y grupos
    fetch('ajax/asyncHorarios.php', {
        method: 'POST',
        body: data
    })
        .then(response => response.text())
        .then(data => JSON.parse(data))
        .then(response => {
            sendData(response.detalles);
            loadElements(response.grupos);
        })
        .catch(error => console.error('Error:', error));
}

function loadHorario(horarios) {
    // Carga el html que tiene la tabla de ocupabilidad
    showHorarios.innerHTML = '';
    showHorarios.innerHTML = horarios;
}

function sendData(detalles) {
    fetch('ajax/asyncOcupabilidadTable.php', {
        method: 'POST',
        body: JSON.stringify({ detalles: detalles })
    })
        .then(response => response.text())
        .then(data => loadHorario(data))
        .catch(error => console.error('No purula', error))
}

function resetGrupos() {
    // Vacia y vuelve a crear la opcion de Todos para el select de grupo
    selectGrupo.innerHTML = '';
    let option = document.createElement('option');
    option.innerText = "Todos";
    selectGrupo.appendChild(option);
}

function loadElements(grupos) {
    resetGrupos();
    // Verifica si existen grupos para los filtros 
    if (grupos.length > 0) {
        grupos.forEach(grupo => {
            selectGrupo.appendChild(generarOption(grupo.secuencia, grupo.secuencia));
        });
        selectGrupo.disabled = false;
    } else {
        selectTurno.disabled = true;
        selectSemestre.disabled = true;
    }
}

// funcion para crear un option de un select
const generarOption = (val, text) => {
    let option = document.createElement('option');
    option.value = val;
    option.innerText = text;
    return option;
}

const $ = (id) => document.getElementById(id);