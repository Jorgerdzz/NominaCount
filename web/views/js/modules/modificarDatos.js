
import {
    validarCIF,
    validarDenominacionSocial,
    validarNombreComercial,
    validarDireccion,
    validarNombre,
    validarApellidos,
    validarDNI,
    validarNumSS,
    validarEmail,
    validarTelefono,
    validarFechaNacimiento,
    validarCategoriaProfesional,
    validarMinusvalia,
    validarNumHijos,
    validarEstadoCivil,
    validarSalarioBase,
    validarContra
}from "./validaciones.js";

export function modificarDatosEmpleado() {
    const campos = {
        nombre_empleado: document.getElementById('editar-nombre-empleado'),
        apellidos_empleado: document.getElementById('editar-apellidos-empleado'),
        dni_empleado: document.getElementById('editar-dni-empleado'),
        num_seguridad_social: document.getElementById('editar-num-seguridad-social'),
        email_empleado: document.getElementById('editar-email-empleado'),
        telefono_empleado: document.getElementById('editar-telefono-empleado'),
        antiguedad_empresa: document.getElementById('editar-antiguedad-empleado'),
        categoria_profesional: document.getElementById('editar-categoria-profesional'),
        minusvalia: document.getElementById('editar-minusvalia'),
        num_hijos: document.getElementById('editar-hijos-empleado'),
        estado_civil: document.getElementById('editar-estado-empleado'),
        fecha_nacimiento: document.getElementById('editar-nacimiento-empleado'),
        salario_base: document.getElementById('editar-salario-empleado')
    };

    const botonModificar = document.getElementById('modificarDatosEmpleado');
    const botonConfirmar = document.getElementById('confirmarModificacion');

    botonConfirmar.disabled = true;

    const camposModificados = {};
    const valoresOriginales = {};
    const validaciones = {};

    Object.keys(campos).forEach(campo => {
        camposModificados[campo] = false;
        valoresOriginales[campo] = campos[campo].value;
        validaciones[campo] = true; 
    });

    function campoModificado(campo, valor) {
        return valoresOriginales[campo] !== valor;
    }

    function algunCampoModificado() {
        return Object.values(camposModificados).some(modificado => modificado);
    }

    function validarCamposModificados() {
        if (!algunCampoModificado()) {
            botonConfirmar.disabled = true;
            return;
        }

        let formularioValido = true;
        
        for (const campo in camposModificados) {
            if (camposModificados[campo] && !validaciones[campo]) {
                formularioValido = false;
                break;
            }
        }
        
        botonConfirmar.disabled = !formularioValido;
    }

    const validadores = {
        nombre_empleado: validarNombre,
        apellidos_empleado: validarApellidos,
        dni_empleado: validarDNI,
        num_seguridad_social: validarNumSS,
        email_empleado: validarEmail,
        telefono_empleado: validarTelefono,
        antiguedad_empresa: validarFechaNacimiento,
        categoria_profesional: validarCategoriaProfesional,
        minusvalia: validarMinusvalia,
        num_hijos: validarNumHijos,
        estado_civil: validarEstadoCivil,
        fecha_nacimiento: validarFechaNacimiento,
        salario_base: validarSalarioBase
    };

    function configurarValidacionCampo(campo, elemento, funcionValidacion) {
        const eventType = campo === 'estado_civil' ? 'change' : 'input';
        
        elemento.addEventListener(eventType, () => {
            const modificado = campoModificado(campo, elemento.value);
            camposModificados[campo] = modificado;
            
            if (modificado) {
                if (funcionValidacion(elemento.value)) {
                    validaciones[campo] = true;
                    elemento.style.border = "solid green";
                } else {
                    validaciones[campo] = false;
                    elemento.style.border = "solid red";
                }
            } else {
                validaciones[campo] = true;
                elemento.style.border = "";
            }
            
            validarCamposModificados();
        });
    }

    botonModificar.addEventListener('click', () => {
        Object.keys(campos).forEach(campo => {
            configurarValidacionCampo(campo, campos[campo], validadores[campo]);
        });
    });
}

export function modificarDatosUsuario() {
    const cif = document.getElementById('editar-cif');
    const denominacion_social = document.getElementById('editar-denominacion-social');
    const nombre_comercial = document.getElementById('editar-nombre-comercial');
    const telefono = document.getElementById('editar-telefono');
    const direccion = document.getElementById('editar-direccion');
    const nombre_usuario = document.getElementById('editar-nombre-usuario');
    const email_usuario = document.getElementById('editar-email-usuario');

    const botonModificar = document.getElementById('boton-editar-perfil-usuario');
    const botonConfirmar = document.getElementById('editarUsuario');

    botonConfirmar.disabled = true;

    const camposModificados = {
        cif: false,
        denominacion_social: false,
        nombre_comercial: false,
        telefono: false,
        direccion: false,
        nombre_usuario: false,
        email_usuario: false
    };

    const valoresOriginales = {
        cif: cif.value,
        denominacion_social: denominacion_social.value,
        nombre_comercial: nombre_comercial.value,
        telefono: telefono.value,
        direccion: direccion.value,
        nombre_usuario: nombre_usuario.value,
        email_usuario: email_usuario.value
    };

    const validaciones = {
        cif: true,
        denominacion_social: true,
        nombre_comercial: true,
        telefono: true,
        direccion: true,
        nombre_usuario: true,
        email_usuario: true
    };

    function campoModificado(campo, valor) {
        return valoresOriginales[campo] !== valor;
    }

    function algunCampoModificado() {
        return Object.values(camposModificados).some(modificado => modificado);
    }

    function validarCamposModificados() {
        if (!algunCampoModificado()) {
            botonConfirmar.disabled = true;
            return;
        }

        let formularioValido = true;
        
        for (const campo in camposModificados) {
            if (camposModificados[campo] && !validaciones[campo]) {
                formularioValido = false;
                break;
            }
        }
        
        botonConfirmar.disabled = !formularioValido;
    }

    function configurarValidacionCampo(campo, elemento, funcionValidacion) {
        elemento.addEventListener("input", () => {
            const modificado = campoModificado(campo, elemento.value);
            camposModificados[campo] = modificado;
            
            if (modificado) {
                if (funcionValidacion(elemento.value)) {
                    validaciones[campo] = true;
                    elemento.style.border = "solid green";
                } else {
                    validaciones[campo] = false;
                    elemento.style.border = "solid red";
                }
            } else {
                validaciones[campo] = true;
                elemento.style.border = "";
            }
            
            validarCamposModificados();
        });
    }

    botonModificar.addEventListener('click', () => {
        configurarValidacionCampo('cif', cif, validarCIF);
        configurarValidacionCampo('denominacion_social', denominacion_social, validarDenominacionSocial);
        configurarValidacionCampo('nombre_comercial', nombre_comercial, validarNombreComercial);
        configurarValidacionCampo('telefono', telefono, validarTelefono);
        configurarValidacionCampo('direccion', direccion, validarDireccion);
        configurarValidacionCampo('nombre_usuario', nombre_usuario, validarNombre);
        configurarValidacionCampo('email_usuario', email_usuario, validarEmail);
    });
}

export function modificarContra(){
    const form = document.getElementById("formularioCambiarContra");

    form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const contra_actual = document.getElementById("contra-actual").value;
    const nueva_contra = document.getElementById("nueva-contra").value;
    const confirmar_contra = document.getElementById("confirmar-contra").value;

    try {
      const response = await fetch("/cambiar-contrasena", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          contra_actual: contra_actual,
          nueva_contra: nueva_contra,
          confirmar_contra: confirmar_contra,
        }),
      });

      const data = await response.json();

      if (data.exito) {
        Swal.fire({
          title: "Exito",
          text: "La contraseña se ha cambiado correctamente",
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
          window.location.href = "/mi-cuenta";
        });
      } else {
        Swal.fire({
          title: "Error",
          text: "Las contraseñas no coinciden",
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
          window.location.href = "/mi-cuenta";
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar las contraseñas",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function validarCambiarContra(){
    const contra_actual = document.getElementById("contra-actual");
    const nueva_contra = document.getElementById("nueva-contra");
    const confirmar_contra = document.getElementById("confirmar-contra");

    const boton = document.getElementById("cambiar-contra");

    let contra_actualValido = false;
    let nueva_contraValido = false;
    let confirmar_contraValido = false;

    contra_actual.addEventListener("input", ()=>{
        if(validarContra(contra_actual.value)){
            contra_actualValido = true;
            contra_actual.style.border = "solid green";
        } else{
            contra_actual.style.border = "solid red";
        }
        contraValida();
    })

    nueva_contra.addEventListener("input", ()=>{
        if(validarContra(nueva_contra.value)){
            nueva_contraValido = true;
            nueva_contra.style.border = "solid green";
        } else{
            nueva_contra.style.border = "solid red";
        }
        contraValida();
    })

    confirmar_contra.addEventListener("input", ()=>{
        if(validarContra(confirmar_contra.value)){
            confirmar_contraValido = true;
            confirmar_contra.style.border = "solid green";
        } else{
            confirmar_contra.style.border = "solid red";
        }
        contraValida();
    })

    function contraValida(){
        if(contra_actualValido && nueva_contraValido && confirmar_contraValido){
            boton.disabled = false;
        } else{
            boton.disabled = true;
        }
    }
}