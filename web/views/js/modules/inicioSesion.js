import { validarEmail, validarContra } from "./validaciones.js";

export function validarInicioSesion(){
    const emailInput = document.getElementById("emailInicioSesion");
    const contraInput = document.getElementById("contraInicioSesion");
    const botonIncioSesion = document.getElementById("botonInicioSesion");

    let emailValido = false;
    let contraValida = false;

    emailInput.addEventListener("input", ()=>{
        if(validarEmail(emailInput.value)){
            emailValido = true;
            emailInput.style.border = "solid green";
        } else{
            emailInput.style.border = "solid red";
        }
        validarInicioSesion();
    })

    contraInput.addEventListener("input", ()=>{
        if(validarContra(contraInput.value)){
            contraValida = true;
            contraInput.style.border = "solid green";
        } else{
            contraInput.style.border = "solid red";
        }
        validarInicioSesion();
    })

    function validarInicioSesion(){
        if(emailValido && contraValida){
            botonIncioSesion.disabled = false;
        } else{
            botonIncioSesion.disabled = true;
        }
    }
    
}
