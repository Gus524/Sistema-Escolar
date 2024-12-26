document.addEventListener("DOMContentLoaded", initialize);

function initialize() {
    const selectCarrera = $('carrera');
    const formulario = $('formMapa');
    const selectPlan = $('planEstudios');
    selectCarrera.addEventListener('change', () => {
        let data = new FormData(formulario);
        fetch('ajax/asyncPlanes.php', {
            method: 'POST',
            body: data
        })
            .then(response => response.text())
            .then(data => loadPlans(JSON.parse(data)))
            .catch(error => console.error('Error:', error));
    });
    selectPlan.addEventListener('change', () => {
        let data = new FormData(formulario);
        fetch('ajax/asyncMapaTable.php', {
            method: "POST",
            body: data
        })
        .then(response => response.text())
        .then(data => loadMapa(data))
        .catch(error => console.error("No purula", error));
    });
}

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
    selectPlan.disabled = false;
    selectPlan.dispatchEvent(new Event('change'));
}

function loadMapa(data) {
    let mapa = $('mapaCurricular');
    mapa.innerHTML = '';
    mapa.innerHTML = data;
    new DataTable('#tbMapa', {
        responsive: true,
        pageLenght: 8
    });
    
}

const $ = (id) => document.getElementById(id);