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

export function existeEmpleado() {
  const form = document.querySelector('#anadir-empleado form');
  const btnRegistro = document.getElementById('registroEmpleado');
  
  if (!form || !btnRegistro) return;
  
  form.addEventListener('submit', async function(e) {
      e.preventDefault();
      
      const dni = document.getElementById('dni_empleado').value;
      const numSeguridadSocial = document.getElementById('num_seguridad_social').value;
      const email = document.getElementById('email_empleado').value;
      
      try {
          const response = await fetch('/existe-empleado', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                  dni: dni,
                  num_seguridad_social: numSeguridadSocial,
                  email: email
              })
          });
          
          const data = await response.json();
          
          if (data.existe) {
              Swal.fire({
                  title: 'Error al registrar empleado',
                  text: 'El empleado ya existe',
                  icon: 'error',
                  background: '#825abd',
                  color: '#FFFFFF',
                  confirmButtonText: 'OK',
                  customClass: {
                      confirmButton: 'btn-primary'
                  }
              });
          } else {
            Swal.fire({
              title: "El empleado se ha registrado correctamente",
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
              form.submit();
            })
          }
      } catch (error) {
          console.error('Error:', error);
          Swal.fire({
              title: 'Error',
              text: 'Ocurrió un error al verificar el empleado',
              icon: 'error',
              background: '#825abd',
              color: '#FFFFFF'
          });
      }
  });
}
