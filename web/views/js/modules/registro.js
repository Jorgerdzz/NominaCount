import { validarCIF, validarDenominacionSocial } from "./validaciones.js";

export function validarRegistro(){
    const cifInput = document.getElementById("cif");
    const denominacionSocialInput = document.getElementById("denominacionSocial");
    // const nombreComercialInput = document.getElementById("nombreComercial");
    // const direccionInput = document.getElementById("direccion");
    // const ciudadInput = document.getElementById("ciudad");
    // const provinciaInput = document.getElementById("provincia");
    // const cpInput = document.getElementById("cp");
    // const telefonoInput = document.getElementById("telefono");
    // const personaInput = document.getElementById("persona");
    // const emailInput = document.getElementById("email");
    // const contraInput = document.getElementById("contra");

    let cifValido = false;
    let denominacionSocialValido = false;
    // let nombreComercialValido = false;
    // let direccionValida = false;
    // let ciudadValida = false;
    // let provinciaValida = false;
    // let cpValido = false;
    // let telefonoValido = false;
    // let personaValido = false;
    // let emailValido = false;
    // let contraValida = false;

    cifInput.addEventListener("input", ()=> { 
        if(validarCIF(cifInput.value)){
            cifValido = true;
            cifInput.style.border = "solid green";
        }else{
            cifInput.style.border = "solid red";
        }
    })

    denominacionSocialInput.addEventListener("input", ()=> {
        if(validarDenominacionSocial(denominacionSocialInput)){

        }
    })

}