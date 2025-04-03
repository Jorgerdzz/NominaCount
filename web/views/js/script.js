import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";

document.addEventListener("DOMContentLoaded", () => {
    validarRegistro(); 
    validarInicioSesion();
});