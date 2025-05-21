export function eliminarEmpresa() {
  const boton = document.getElementById("botonEliminarEmpresa");

  boton.addEventListener("click", () => {
    Swal.fire({
      title: `¿Desea eliminar definitivamente la empresa?`,
      text: "Se eliminarán todos los datos relacionados con la misma",
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
    }).then((resultado) => {
      if (resultado.isConfirmed) {
        fetch("/eliminar-empresa", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id_empresa: window.empresaData.id_empresa,
            db_nombre: window.empresaData.db_nombre,
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            Swal.fire({
              title: "Éxito",
              text: "La empresa se ha eliminado correctamente",
              icon: "success",
              background: "#825abd",
              color: "#FFFFFF",
              confirmButtonText: "OK",
              customClass: {
                confirmButton: "btn-primary",
              },
              timer: 3000,
              timerProgressBar: true,
            }).then(() => {
              window.location.href = "/"; 
            });
          } else {
            Swal.fire({
              title: "Error",
              text: "No se pudo eliminar la empresa.",
              icon: "error",
              background: "#825abd",
              color: "#FFFFFF",
              confirmButtonText: "OK",
              customClass: {
                confirmButton: "btn-primary",
              },
            });
          }
        })
        .catch((error) => {
          Swal.fire({
            title: "Error",
            text: "Error al comunicarse con el servidor",
            icon: "error",
            background: "#825abd",
            color: "#FFFFFF",
            confirmButtonText: "OK",
            customClass: {
              confirmButton: "btn-primary",
            },
          });
          console.error("Error en la petición:", error);
        });
      }
    });
  });
}
