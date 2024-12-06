//Anular el submit del formulario
let formulario = document.getElementById("formulario");
formulario.addEventListener("submit", formulario_submit);

function formulario_submit(e) {
    e.preventDefault();
    //alert("submit anulado, haz lo que quieras :)");
    
    //preparar los datos del formulario
    
    //llamada a sweetalert
    let datos = new FormData(formulario);
    llamadaASweetAlert(datos, "/functions/prueba.php");
}

function llamadaASweetAlert(datos, actionUrl) {
    console.log(datos);
    Swal.fire({
      title: "Seguro que deseas guardar los cambios?",
      text: "No podrás revertir esto",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, guardar cambios",
      showLoaderOnConfirm: true,
      preConfirm: async () => {
        try {
          const response = await fetch(actionUrl, {
            method: "POST",
            body: datos
          });

          if (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
          }

          const data = await response.json();

          if (data.resultado !== 1) {
            Swal.showValidationMessage("Hubo un problema al insertar los datos");
          }

          return data;
        } catch (error) {
          Swal.showValidationMessage(`Error en la solicitud: ${error.message}`);
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: "success",
          title: "Datos enviados correctamente",
          text: "¡La inserción fue exitosa!"
        });
      }
    });
} 