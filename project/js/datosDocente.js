document.addEventListener('DOMContentLoaded', initialize);
var datosGenerales, datosDireccion;

function initialize() {
    datosGenerales = $('Generales');
    datosDireccion = $('Direccion');
    let inputs = document.querySelectorAll("input");
    inputs.forEach(input => {
        input.addEventListener('change', showInfo);
    });
}

function showInfo(event) {
    resetInfo();
    console.log(event.target.id);
    let info = event.target.id.split("_")[1];
    $(info).hidden = false;
}

function resetInfo() {
    datosGenerales.hidden = true;
    datosDireccion.hidden = true;
}


const $ = (id) => document.getElementById(id);