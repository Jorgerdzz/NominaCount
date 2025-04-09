import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { setupDepartamentoHandlers } from "./modules/funciones.js";
import { crearTabla } from "./modules/tablas.js";
import { registroEmpleado } from "./modules/registroEmpleado.js";
import { eliminarDepartamento, anadirDepartamento } from "./modules/popup.js";
import { modificarDatosEmpleado } from "./modules/modificarDatos.js";


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
      registroEmpleado();
      eliminarDepartamento();
      anadirDepartamento();
      break;
    case "empleado":
      modificarDatosEmpleado();
      break;
    default:
      break;
  }

  setupDepartamentoHandlers();
  
});
