import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { setupDepartamentoHandlers } from "./modules/funciones.js";
import { crearTabla } from "./modules/tablas.js";
import { registroEmpleado } from "./modules/registroEmpleado.js";
import { eliminarDepartamento } from "./modules/popup.js";
import {
  modificarDatosEmpleado,
  modificarDatosUsuario,
} from "./modules/modificarDatos.js";
import { initNominaCalculator } from "./modules/calcular-nomina.js";



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
      break;
    case "empleado":
      modificarDatosEmpleado();
      break;
    case "mi-cuenta":
      modificarDatosUsuario();
      break;
    case "calcular-nomina":
      initNominaCalculator();
      break;
    default:
      break;
  }

  setupDepartamentoHandlers();
});
