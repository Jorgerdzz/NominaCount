
import {
    validarNombre,
    validarApellidos,
    validarDNI,
    validarEmail,
    validarTelefono,
    validarFechaNacimiento,
    validarNumHijos,
    validarEstadoCivil,
    validarSalarioBase
}from "./validaciones.js";



export function registroEmpleado(){
    const nombre_empleado = document.getElementById('nombre_empleado');
    const apellidos_empleado = document.getElementById('apellidos_empleado');
    const dni_empleado = document.getElementById('dni_empleado');
    const email_empleado = document.getElementById('email_empleado');
    const telefono_empleado = document.getElementById('telefono_empleado');
    const antiguedad_empresa = document.getElementById('antiguedad_empresa');
    const num_hijos = document.getElementById('num_hijos');
    const estado_civil = document.getElementById('estado_civil');
    const fecha_nacimiento = document.getElementById('fecha_nacimiento');
    const salario_base = document.getElementById('salario_base');

    const botonRegistro = document.getElementById('registroEmpleado');

    let nombre_empleadoValido = false;
    let apellidos_empleadoValido = false;
    let dni_empleadoValido = false;
    let email_empleadoValido = false;
    let telefono_empleadoValido = false;
    let antiguedad_empresaValido = false;
    let num_hijosValido = false;
    let estado_civilValido = false;
    let fecha_nacimientoValido = false;
    let salario_baseValido = false;



    nombre_empleado.addEventListener("input", ()=>{
        if (validarNombre(nombre_empleado.value)) {
            nombre_empleadoValido = true;
            nombre_empleado.style.border = "solid green";
        } else {
            nombre_empleado.style.border = "solid red";
        }
        registroValido();
    });

    apellidos_empleado.addEventListener("input", ()=>{
        if (validarApellidos(apellidos_empleado.value)) {
            apellidos_empleadoValido = true;
            apellidos_empleado.style.border = "solid green";
        } else {
            apellidos_empleado.style.border = "solid red";
        }
        registroValido();
    });

    dni_empleado.addEventListener("input", ()=>{
        if (validarDNI(dni_empleado.value)) {
            dni_empleadoValido = true;
            dni_empleado.style.border = "solid green";
        } else {
            dni_empleado.style.border = "solid red";
        }
        registroValido();
    });

    email_empleado.addEventListener("input", ()=>{
        if (validarEmail(email_empleado.value)) {
            email_empleadoValido = true;
            email_empleado.style.border = "solid green";
        } else {
            email_empleado.style.border = "solid red";
        }
        registroValido();
    });

    telefono_empleado.addEventListener("input", ()=>{
        if (validarTelefono(telefono_empleado.value)) {
            telefono_empleadoValido = true;
            telefono_empleado.style.border = "solid green";
        } else {
            telefono_empleado.style.border = "solid red";
        }
        registroValido();
    });

    antiguedad_empresa.addEventListener("input", ()=>{
        if (validarFechaNacimiento(antiguedad_empresa.value)) {
            antiguedad_empresaValido = true;
            antiguedad_empresa.style.border = "solid green";
        } else {
            antiguedad_empresa.style.border = "solid red";
        }
        registroValido();
    });

    num_hijos.addEventListener("input", ()=>{
        if (validarNumHijos(num_hijos.value)) {
            num_hijosValido = true;
            num_hijos.style.border = "solid green";
        } else {
            num_hijos.style.border = "solid red";
        }
        registroValido();
    });

    estado_civil.addEventListener("change", ()=>{
        if (validarEstadoCivil(estado_civil.value)) {
            estado_civilValido = true;
            estado_civil.style.border = "solid green";
        } else {
            estado_civil.style.border = "solid red";
        }
        registroValido();
    });

    fecha_nacimiento.addEventListener("input", ()=>{
        if (validarFechaNacimiento(fecha_nacimiento.value)) {
            fecha_nacimientoValido = true;
            fecha_nacimiento.style.border = "solid green";
        } else {
            fecha_nacimiento.style.border = "solid red";
        }
        registroValido();
    });

    salario_base.addEventListener("input", ()=>{
        if (validarSalarioBase(salario_base.value)) {
            salario_baseValido = true;
            salario_base.style.border = "solid green";
        } else {
            salario_base.style.border = "solid red";
        }
        registroValido();
    });

    function registroValido() {
        if (
          nombre_empleadoValido &&
          apellidos_empleadoValido &&
          dni_empleadoValido &&
          email_empleadoValido &&
          telefono_empleadoValido &&
          antiguedad_empresaValido &&
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