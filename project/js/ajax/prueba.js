//Anular el submit del formulario
let formulario = document.getElementById("formulario");
formulario.addEventListener("submit", formulario_submit);

function formulario_submit(e) {
    e.preventDefault();
    let datos = new FormData(formulario);
    llamadaASweetAlert(datos, "../_view/functions/prueba.php");
}

function llamadaASweetAlert(datos, actionUrl) {
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
            body: datos,
          });
          if (!response.ok) {
            throw new Error(response.statusText);
          }
          console.log(response);
          const data = await response.text();
          console.log(data);
          if (!data) {
            throw new Error(data);
          }
          return data;
        } catch (error) {
          Swal.showValidationMessage(`Request failed: ${error}`);
        }  
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: "success",
          title: "Datos enviados correctamente",
          text: "Si purula",
        });
      }
    });
} 