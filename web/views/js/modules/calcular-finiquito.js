export function initCalculoFiniquito() {
  const form = document.getElementById("form-finiquito");
  if (!form) return;

  const devengoInputs = form.querySelectorAll(
    "input[type=number]:not([readonly])"
  );
  const fechaBajaInput = document.getElementById("fecha_baja");
  const motivoBajaInput = document.getElementById("motivo_baja");

  const prorrateoInput = document.getElementById("prorrateo_pagas");
  const totalDevengadoInput = document.getElementById("total_devengado");
  const vacacionesInput = document.getElementById("importe_vacaciones");
  const salarioDiarioIndemInput = document.getElementById(
    "salario_diario_indem"
  );
  const importeIndemInput = document.getElementById("importe_indemnizacion");
  const totalFiniquitoInput = document.getElementById("total_finiquito");

  const salarioBase = parseFloat(window.empleadoData.salario_base) || 0;
  const fechaIncorporacion = new Date(window.empleadoData.fecha_incorporacion);

  function calcular() {
    const fechaBaja = new Date(fechaBajaInput.value);
    const motivoBaja = motivoBajaInput.value;

    if (isNaN(fechaBaja.getTime())) return;

    const diasTrabajadosMes = fechaBaja.getDate(); 
    const proporcionMes = diasTrabajadosMes / 30;

    let sumaDevengos = 0;
    devengoInputs.forEach((input) => {
      sumaDevengos += parseFloat(input.value) || 0;
    });

    const totalDevengadoProporcional = (sumaDevengos * proporcionMes) + (salarioBase * proporcionMes);

    const prorrateoPagas = ((salarioBase * 2) / 12) * proporcionMes;

    const totalDevengadoFinal = totalDevengadoProporcional + prorrateoPagas;

    prorrateoInput.value = prorrateoPagas.toFixed(2);
    totalDevengadoInput.value = totalDevengadoFinal.toFixed(2);


    const fechaInicioAnio = new Date(fechaBaja.getFullYear(), 0, 1);
    const diasTrabajadosEsteAnio = Math.floor(
      (fechaBaja - fechaInicioAnio) / (1000 * 60 * 60 * 24)
    );

    const vacacionesDevengadas = (diasTrabajadosEsteAnio * 30) / 365;

    const salarioDiarioVacaciones = (salarioBase + sumaDevengos) / 30;
    const importeVacaciones = salarioDiarioVacaciones * vacacionesDevengadas;

    vacacionesInput.value = isNaN(importeVacaciones)
      ? ""
      : importeVacaciones.toFixed(2);

    const diasTotalesTrabajados = Math.floor(
      (fechaBaja - fechaIncorporacion) / (1000 * 60 * 60 * 24)
    );

    let indemnizacion = 0;
    let salarioDiarioIndem = 0;

    if (["despido", "expediente", "mutuo_acuerdo"].includes(motivoBaja)) {
      const antiguedadDias = diasTotalesTrabajados;
      const antiguedadAnios = antiguedadDias / 365;

      salarioDiarioIndem = ((salarioBase * 2) + (salarioBase * 12) + (sumaDevengos * 12)) / 365;

      const diasPorAnio = 33; 
      indemnizacion = salarioDiarioIndem * diasPorAnio * antiguedadAnios;
    }

    salarioDiarioIndemInput.value = salarioDiarioIndem.toFixed(2);
    importeIndemInput.value = indemnizacion.toFixed(2);

    const totalFiniquito =
      totalDevengadoFinal + importeVacaciones + indemnizacion;
    totalFiniquitoInput.value = totalFiniquito.toFixed(2);
  }

  devengoInputs.forEach((input) => input.addEventListener("input", calcular));
  fechaBajaInput.addEventListener("change", calcular);
  motivoBajaInput.addEventListener("change", calcular);

  calcular();
}
