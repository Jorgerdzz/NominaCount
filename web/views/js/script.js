import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { setupDepartamentoHandlers } from "./modules/funciones.js";

document.addEventListener("DOMContentLoaded", () => {
    const page = document.body.dataset.page;

    console.log(page);
    
    switch (page) {
        case "home":
            validarRegistro(); 
            validarInicioSesion();
          break;
        case "empresa":
            setupDepartamentoHandlers();
          break;
        default:
          break;
      }

     
    
});