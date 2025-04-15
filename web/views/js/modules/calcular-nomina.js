const inputsDevengos = [
  "salario_base",
  "incentivos",
  "plus_dedicacion",
  "plus_antiguedad",
  "plus_actividad",
  "plus_nocturnidad",
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
  const element = document.querySelector(`[name="${id}"]`);
  if (!element) return 0;
  
  const value = parseFloat(element.value);
  return isNaN(value) ? 0 : value;
}

function setValue(selector, value) {
  const element = document.querySelector(selector);
  if (element) {
    element.value = isNaN(value) ? '' : value.toFixed(2);
  }
}

function calcularDiasTrabajados() {
  const inicioElement = document.getElementById("periodo_inicio");
  const finElement = document.getElementById("periodo_fin");
  
  if (!inicioElement || !finElement || !inicioElement.value || !finElement.value) {
    return diasMes;
  }

  const inicio = new Date(inicioElement.value);
  const fin = new Date(finElement.value);

  if (isNaN(inicio.getTime()) || isNaN(fin.getTime())) {
    return diasMes;
  }
  
  const diff = Math.ceil((fin - inicio) / (1000 * 60 * 60 * 24)) + 1;
  return diff >= diasMes ? diasMes : diff;
}

export function initNominaCalculator() {
  function calcularNomina() {
    const diasTrabajados = calcularDiasTrabajados();
    console.log(diasTrabajados);

    const salarioBase = getValue("salario_base");
    const salarioBaseProrrateado = (salarioBase / diasMes) * diasTrabajados;

    const incentivos = getValue("incentivos");
    const plusDedicacion = getValue("plus_dedicacion");
    const plusAntiguedad = getValue("plus_antiguedad");
    const plusActividad = getValue("plus_actividad");
    const plusNocturnidad = getValue("plus_nocturnidad");
    const plusResponsabilidad = getValue("plus_responsabilidad");
    const plusConvenio = getValue("plus_convenio");
    const plusIdiomas = getValue("plus_idiomas");
    const salarioEspecie = getValue("salario_especie");
    const plusTransporte = getValue("plus_transporte");
    const dietas = getValue("dietas");
    const horasExtra = getValue("horas_extra");
    const horasComplementarias = getValue("horas_complementarias");

    const prorrateo = (salarioBase > 0 || incentivos > 0) ? (2 * (salarioBase + incentivos)) / 12 : 0;
    
    const baseCC =
      salarioBaseProrrateado +
      incentivos +
      plusDedicacion +
      plusAntiguedad +
      plusActividad +
      plusNocturnidad +
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
      plusNocturnidad +
      plusResponsabilidad +
      plusConvenio +
      plusIdiomas +
      salarioEspecie +
      plusTransporte +
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
    const importeIRPF = (totalDevengado - salarioEspecie - dietas) * (tipoIRPF / 100);

    const totalDeducciones =
      importeCC +
      importeMEI +
      importeDesempleo +
      importeFP +
      importeHextra +
      importeHextraFuerzaMayor +
      importeIRPF;

    const liquido = totalDevengado - totalDeducciones;

    setValue('[name="salario_base"]', salarioBaseProrrateado);




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

  const inputs = document.querySelectorAll(`
    input[name="salario_base"],
    input[name="incentivos"],
    input[name="plus_dedicacion"],
    input[name="plus_antiguedad"],
    input[name="plus_actividad"],
    input[name="plus_nocturnidad"],
    input[name="plus_responsabilidad"],
    input[name="plus_convenio"],
    input[name="plus_idiomas"],
    input[name="salario_especie"],
    input[name="plus_transporte"],
    input[name="dietas"],
    input[name="horas_extra"],
    input[name="horas_complementarias"],
    #periodo_inicio,
    #periodo_fin
  `);

  inputs.forEach(input => {
    input.addEventListener("input", calcularNomina);
    input.addEventListener("change", calcularNomina);
  });

    calcularNomina();
}

