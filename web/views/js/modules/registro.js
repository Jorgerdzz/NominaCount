import {
  validarCIF,
  validarDenominacionSocial,
  validarNombreComercial,
  validarDireccion,
  validarTelefono,
  validarLogo,
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
  const emailInput = document.getElementById("correo_empresa");
  const logoInput = document.getElementById("logo");
  const privacidad = document.getElementById("privacidad");
  const botonRegistro = document.getElementById("botonRegistroEmpresa");

  let cifValido = false;
  let denominacionSocialValido = false;
  let nombreComercialValido = false;
  let direccionValida = false;
  let telefonoValido = false;
  let logoValido = false;
  let emailValido = false;
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

  emailInput.addEventListener("input", () => {
    if (validarEmail(emailInput.value)) {
      emailValido = true;
      emailInput.style.border = "solid green";
    } else {
      emailInput.style.border = "solid red";
    }
    registroValido();
  });

  logoInput.addEventListener("input", () => {
    if (validarLogo(logoInput)) {
      logoValido = true;
      logoInput.style.border = "solid green";
    } else {
      logoInput.style.border = "solid red";
    }
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
      emailValido &&
      privacidadValida
    ) {
      botonRegistro.disabled = false;
    } else {
      botonRegistro.disabled = true;
    }
  }
}
