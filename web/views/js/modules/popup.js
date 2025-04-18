const BASE_PATH = "http://localhost:8000";

export function eliminarDepartamento() {
  const botonEliminar = document.getElementById("eliminar-departamento");
  const id_departamentoInput = document.getElementById("id_departamento");
  let id_departamento = id_departamentoInput.value;
  console.log(id_departamento);

  botonEliminar.addEventListener("click", () => {
    Swal.fire({
      title: "¿Desea eliminar definitivamente el departamento?",
      icon: "question",
      background: "#825abd",
      color: "#FFFFFF",
      showConfirmButton: true,
      confirmButtonText: "OK",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      customClass: {
        title: "h3",
        confirmButton: "btn-primary",
        cancelButton: "btn-primary",
      },
      position: "center",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(BASE_PATH + "/eliminar-departamento", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ id_departamento: id_departamento }),
        })
          .then((response) => {
            if (!response.ok) {
              throw new Error("Error en la respuesta del servidor");
            }
            Swal.fire({
              title: "El departamento se ha eliminado correctamente",
              icon: "success",
              background: "#825abd",
              color: "#FFFFFF",
              showConfirmButton: true,
              confirmButtonText: "OK",
              customClass: {
                title: "h3",
                confirmButton: "btn-primary",
              },
              position: "center",
              timer: 3000,
              timerProgressBar: true,
            }).then(() => {
              window.location.href = BASE_PATH + "/empresa";
            });
          })
          .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
              title: "Error al eliminar el departamento",
              text: error.message,
              icon: "error",
              background: "#825abd",
              color: "#FFFFFF",
            });
          });
      }
    });
  });
}


