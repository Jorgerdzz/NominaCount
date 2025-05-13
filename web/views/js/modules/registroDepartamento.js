import {
    validarNombre,
}from "./validaciones.js";

export function registroDepartamento(){
    const nombre_departamento = document.getElementById('nombre_departamento');
    const jefe_departamento = document.getElementById('jefe_departamento');

    const botonRegistro = document.getElementById('registrar_departamento');

    let nombre_departamentoValido = false;
    let jefe_departamentoValido = false;

    nombre_departamento.addEventListener("input", ()=>{
        if (validarNombre(nombre_departamento.value)) {
            nombre_departamentoValido = true;
            nombre_departamento.style.border = "solid green";
        } else {
            nombre_departamento.style.border = "solid red";
        }
        registroValido();
    });

    jefe_departamento.addEventListener("input", ()=>{
        if (validarNombre(jefe_departamento.value)) {
            jefe_departamentoValido = true;
            jefe_departamento.style.border = "solid green";
        } else {
            jefe_departamento.style.border = "solid red";
        }
        registroValido();
    });

    function registroValido() {
        if (
          nombre_departamentoValido &&
          jefe_departamentoValido
        ) {
          botonRegistro.disabled = false;
        } else {
          botonRegistro.disabled = true;
        }
      }

}