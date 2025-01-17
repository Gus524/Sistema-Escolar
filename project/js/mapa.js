document.addEventListener("DOMContentLoaded", initialize);
// Funcion para asignar eventos a los elementos
function initialize() {
    const selectCarrera = $('carrera');
    const formulario = $('formMapa');
    const selectPlan = $('planEstudios');
    selectCarrera.addEventListener('change', () => {
        // Obtiene los datos del formulario
        let data = new FormData(formulario);
        // Manda a llamar la funcion con fetch
        fetch('ajax/asyncPlanes.php', {
            method: 'POST',
            body: data
        })
            // Si la funcion devuelve algo obtiene la respuesta
            .then(response => response.text())
            // Si se ejecuta correctamente manda a llamar la funcion para cargar los planes
            .then(data => loadPlans(JSON.parse(data).planes))
            .catch(error => console.error('Error:', error));
    });
    selectPlan.addEventListener('change', () => {
        // Obtiene los datos del formulario
        let data = new FormData(formulario);
        // Se llama la funcion con fetch
        fetch('ajax/asyncMapaTable.php', {
            method: "POST",
            body: data
        })
        // Si hay respuesta obtiene los datos como texto
        .then(response => response.text())
        // Manda a llamar la funcion para cargar la tabla
        .then(data => loadMapa(data))
        .catch(error => console.error("No purula", error));
    });
}

// Carga los planes correspondientes a la carrera
function loadPlans(data) {
    console.log(data);
    let selectPlan = $('planEstudios');
    selectPlan.innerHTML = '';
    data.forEach(plan => {
        let option = document.createElement('option');
        option.value = plan.id_plan;
        option.innerText = plan.plan;
        selectPlan.appendChild(option);
    });
    // Habilita el select de Planes
    selectPlan.disabled = false;
    // dispara el evento change del select para cargar el mapa
    selectPlan.dispatchEvent(new Event('change'));
}

// Carga la tabla con los datos obtenidos
function loadMapa(data) {
    let mapa = $('mapaCurricular');
    // limpia la seccion del mapa
    mapa.innerHTML = '';
    // Carga los datos de la seccion, que es una tabla
    mapa.innerHTML = data;
    new DataTable('#tbMapa', {
        responsive: true,
        pageLenght: 8
    });
    
}
// Funcion para simplificar la obtencion de un elemento
const $ = (id) => document.getElementById(id);