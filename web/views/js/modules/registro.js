import {
  validarCIF,
  validarDenominacionSocial,
  validarNombreComercial,
  validarDireccion,
  validarTelefono,
  validarPersona,
  validarEmail,
  validarContra,
} from "./validaciones.js";

export function validarRegistro() {
  const cifInput = document.getElementById("cif");
  const denominacionSocialInput = document.getElementById(
    "denominacion_social"
  );
  const nombreComercialInput = document.getElementById("nombre_comercial");
  const direccionInput = document.getElementById("direccion");
  const telefonoInput = document.getElementById("telefono");
  const personaInput = document.getElementById("persona");
  const emailInput = document.getElementById("email");
  const contraInput = document.getElementById("contra");
  const fuerzaContra = document.getElementById("fuerzaContra");
  const privacidad = document.getElementById("privacidad");
  const botonRegistro = document.getElementById("botonRegistro");

  let cifValido = false;
  let denominacionSocialValido = false;
  let nombreComercialValido = false;
  let direccionValida = false;
  let telefonoValido = false;
  let personaValido = false;
  let emailValido = false;
  let contraValida = false;
  let privacidadValida = false;

  cifInput.addEventListener("input", () => {
    if (validarCIF(cifInput.value)) {
      cifValido = true;
      cifInput.style.border = "solid green";
    } else {
      cifInput.style.border = "solid red";
    }
    registroValido();
  });

  denominacionSocialInput.addEventListener("input", () => {
    if (validarDenominacionSocial(denominacionSocialInput.value)) {
      denominacionSocialValido = true;
      denominacionSocialInput.style.border = "solid green";
    } else {
      denominacionSocialInput.style.border = "solid red";
    }
    registroValido();
  });

  nombreComercialInput.addEventListener("input", () => {
    if (validarNombreComercial(nombreComercialInput.value)) {
      nombreComercialValido = true;
      nombreComercialInput.style.border = "solid green";
    } else {
      nombreComercialInput.style.border = "solid red";
    }
    registroValido();
  });

  direccionInput.addEventListener("input", () => {
    if (validarDireccion(direccionInput.value)) {
      direccionValida = true;
      direccionInput.style.border = "solid green";
    } else {
      direccionInput.style.border = "solid red";
    }
    registroValido();
  });

  telefonoInput.addEventListener("input", () => {
    if (validarTelefono(telefonoInput.value)) {
      telefonoValido = true;
      telefonoInput.style.border = "solid green";
    } else {
      telefonoInput.style.border = "solid red";
    }
    registroValido();
  });

  personaInput.addEventListener("input", () => {
    if (validarPersona(personaInput.value)) {
      personaValido = true;
      personaInput.style.border = "solid green";
    } else {
      personaInput.style.border = "solid red";
    }
    registroValido();
  });

  emailInput.addEventListener("input", () => {
    if (validarEmail(emailInput.value)) {
      emailValido = true;
      emailInput.style.border = "solid green";
    } else {
      emailInput.style.border = "solid red";
    }
    registroValido();
  });

  contraInput.addEventListener("input", () => {
    if (validarContra(contraInput.value)) {
      contraValida = true;
      contraInput.style.border = "solid green";
    } else {
      contraInput.style.border = "solid red";
    }
    registroValido();
  });

  contraInput.addEventListener("input", () => {
    let fuerza = 0;
    if (contraInput.value.length >= 8) fuerza++;
    if (/[A-Z]/.test(contraInput.value)) fuerza++;
    if (/[0-9]/.test(contraInput.value)) fuerza++;
    if (/[@$!%*?&]/.test(contraInput.value)) fuerza++;

    const colores = ["red", "orange", "yellow", "green"];
    fuerzaContra.style.backgroundColor = colores[fuerza];
    fuerzaContra.style.width = `${fuerza * 25}%`;

    if (fuerza === 0) fuerzaContra.style.width = "10%";
    if (contraInput.value.length === 0) fuerzaContra.style.width = "0%";
  });

  privacidad.addEventListener("change", () => {
    privacidadValida = privacidad.checked;
    registroValido();
  });

  function registroValido() {
    if (
      cifValido &&
      denominacionSocialValido &&
      nombreComercialValido &&
      direccionValida &&
      telefonoValido &&
      personaValido &&
      emailValido &&
      contraValida &&
      privacidadValida
    ) {
      botonRegistro.disabled = false;
    } else {
      botonRegistro.disabled = true;
    }
  }

  // botonRegistro.addEventListener("click", (event) => {
  //   event.preventDefault();
  //   console.log(botonRegistro.value);
  //   if (botonRegistro.value === "true") {
  //     Swal.fire({
  //       title: "Registro Exitoso",
  //       text: "La empresa se ha creado correctamente",
  //       icon: "success",
  //       background: "#825abd",
  //       color: "#FFFFFF",
  //       showConfirmButton: true,
  //       confirmButtonText: "OK",
  //       customClass: {
  //         title: "h3",
  //         confirmButton: "btn-primary",
  //       },
  //       position: "center",
  //       timer: 3000,
  //       timerProgressBar: true,
  //     }).then((result) => {
  //       if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
  //         document.getElementById("formularioRegistro").submit();
  //       }
  //     });
  //   } else {
  //     Swal.fire({
  //       title: "Registro Erroneo",
  //       text: "La empresa ya existe",
  //       icon: "error",
  //       background: "#825abd",
  //       color: "#FFFFFF",
  //       showConfirmButton: true,
  //       confirmButtonText: "OK",  
  //       customClass: {
  //         title: "h3",
  //         confirmButton: "btn-primary",
  //       },
  //       position: "center",
  //       timer: 3000,
  //       timerProgressBar: true,
  //     }).then((result) => {
  //       if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
  //         document.getElementById("formularioRegistro").submit();
  //       }
  //     });
  //   }
  // });
}



