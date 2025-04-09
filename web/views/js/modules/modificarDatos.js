
import {
    validarCIF,
    validarDenominacionSocial,
    validarNombreComercial,
    validarDireccion,
    validarNombre,
    validarApellidos,
    validarDNI,
    validarEmail,
    validarTelefono,
    validarFechaNacimiento,
    validarNumHijos,
    validarEstadoCivil,
    validarSalarioBase,
}from "./validaciones.js";

export function modificarDatosEmpleado(){
    const nombre_empleado = document.getElementById('editar-nombre-empleado');
    const apellidos_empleado = document.getElementById('editar-apellidos-empleado');
    const dni_empleado = document.getElementById('editar-dni-empleado');
    const email_empleado = document.getElementById('editar-email-empleado');
    const telefono_empleado = document.getElementById('editar-telefono-empleado');
    const antiguedad_empresa = document.getElementById('editar-antiguedad-empleado');
    const num_hijos = document.getElementById('editar-hijos-empleado');
    const estado_civil = document.getElementById('editar-estado-empleado');
    const fecha_nacimiento = document.getElementById('editar-nacimiento-empleado');
    const salario_base = document.getElementById('editar-salario-empleado');
    
    const botonModificar = document.getElementById('modificarDatosEmpleado');
    const botonConfirmar = document.getElementById('confirmarModificacion');

    let nombre_empleadoValido = true;
    let apellidos_empleadoValido = true;
    let dni_empleadoValido = true;
    let email_empleadoValido = true;
    let telefono_empleadoValido = true;
    let antiguedad_empresaValido = true;
    let num_hijosValido = true;
    let estado_civilValido = true;
    let fecha_nacimientoValido = true;
    let salario_baseValido = true;

    botonModificar.addEventListener('click', ()=>{
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
                botonConfirmar.disabled = false;
            } else {
                botonConfirmar.disabled = true;
            }
        }
    })
}

export function modificarDatosUsuario(){
    const cif = document.getElementById('editar-cif');
    const denominacion_social = document.getElementById('editar-denominacion-social');
    const nombre_comercial = document.getElementById('editar-nombre-comercial');
    const telefono = document.getElementById('editar-telefono');
    const direccion = document.getElementById('editar-direccion');
    const nombre_usuario = document.getElementById('editar-nombre-usuario');
    const email_usuario = document.getElementById('editar-email-usuario');

    const botonModificar = document.getElementById('boton-editar-perfil-usuario');
    const botonConfirmar = document.getElementById('editarUsuario');

    let cifValido = true;
    let denominacion_socialValido = true;
    let nombre_comercialValido = true;
    let telefonoValido = true;
    let direccionValido = true;
    let nombre_usuarioValido = true;
    let email_usuarioValido = true;


    botonModificar.addEventListener('click', ()=>{
        cif.addEventListener("input", ()=>{
            if (validarCIF(cif.value)) {
                cif.style.border = "solid green";
            } else {
                cif.style.border = "solid red";
            }
            registroValido();
        });
        
        denominacion_social.addEventListener("input", ()=>{
            if (validarDenominacionSocial(denominacion_social.value)) {
                denominacion_social.style.border = "solid green";
            } else {
                denominacion_social.style.border = "solid red";
            }
            registroValido();
        });
    
        nombre_comercial.addEventListener("input", ()=>{
            if (validarNombreComercial(nombre_comercial.value)) {
                nombre_comercial.style.border = "solid green";
            } else {
                nombre_comercial.style.border = "solid red";
            }
            registroValido();
        });
    
        telefono.addEventListener("input", ()=>{
            if (validarTelefono(telefono.value)) {
                telefono.style.border = "solid green";
            } else {
                telefono.style.border = "solid red";
            }
            registroValido();
        });
    
        direccion.addEventListener("input", ()=>{
            if (validarDireccion(direccion.value)) {
                direccion.style.border = "solid green";
            } else {
                direccion.style.border = "solid red";
            }
            registroValido();
        });
    
        nombre_usuario.addEventListener("input", ()=>{
            if (validarNombre(nombre_usuario.value)) {
                nombre_usuario.style.border = "solid green";
            } else {
                nombre_usuario.style.border = "solid red";
            }
            registroValido();
        });
    
        email_usuario.addEventListener("input", ()=>{
            if (validarEmail(email_usuario.value)) {
                email_usuario.style.border = "solid green";
            } else {
                email_usuario.style.border = "solid red";
            }
            registroValido();
        });
    
    
        function registroValido() {
            if (
                cifValido &&
                denominacion_socialValido &&
                nombre_comercialValido &&
                telefonoValido &&
                direccionValido &&
                nombre_usuarioValido &&
                email_usuarioValido
            ) {
                botonConfirmar.disabled = false;
            } else {
                botonConfirmar.disabled = true;
            }
        }
    })

}