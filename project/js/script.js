document.addEventListener('DOMContentLoaded', initialize);

function initialize() {
    let dataTable = new DataTable('#tbProductos');
    const tabla = $('tbProductos');

    tabla.addEventListener('click', (event) => {
        const btn = event.target.closest('.edit-btn, .delete-btn'); // Encuentra el botón más cercano
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
    const abr = $('abr_' + id).textContent;

    Swal.fire({
        title: 'Editar escuela',
        html: formInputs(abr, nomInst),
        showCancelButton: true,
        confirmButtonText: 'Actualizar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#28a745',
        preConfirm: () => {
            return [
                $('abreviatura').value,
                $('nombre').value
            ];
        }
    });
}

function deleteAlert(event) {
    // Obtener información del producto a partir de event.target (si es necesario)
    let name = $('nombre_' + event.target.id.split("_")[1]).textContent;
    Swal.fire({
        icon: 'warning',
        title: 'Eliminar escuela',
        text: '¿Estás seguro de que deseas eliminar esta escuela?\n' + name,
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#d33'
    });
}

const formInputs = (abr, nombre) => {
    return `
        <input id="abreviatura" class="swal2-input" value="${abr}" required>
        <textarea id="nombre" class="swal2-textarea" required>${nombre}</textarea>
    `;
}

const $ = (id) => document.getElementById(id);