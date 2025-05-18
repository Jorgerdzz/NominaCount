import {
  validarNombre,
  validarApellidos,
  validarDNI,
  validarEmail,
  validarContra,
  validarNumSS,
  validarTelefono,
  validarFechaNacimiento,
  validarCategoriaProfesional,
  validarMinusvalia,
  validarNumHijos,
  validarEstadoCivil,
  validarSalarioBase
} from "./validaciones.js";

export function registroCEO() {
  const form = document.getElementById("formularioRegistroCEO");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const apellidos = document.getElementById("apellidos").value;
    const dni = document.getElementById("dni").value;
    const email_ceo = document.getElementById("email_ceo").value;
    const contra = document.getElementById("contra").value;
    const num_seguridad_social = document.getElementById(
      "num_seguridad_social"
    ).value;
    const telefono_ceo = document.getElementById("telefono_ceo").value;
    const fecha_incorporacion = document.getElementById(
      "fecha_incorporacion"
    ).value;
    const categoria_profesional = document.getElementById(
      "categoria_profesional"
    ).value;
    const num_hijos = document.getElementById("num_hijos").value;
    const estado_civil = document.getElementById("estado_civil").value;
    const fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    const minusvalia = document.getElementById("minusvalia").value;
    const salario_base = document.getElementById("salario_base").value;
    const cif = form.dataset.cif;

    try {
      const response = await fetch("/registro-ceo", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          nombre: nombre,
          apellidos: apellidos,
          dni: dni,
          email_ceo: email_ceo,
          contra: contra,
          num_seguridad_social: num_seguridad_social,
          telefono_ceo: telefono_ceo,
          fecha_incorporacion: fecha_incorporacion,
          categoria_profesional: categoria_profesional,
          num_hijos: num_hijos,
          estado_civil: estado_civil,
          fecha_nacimiento: fecha_nacimiento,
          minusvalia: minusvalia,
          salario_base: salario_base,
          cif: cif,
        }),
      });

      const data = await response.json();

      if (data.exito) {
        Swal.fire({
          title: "Registro exitoso",
          text: "Sus datos personales y laborales se han registrado correctamente",
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
          window.location.href = "/";
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el CEO",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function validarRegistroCEO() {
  const nombre = document.getElementById("nombre");
  const apellidos = document.getElementById("apellidos");
  const dni = document.getElementById("dni");
  const email_ceo = document.getElementById("email_ceo");
  const contraInput = document.getElementById("contra");
  const fuerzaContra = document.getElementById("fuerzaContra");
  const num_seguridad_social = document.getElementById("num_seguridad_social");
  const telefono_ceo = document.getElementById("telefono_ceo");
  const fecha_incorporacion = document.getElementById("fecha_incorporacion");
  const categoria_profesional = document.getElementById(
    "categoria_profesional"
  );
  const num_hijos = document.getElementById("num_hijos");
  const estado_civil = document.getElementById("estado_civil");
  const fecha_nacimiento = document.getElementById("fecha_nacimiento");
  const minusvalia = document.getElementById("minusvalia");
  const salario_base = document.getElementById("salario_base");

  const botonRegistro = document.getElementById("botonRegistroCEO");

  let nombreValido = false;
  let apellidosValido = false;
  let dniValido = false;
  let email_ceoValido = false;
  let contraValida = false;
  let num_seguridad_socialValido = false;
  let telefono_ceoValido = false;
  let fecha_incorporacionValido = false;
  let categoria_profesionalValido = false;
  let num_hijosValido = false;
  let estado_civilValido = false;
  let fecha_nacimientoValido = false;
  let minusvaliaValido = false;
  let salario_baseValido = false;

  nombre.addEventListener("input", () => {
    if (validarNombre(nombre.value)) {
      nombreValido = true;
      nombre.style.border = "solid green";
    } else {
      nombre.style.border = "solid red";
    }
    registroValido();
  });

  apellidos.addEventListener("input", () => {
    if (validarApellidos(apellidos.value)) {
      apellidosValido = true;
      apellidos.style.border = "solid green";
    } else {
      apellidos.style.border = "solid red";
    }
    registroValido();
  });

  dni.addEventListener("input", () => {
    if (validarDNI(dni.value)) {
      dniValido = true;
      dni.style.border = "solid green";
    } else {
      dni.style.border = "solid red";
    }
    registroValido();
  });

  num_seguridad_social.addEventListener("input", () => {
    if (validarNumSS(num_seguridad_social.value)) {
      num_seguridad_socialValido = true;
      num_seguridad_social.style.border = "solid green";
    } else {
      num_seguridad_social.style.border = "solid red";
    }
    registroValido();
  });

  email_ceo.addEventListener("input", () => {
    if (validarEmail(email_ceo.value)) {
      email_ceoValido = true;
      email_ceo.style.border = "solid green";
    } else {
      email_ceo.style.border = "solid red";
    }
    registroValido();
  });

  telefono_ceo.addEventListener("input", () => {
    if (validarTelefono(telefono_ceo.value)) {
      telefono_ceoValido = true;
      telefono_ceo.style.border = "solid green";
    } else {
      telefono_ceo.style.border = "solid red";
    }
    registroValido();
  });

  fecha_incorporacion.addEventListener("input", () => {
    if (validarFechaNacimiento(fecha_incorporacion.value)) {
      fecha_incorporacionValido = true;
      fecha_incorporacion.style.border = "solid green";
    } else {
      fecha_incorporacion.style.border = "solid red";
    }
    registroValido();
  });

  categoria_profesional.addEventListener("change", () => {
    if (validarCategoriaProfesional(categoria_profesional.value)) {
      categoria_profesionalValido = true;
      categoria_profesional.style.border = "solid green";
    } else {
      categoria_profesional.style.border = "solid red";
    }
    registroValido();
  });

  minusvalia.addEventListener("change", () => {
    if (validarMinusvalia(minusvalia.value)) {
      minusvaliaValido = true;
      minusvalia.style.border = "solid green";
    } else {
      minusvalia.style.border = "solid red";
    }
    registroValido();
  });

  num_hijos.addEventListener("input", () => {
    if (validarNumHijos(num_hijos.value)) {
      num_hijosValido = true;
      num_hijos.style.border = "solid green";
    } else {
      num_hijos.style.border = "solid red";
    }
    registroValido();
  });

  estado_civil.addEventListener("change", () => {
    if (validarEstadoCivil(estado_civil.value)) {
      estado_civilValido = true;
      estado_civil.style.border = "solid green";
    } else {
      estado_civil.style.border = "solid red";
    }
    registroValido();
  });

  fecha_nacimiento.addEventListener("input", () => {
    if (validarFechaNacimiento(fecha_nacimiento.value)) {
      fecha_nacimientoValido = true;
      fecha_nacimiento.style.border = "solid green";
    } else {
      fecha_nacimiento.style.border = "solid red";
    }
    registroValido();
  });

  salario_base.addEventListener("input", () => {
    if (validarSalarioBase(salario_base.value)) {
      salario_baseValido = true;
      salario_base.style.border = "solid green";
    } else {
      salario_base.style.border = "solid red";
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

  function registroValido() {
    if (
      nombreValido &&
      apellidosValido &&
      dniValido &&
      email_ceoValido &&
      contraValida &&
      num_seguridad_socialValido &&
      telefono_ceoValido &&
      fecha_incorporacionValido &&
      categoria_profesionalValido &&
      minusvaliaValido &&
      num_hijosValido &&
      estado_civilValido &&
      fecha_nacimientoValido &&
      salario_baseValido
    ) {
      botonRegistro.disabled = false;
    } else {
      botonRegistro.disabled = true;
    }
  }
}
