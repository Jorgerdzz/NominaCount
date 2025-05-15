import { validarEmail, validarContra } from "./validaciones.js";

export function existeEmail() {
  const form = document.getElementById("formularioComprobarCorreo");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById("comprobarEmail").value;

    try {
      const response = await fetch("/comprobar-correo", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email,
        }),
      });

      const data = await response.json();

      if (data.existe) {
        const formContra = document.getElementById(
          "formularioEstablecerContra"
        );
        formContra.dataset.id_usuario = data.id_usuario;

        const modal = new bootstrap.Modal(
          document.getElementById("establecer-contra")
        );
        modal.show();
      } else {
        Swal.fire({
          title: "Error",
          text: "Dirección de correo electrónico no registrada",
          icon: "error",
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
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el correo electrónico",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function validarComprobacionEmail() {
  const emailInput = document.getElementById("comprobarEmail");
  const boton = document.getElementById("botonComprobarCorreo");

  let emailValido = false;

  emailInput.addEventListener("input", () => {
    if (validarEmail(emailInput.value)) {
      emailValido = true;
      emailInput.style.border = "solid green";
    } else {
      emailInput.style.border = "solid red";
    }
    comprobarEmailValido();
  });

  function comprobarEmailValido(){
    boton.disabled = !emailValido;
  }
}

export function establecerContra() {
  const form = document.getElementById("formularioEstablecerContra");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const nuevaContra = document.getElementById("nueva-contra").value;
    const id_usuario = form.dataset.id_usuario;

    try {
      const response = await fetch("/nueva-contra", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          contra: nuevaContra,
          id_usuario: id_usuario,
        }),
      });

      const data = await response.json();

      if (data.exito) {
        Swal.fire({
          title: "Exito",
          text: "La contraseña se ha establecido correctamente",
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
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al establecer la contraseña",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function validarNuevaContra() {
  const nuevaContraInput = document.getElementById("nueva-contra");
  const fuerzaNuevaContra = document.getElementById("fuerzaNuevaContra");
  const boton = document.getElementById("botonEstablecerContra");

  let nuevaContraValida = false;

  nuevaContraInput.addEventListener("input", () => {
    if (validarContra(nuevaContraInput.value)) {
      nuevaContraValida = true;
      nuevaContraInput.style.border = "solid green";
    } else {
      nuevaContraValida = false;
      nuevaContraInput.style.border = "solid red";
    }
    contraValida();
  });

  nuevaContraInput.addEventListener("input", () => {
    let fuerza = 0;
    if (nuevaContraInput.value.length >= 8) fuerza++;
    if (/[A-Z]/.test(nuevaContraInput.value)) fuerza++;
    if (/[0-9]/.test(nuevaContraInput.value)) fuerza++;
    if (/[@$!%*?&]/.test(nuevaContraInput.value)) fuerza++;

    const colores = ["red", "orange", "yellow", "green"];
    fuerzaNuevaContra.style.backgroundColor = colores[fuerza];
    fuerzaNuevaContra.style.width = `${fuerza * 25}%`;

    if (fuerza === 0) fuerzaNuevaContra.style.width = "10%";
    if (nuevaContraInput.value.length === 0)
      fuerzaNuevaContra.style.width = "0%";
  });

  function contraValida() {
    boton.disabled = !nuevaContraValida;
  }
}
