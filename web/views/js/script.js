import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { crearTabla } from "./modules/tablas.js";
import { registroEmpleado } from "./modules/registroEmpleado.js";
import {
  crearDepartamento,
  eliminarDepartamento,
  eliminarEmpleado,
  existeEmpleado,
  existeEmpresa,
  inicioSesion,
} from "./modules/popup.js";
import {
  modificarContra,
  modificarDatosEmpleado,
  modificarDatosUsuario,
  validarCambiarContra,
} from "./modules/modificarDatos.js";
import { initNominaCalculator } from "./modules/calcular-nomina.js";
import { generarNominaPDF } from "./modules/generar-nominaPDF.js";
import { setupBuscadorEmpleados } from "./modules/buscar-empleados.js";
import { crearGrafico } from "./modules/graficosEstadisticas.js";
import { graficoCostesDepartamentoTotales } from "./modules/graficosEmpresa.js";
import { initCalculoFiniquito } from "./modules/calcular-finiquito.js";
import { crearCalendarioEmpleado } from "./modules/calendario-empleado.js";
import { importarCSV } from "./modules/importarCSV.js";
import { registroDepartamento } from "./modules/registroDepartamento.js";
import { establecerContra, existeEmail, validarComprobacionEmail, validarNuevaContra } from "./modules/olvidar-contra.js";
import { registroCEO, validarRegistroCEO } from "./modules/registro-ceo.js";

document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;

  console.log(page);

  setupBuscadorEmpleados();
  crearDepartamento();
  registroDepartamento();

  switch (page) {
    case "home":
      validarRegistro();
      existeEmpresa();
      registroCEO();
      validarRegistroCEO();
      validarInicioSesion();
      inicioSesion();
      validarComprobacionEmail();
      existeEmail();
      validarNuevaContra();
      establecerContra();
      break;
    case "empresa":
      graficoCostesDepartamentoTotales();
      break;
    case "departamento":
      crearTabla();
      registroEmpleado();
      existeEmpleado();
      importarCSV();
      eliminarDepartamento();
      break;
    case "empleado":
      modificarDatosEmpleado();
      eliminarEmpleado();
      break;
    case "mi-cuenta":
      modificarDatosUsuario();
      validarCambiarContra();
      modificarContra();
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
    case "calcular-finiquito":
      initCalculoFiniquito();
      break;
    case "calendario-empleado":
      crearCalendarioEmpleado();
      break;
    default:
      break;
  }
});
