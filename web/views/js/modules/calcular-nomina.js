const inputsDevengos = [
  "salario_base",
  "incentivos",
  "plus_dedicacion",
  "plus_antiguedad",
  "plus_actividad",
  "plus_responsabilidad",
  "plus_convenio",
  "plus_idiomas",
  "salario_especie",
  "plus_transporte",
  "dietas",
  "horas_extra",
  "horas_complementarias",
];

const diasMes = 30;

function getValue(id) {
  return parseFloat(document.querySelector(`[name="${id}"]`)?.value || 0);
}

function calcularDiasTrabajados() {
  const inicio = new Date(document.getElementById("periodo_inicio").value);
  const fin = new Date(document.getElementById("periodo_fin").value);
  const diff = Math.ceil((fin - inicio) / (1000 * 60 * 60 * 24)) + 1;
  return diff >= diasMes ? diasMes : diff;
}

export function initNominaCalculator() {
  function calcularNomina() {
    const diasTrabajados = calcularDiasTrabajados();

    const salarioBase = getValue("salario_base");
    const salarioBaseProrrateado = (salarioBase / diasMes) * diasTrabajados;

    const incentivos = getValue("incentivos");
    const plusDedicacion = getValue("plus_dedicacion");
    const plusAntiguedad = getValue("plus_antiguedad");
    const plusActividad = getValue("plus_actividad");
    const plusResponsabilidad = getValue("plus_responsabilidad");
    const plusConvenio = getValue("plus_convenio");
    const plusIdiomas = getValue("plus_idiomas");
    const salarioEspecie = getValue("salario_especie");
    const plusTransporte = getValue("plus_transporte");
    const dietas = getValue("dietas");
    const horasExtra = getValue("horas_extra");
    const horasComplementarias = getValue("horas_complementarias");

    const prorrateo = (2 * (salarioBase + incentivos)) / 12;

    const baseCC =
      salarioBaseProrrateado +
      incentivos +
      plusDedicacion +
      plusAntiguedad +
      plusActividad +
      plusResponsabilidad +
      plusConvenio +
      plusIdiomas +
      salarioEspecie +
      plusTransporte +
      prorrateo;

    const baseCP = baseCC + horasExtra + horasComplementarias;

    const totalDevengado =
      salarioBaseProrrateado +
      incentivos +
      plusDedicacion +
      plusAntiguedad +
      plusActividad +
      plusResponsabilidad +
      plusConvenio +
      plusIdiomas +
      salarioEspecie +
      plusTransporte +
      dietas +
      horasExtra +
      horasComplementarias;

    const tipoCC = getValue("tipo_cc");
    const tipoDesempleo = getValue("tipo_desempleo");
    const tipoFP = getValue("tipo_fp");
    const tipoMEI = getValue("tipo_MEI");
    const tipoHextra = getValue("tipo_hextra");
    const tipoHextraFuerzaMayor = getValue("tipo_hextraFuerzaMayor");
    const tipoIRPF = getValue("tipo_irpf");

    const importeCC = baseCC * (tipoCC / 100);
    const importeMEI = baseCC * (tipoMEI / 100);
    const importeDesempleo = baseCP * (tipoDesempleo / 100);
    const importeFP = baseCP * (tipoFP / 100);
    const importeHextra = horasExtra * (tipoHextra / 100);
    const importeHextraFuerzaMayor =
      horasComplementarias * (tipoHextraFuerzaMayor / 100);
    const importeIRPF = totalDevengado * (tipoIRPF / 100);

    const totalDeducciones =
      importeCC +
      importeDesempleo +
      importeFP +
      importeMEI +
      importeHextra +
      importeHextraFuerzaMayor +
      importeIRPF;

    const liquido = totalDevengado - totalDeducciones;

    document.getElementById('base_cc').value = baseCC.toFixed(2);
    document.querySelector('[name="base_fp"]').value = baseCC.toFixed(2);
    document.querySelector('[name="base_desempleo"]').value = baseCP.toFixed(2);
    document.querySelector('[name="total_devengado"]').value =
      totalDevengado.toFixed(2);
    document.querySelector('[name="importe_cc"]').value = importeCC.toFixed(2);
    document.querySelector('[name="importe_desempleo"]').value =
      importeDesempleo.toFixed(2);
    document.querySelectorAll('[name="importe_fp"]')[0].value =
      importeFP.toFixed(2);
    document.querySelector('[name="importe_hextra"]').value =
      importeHextra.toFixed(2);
    document.querySelector('[name="total_deducir"]').value =
      totalDeducciones.toFixed(2);
    document.querySelector('[name="liquido"]').value = liquido.toFixed(2);

  }

  document.querySelectorAll("input").forEach((input) => {
    input.addEventListener("input", calcularNomina);
  });

  document
    .getElementById("periodo_inicio")
    .addEventListener("change", calcularNomina);
  document
    .getElementById("periodo_fin")
    .addEventListener("change", calcularNomina);

    calcularNomina();
}

