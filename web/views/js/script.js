import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { crearTabla } from "./modules/tablas.js";
import { registroEmpleado } from "./modules/registroEmpleado.js";
import { eliminarDepartamento, existeEmpleado } from "./modules/popup.js";
import {
  modificarDatosEmpleado,
  modificarDatosUsuario,
} from "./modules/modificarDatos.js";
import { initNominaCalculator } from "./modules/calcular-nomina.js";
import { generarNominaPDF } from "./modules/generar-nominaPDF.js";
import { setupBuscadorEmpleados } from "./modules/buscar-empleados.js";
import { crearGrafico } from "./modules/graficosEstadisticas.js";
import { graficoCostesDepartamentoTotales } from "./modules/graficosEmpresa.js";



document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;

  console.log(page);

  setupBuscadorEmpleados();

  switch (page) {
    case "home":
      validarRegistro();
      validarInicioSesion();
      break;
    case "empresa":
      graficoCostesDepartamentoTotales();
    case "departamento":
      crearTabla();
      registroEmpleado();
      existeEmpleado();
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
    case "nomina":
      generarNominaPDF();
      break;
    case "historial-nomina":
      generarNominaPDF();
      break;
    case "estadisticas":
      crearGrafico();
      break;
    default:
      break;
  }

});
