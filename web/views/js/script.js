import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { setupDepartamentoHandlers } from "./modules/funciones.js";
import { crearTabla } from "./modules/tablas.js";

document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;

  console.log(page);

  switch (page) {
    case "home":
      validarRegistro();
      validarInicioSesion();
      break;
    case "departamento":
      crearTabla();
      break;
    default:
      break;
  }

  setupDepartamentoHandlers();
  
});
