document.addEventListener('DOMContentLoaded', iniciar);

function iniciar() {
    let dataTable = new DataTable('#tbAlumnos');
    const tabla = $('tbAlumnos');

    tabla.addEventListener('click', (event) => {
        const btn = event.target.closest('.edit-btn, .delete-btn');
        if (btn) {
            if (btn.classList.contains('edit-btn')) {
                editAlert(event);
            } else if (btn.classList.contains('delete-btn')) {
                deleteAlert(event);
            }
        }
    });
}

function editAlert(event) {
    let id = event.target.id.split("_")[1];
    const nomInst = $('nombre_' + id).textContent;
    const boleta = $('boleta_' + id).textContent;

    Swal.fire({
        title: 'Editar alumno',
        html: formAlumno(boleta, nomInst),
        showCancelButton: true,
        confirmButtonText: 'Actualizar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#28a745',
        preConfirm: () => {
            return [
                $('boleta').value,
                $('nombre').value
            ];
        }
    });
}

function deleteAlert(event) {
    let name = $('nombre_' + event.target.id.split("_")[1]).textContent;
    Swal.fire({
        icon: 'warning',
        title: 'Eliminar alumno',
        text: '¿Estás seguro de que deseas dar de baja el alumno?\n' + name,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33'
    });
}

const formAlumno = (boleta, nombre) => {
    const scapedBoleta = scapeHTML(boleta);
    const scapedNombre = scapeHTML(nombre);

    return `
        <input id="boleta" class="swal2-input" value="${scapedBoleta}" required>
        <textarea id="nombre" class="swal2-textarea" required>${scapedNombre}</textarea>
    `;
}

function scapeHTML(str) {
    const p = document.createElement('p');
    p.textContent = str;
    return p.innerHTML;
}

const $ = (id) => document.getElementById(id);