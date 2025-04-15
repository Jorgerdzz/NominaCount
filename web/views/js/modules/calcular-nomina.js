const conceptosProrrateables = [
  "salario_base",
  "incentivos",
  "plus_dedicacion",
  "plus_antiguedad",
  "plus_actividad",
  "plus_nocturnidad",
  "plus_responsabilidad",
  "plus_convenio",
  "plus_idiomas",
  "plus_transporte",
];

const conceptosNoProrrateables = [
  "horas_extra",
  "horas_complementarias",
  "salario_especie",
  "dietas",
];

const diasMes = 30;

const valoresBrutos = {};

let editandoManualmente = false;

function getValue(id) {
  const element = document.querySelector(`[name="${id}"]`);
  return element ? parseFloat(element.value) || 0 : 0;
}

function setValue(selector, value) {
  const element = document.querySelector(selector);
  if (element && !editandoManualmente) {
    element.value = isNaN(value) ? '' : value.toFixed(2);
  }
}

function calcularDiasTrabajados() {
  const inicio = new Date(document.getElementById("periodo_inicio").value);
  const fin = new Date(document.getElementById("periodo_fin").value);

  if (isNaN(inicio.getTime())) return diasMes;
  if (isNaN(fin.getTime())) return diasMes;

  const diff = Math.ceil((fin - inicio) / (1000 * 60 * 60 * 24)) + 1;
  return Math.min(diff, diasMes);
}

function prorratear(valor, dias) {
  return (valor / diasMes) * dias;
}

function manejarFocus(event) {
  const input = event.target;
  const nombre = input.name;
  
  if (conceptosProrrateables.includes(nombre)) {
    editandoManualmente = true;
    input.value = valoresBrutos[nombre] || '';
  }
}

function manejarBlur(event) {
  const input = event.target;
  const nombre = input.name;
  
  if (conceptosProrrateables.includes(nombre)) {
    const valorBruto = parseFloat(input.value) || 0;
    valoresBrutos[nombre] = valorBruto;
    
    const dias = calcularDiasTrabajados();
    const valorProrrateado = prorratear(valorBruto, dias);
    
    editandoManualmente = false;
    input.value = isNaN(valorProrrateado) ? '' : valorProrrateado.toFixed(2);
    
    calcularNomina();
  }
}

export function initNominaCalculator() {
  conceptosProrrateables.forEach(campo => {
    const input = document.querySelector(`[name="${campo}"]`);
    if (input) {
      valoresBrutos[campo] = parseFloat(input.value) || 0;
      input.addEventListener('focus', manejarFocus);
      input.addEventListener('blur', manejarBlur);
    }
  });

  document.getElementById("periodo_inicio").addEventListener('change', () => {
    const dias = calcularDiasTrabajados();
    conceptosProrrateables.forEach(campo => {
      const input = document.querySelector(`[name="${campo}"]`);
      if (input && document.activeElement !== input) {
        const prorrateado = prorratear(valoresBrutos[campo], dias);
        setValue(`[name="${campo}"]`, prorrateado);
      }
    });
    calcularNomina();
  });

  document.getElementById("periodo_fin").addEventListener('change', () => {
    const dias = calcularDiasTrabajados();
    conceptosProrrateables.forEach(campo => {
      const input = document.querySelector(`[name="${campo}"]`);
      if (input && document.activeElement !== input) {
        const prorrateado = prorratear(valoresBrutos[campo], dias);
        setValue(`[name="${campo}"]`, prorrateado);
      }
    });
    calcularNomina();
  });

  conceptosNoProrrateables.forEach(campo => {
    const input = document.querySelector(`[name="${campo}"]`);
    if (input) {
      input.addEventListener('input', calcularNomina);
    }
  });

  function calcularNomina() {
    
    const salarioBase = getValue("salario_base");
    const incentivos = getValue("incentivos");
    const plusDedicacion = getValue("plus_dedicacion");
    const plusAntiguedad = getValue("plus_antiguedad");
    const plusActividad = getValue("plus_actividad");
    const plusNocturnidad = getValue("plus_nocturnidad");
    const plusResponsabilidad = getValue("plus_responsabilidad");
    const plusConvenio = getValue("plus_convenio");
    const plusIdiomas = getValue("plus_idiomas");
    const plusTransporte = getValue("plus_transporte");

    const salarioEspecie = getValue("salario_especie");
    const dietas = getValue("dietas");
    const horasExtra = getValue("horas_extra");
    const horasComplementarias = getValue("horas_complementarias");

    const prorrateo =
      (2 * (valoresBrutos.salario_base + valoresBrutos.incentivos)) / 12;

    const baseCC =
      salarioBase +
      incentivos +
      plusDedicacion +
      plusAntiguedad +
      plusActividad +
      plusNocturnidad +
      plusResponsabilidad +
      plusConvenio +
      plusIdiomas +
      plusTransporte +
      prorrateo;

    const baseCP = baseCC + horasExtra + horasComplementarias;

    const totalDevengado =
      salarioBase +
      incentivos +
      plusDedicacion +
      plusAntiguedad +
      plusActividad +
      plusNocturnidad +
      plusResponsabilidad +
      plusConvenio +
      plusIdiomas +
      plusTransporte +
      salarioEspecie +
      dietas +
      horasExtra +
      horasComplementarias;

    const tipoCC = getValue("tipo_cc");
    const tipoMEI = getValue("tipo_MEI");
    const tipoDesempleo = getValue("tipo_desempleo");
    const tipoFP = getValue("tipo_fp");
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
    const importeIRPF =
      (totalDevengado - salarioEspecie - dietas) * (tipoIRPF / 100);

    const totalDeducciones =
      importeCC +
      importeMEI +
      importeDesempleo +
      importeFP +
      importeHextra +
      importeHextraFuerzaMayor +
      importeIRPF;

    const liquido = totalDevengado - totalDeducciones;

    setValue('[name="base_cc"]', baseCC);
    setValue('[name="base_MEI"]', baseCC);

    setValue('[name="base_desempleo"]', baseCP);
    setValue('[name="base_fp"]', baseCP);

    setValue('[name="base_hextra"]', horasExtra);
    setValue('[name="base_hextraFuerzaMayor"]', horasComplementarias);

    setValue('[name="base_irpf"]', totalDevengado - salarioEspecie - dietas);

    setValue('[name="total_devengado"]', totalDevengado);
    setValue('[name="importe_cc"]', importeCC);
    setValue('[name="importe_desempleo"]', importeDesempleo);
    setValue('[name="importe_fp"]', importeFP);
    setValue('[name="importe_MEI"]', importeMEI);
    setValue('[name="importe_hextra"]', importeHextra);
    setValue('[name="importe_hextraFuerzaMayor"]', importeHextraFuerzaMayor);
    setValue('[name="importe_irpf"]', importeIRPF);
    setValue('[name="total_deducir"]', totalDeducciones);
    setValue('[name="liquido"]', liquido);
  }

  calcularNomina();
}
