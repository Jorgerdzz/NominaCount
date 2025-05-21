import {
  validarNombre,
  validarEmail,
  validarDenominacionSocial,
  validarAsunto,
  validarMensaje,
} from "./validaciones.js";

export function validarFormContacto(){
  const nombre = document.getElementById("name");
  const email = document.getElementById("email");
  const empresa = document.getElementById("company");
  const asunto = document.getElementById("subject");
  const mensaje = document.getElementById("message");
  const privacidad = document.getElementById("privacy");

  const botonRegistro = document.getElementById("send-btn");

  let nombreValido = false;
  let emailValido = false;
  let empresaValido = false;
  let asuntoValido = false;
  let mensajeValido = false;
  let privacidadValido = false;

  nombre.addEventListener("input", () => {
    if (validarNombre(nombre.value)) {
      nombreValido = true;
      nombre.style.border = "solid green";
    } else {
      nombre.style.border = "solid red";
    }
    contactoValido();
  });

  email.addEventListener("input", () => {
    if (validarEmail(email.value)) {
      emailValido = true;
      email.style.border = "solid green";
    } else {
      email.style.border = "solid red";
    }
    contactoValido();
  });

  empresa.addEventListener("input", () => {
    if (validarDenominacionSocial(empresa.value)) {
      empresaValido = true;
      empresa.style.border = "solid green";
    } else {
      empresa.style.border = "solid red";
    }
    contactoValido();
  });

  asunto.addEventListener("change", () => {
    if (validarAsunto(asunto.value)) {
      asuntoValido = true;
      asunto.style.border = "solid green";
    } else {
      asunto.style.border = "solid red";
    }
    contactoValido();
  });

  mensaje.addEventListener("input", () => {
      if (validarMensaje(mensaje.value)) {
        mensajeValido = true;
        mensaje.style.border = "solid green";
      } else {
        mensaje.style.border = "solid red";
      }
      contactoValido();
    });

    privacidad.addEventListener("change", () => {
        privacidadValido = privacidad.checked;
        contactoValido();
    });

    function contactoValido() {
        if (
        nombreValido &&
        emailValido &&
        empresaValido &&
        asuntoValido &&
        mensajeValido &&
        privacidadValido
        ) {
        botonRegistro.disabled = false;
        } else {
        botonRegistro.disabled = true;
        }
    }
}

export function enviarMensaje(){
    const form = document.getElementById("formContacto");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();
    
        Swal.fire({
            title: "Exito",
            text: "El mensaje se ha enviado correctamente",
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
        });
    });

}