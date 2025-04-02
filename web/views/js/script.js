import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { enviarFormulario } from "./modules/formulario.js";

document.addEventListener("DOMContentLoaded", () => {
    validarRegistro(); 
    validarInicioSesion(); 
    enviarFormulario();
});