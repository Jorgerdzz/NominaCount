import {
  validarCIF,
  validarDenominacionSocial,
  validarNombreComercial,
  validarDireccion,
  validarCiudad,
  validarProvincia,
  validarCP,
  validarTelefono,
  validarPersona,
  validarEmail,
  validarContra,
} from "./validaciones.js";

export function validarRegistro() {
  const cifInput = document.getElementById("cif");
  const denominacionSocialInput = document.getElementById("denominacionSocial");
  const nombreComercialInput = document.getElementById("nombreComercial");
  const direccionInput = document.getElementById("direccion");
  const ciudadInput = document.getElementById("ciudad");
  const provinciaInput = document.getElementById("provincia");
  const cpInput = document.getElementById("cp");
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
  let ciudadValida = false;
  let provinciaValida = false;
  let cpValido = false;
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

  ciudadInput.addEventListener("input", () => {
    if (validarCiudad(ciudadInput.value)) {
      ciudadValida = true;
      ciudadInput.style.border = "solid green";
    } else {
      ciudadInput.style.border = "solid red";
    }
    registroValido();
  });

  provinciaInput.addEventListener("input", () => {
    if (validarProvincia(provinciaInput.value)) {
      provinciaValida = true;
      provinciaInput.style.border = "solid green";
    } else {
      provinciaInput.style.border = "solid red";
    }
    registroValido();
  });

  cpInput.addEventListener("input", () => {
    if (validarCP(cpInput.value)) {
      cpValido = true;
      cpInput.style.border = "solid green";
    } else {
      cpInput.style.border = "solid red";
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
    if (passwordInput.value.length === 0) fuerzaContra.style.width = "0%";
  });

  privacidad.addEventListener("change", () => {
    privacidadValida = privacidad.checked;
    registroValido();
  });

  function registroValido() {
    let registro = false;
    if (
      cifValido &&
      denominacionSocialValido &&
      nombreComercialValido &&
      direccionValida &&
      ciudadValida &&
      provinciaValida &&
      cpValido &&
      telefonoValido &&
      personaValido &&
      emailValido &&
      contraValida &&
      privacidadValida
    ) {
      botonRegistro.disabled = false;
      registro = true;
    } else {
      botonRegistro.disabled = true;
    }
  }

  
}
