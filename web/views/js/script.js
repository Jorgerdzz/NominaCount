import { validarRegistro } from "./modules/registro.js";
import { validarInicioSesion } from "./modules/inicioSesion.js";
import { tablaEmpleados, tablaDepartamentos } from "./modules/tablas.js";
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
import { validarRegistroCEO } from "./modules/registro-ceo.js";
import { delegarFunciones, validarDelegarFunciones } from "./modules/delegar-funciones.js";
import { generarFiniquitoPDF } from "./modules/generar-finiquito.js";
import { enviarMensaje, validarFormContacto } from "./modules/contacto.js";
import { eliminarEmpresa } from "./modules/eliminar-empresa.js";

document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;

  console.log(page);

  setupBuscadorEmpleados();
  validarDelegarFunciones();
  delegarFunciones();

  switch (page) {
    case "home":
      validarRegistro();
      existeEmpresa();
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
    case "departamentos":
      registroDepartamento();
      crearDepartamento();
      tablaDepartamentos();
      break;
    case "departamento":
      tablaEmpleados();
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
      eliminarEmpresa();
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
    case "finiquito":
      generarFiniquitoPDF();
      break;
    case "calendario-empleado":
      crearCalendarioEmpleado();
      break;
    case "contacto":
      validarFormContacto();
      enviarMensaje();
    default:
      break;
  }
});
