import { validarCIF, validarContra } from "./validaciones.js";

export function validarInicioSesion(){
    const cifInput = document.getElementById("cifInicioSesion");
    const contraInput = document.getElementById("contraInicioSesion");
    const botonIncioSesion = document.getElementById("botonInicioSesion");

    let cifValido = false;
    let contraValida = false;

    cifInput.addEventListener("input", ()=>{
        if(validarCIF(cifInput.value)){
            cifValido = true;
            cifInput.style.border = "solid green";
        } else{
            cifInput.style.border = "solid red";
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
        if(cifValido && contraValida){
            botonIncioSesion.disabled = false;
        } else{
            botonIncioSesion.disabled = true;
        }
    }
    
}
