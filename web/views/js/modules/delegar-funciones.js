import { validarEmail, validarNombre } from "./validaciones.js";

export function validarDelegarFunciones() {
  const form = document.getElementById("formDelegarFunciones");

  if (!form) return;

  const nombreUsuario = document.getElementById("delegar_nombre_usuario");
  const emailUsuario = document.getElementById("delegar_email");

  const boton = document.getElementById("botonDelegarFunciones");

  let nombreUsuarioValido = false;
  let emailUsuarioValido = false;

  nombreUsuario.addEventListener("input", () => {
    if (validarNombre(nombreUsuario.value)) {
      nombreUsuarioValido = true;
      nombreUsuario.style.border = "solid green";
    } else {
      nombreUsuario.style.border = "solid red";
    }
    delegacionAceptada();
  });

  emailUsuario.addEventListener("input", () => {
    if (validarEmail(emailUsuario.value)) {
      emailUsuarioValido = true;
      emailUsuario.style.border = "solid green";
    } else {
      emailUsuario.style.border = "solid red";
    }
    delegacionAceptada();
  });

  function delegacionAceptada() {
    if (nombreUsuarioValido && emailUsuarioValido) {
      boton.disabled = false;
    } else {
      boton.disabled = true;
    }
  }
}

export function delegarFunciones() {
  const form = document.getElementById("formDelegarFunciones");

  if (!form) return;

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch("/delegar-usuarios", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.exito) {
        Swal.fire({
          title: "Exito",
          text: "Sus funciones se han delegado correctamente",
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
            window.location.href = "/empresa";
        });
      }else{
        Swal.fire({
          title: "Error",
          text: "El usuario no existe",
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
        }).then(() => {
            window.location.href = "/empresa";
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar la empresa",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}
