export async function enviarFormulario(){
    const formulario = document.getElementById("formularioRegistro");
    formulario.addEventListener("submit", (event) => {
      event.preventDefault(); // Prevenimos que se envíe el formulario de forma tradicional
  
      // Obtenemos los valores del formulario
      const formData = new FormData(formulario);
      console.log(formData);
      console.log('estoy en formulario');
      // Usamos Fetch API para enviar los datos de forma asíncrona
      fetch('/', {
          method: 'POST',
          body: formData
      })
      .then(response => response.text()
    
        // return response.text()
        // if (!response.ok) {
        //     throw new Error('Respuesta no válida del servidor');
        // }
        
    ) // Esperamos que el servidor nos devuelva un JSON
      .then(data => {
        console.log('Respuesta del servidor:', data);
          // Aquí manejamos la respuesta del servidor
          if (data.success) {
              // Si la respuesta es exitosa, mostramos el PopUp de éxito
              Swal.fire({
                  title: "Registro Exitoso",
                  text: "La empresa se ha creado correctamente",
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
                  // Cuando se cierre el PopUp, redirigimos o realizamos alguna acción
                  window.location.href = "/"; // O el redireccionamiento que prefieras
              });
          } else {
              // Si la respuesta es un error, mostramos el PopUp de error
              Swal.fire({
                  title: "Registro Erroneo",
                  text: "La empresa ya existe", // El mensaje de error que nos pase el servidor
                  icon: "error",
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
              });
          }
      })
      .catch(error => {
          console.error("Error al enviar los datos:", error);
          Swal.fire({
              title: "Error en el servidor",
              text: "Hubo un problema al procesar tu solicitud.",
              icon: "error",
              background: "#825abd",
              color: "#FFFFFF",
              showConfirmButton: true,
              confirmButtonText: "OK",
          });
      });
  });
  }