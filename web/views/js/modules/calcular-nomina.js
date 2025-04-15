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
    element.value = isNaN(value) ? "" : value.toFixed(2);
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
    input.value = valoresBrutos[nombre] || "";
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
    input.value = isNaN(valorProrrateado) ? "" : valorProrrateado.toFixed(2);

    calcularNomina();
  }
}

function calcularPorcentajeIRPF(empleado) {
  const salarioAnual = empleado.salario_base * 14;

  // 2. Determinar situación familiar
  let situacionFamiliar = "S1"; // Soltero sin hijos por defecto

  if (
    empleado.estado_civil === "casado" ||
    empleado.estado_civil === "pareja_hecho"
  ) {
    if (empleado.num_hijos > 0) {
      situacionFamiliar = empleado.num_hijos >= 2 ? "M3" : "M2"; // M2: 1 hijo, M3: 2 o más hijos
    } else {
      situacionFamiliar = "M1"; // Casado sin hijos
    }
  } else if (empleado.num_hijos > 0) {
    situacionFamiliar = "S2"; // Soltero con hijos
  }

  // 3. Aplicar reducciones por discapacidad
  let reduccionDiscapacidad = 0;
  if (empleado.minusvalia === "Entre el 33% y el 65%") {
    reduccionDiscapacidad = 2000;
  } else if (empleado.minusvalia === "Igual o superior al 65%") {
    reduccionDiscapacidad = 4000;
  }

  // 4. Base de cálculo (salario anual - reducciones)
  const baseCalculo = Math.max(0, salarioAnual - reduccionDiscapacidad);

  // 5. Determinar porcentaje según tramos (aproximación)
  let porcentajeIRPF = 0;

  if (baseCalculo < 12450) {
    switch (situacionFamiliar) {
      case "S1":
        porcentajeIRPF = 9.5;
        break;
      case "S2":
        porcentajeIRPF = 7.5;
        break;
      case "M1":
        porcentajeIRPF = 8.5;
        break;
      case "M2":
        porcentajeIRPF = 6.5;
        break;
      case "M3":
        porcentajeIRPF = 5.5;
        break;
    }
  } else if (baseCalculo < 20200) {
    switch (situacionFamiliar) {
      case "S1":
        porcentajeIRPF = 12.0;
        break;
      case "S2":
        porcentajeIRPF = 10.0;
        break;
      case "M1":
        porcentajeIRPF = 11.0;
        break;
      case "M2":
        porcentajeIRPF = 9.0;
        break;
      case "M3":
        porcentajeIRPF = 8.0;
        break;
    }
  } else if (baseCalculo < 35200) {
    switch (situacionFamiliar) {
      case "S1":
        porcentajeIRPF = 15.0;
        break;
      case "S2":
        porcentajeIRPF = 13.0;
        break;
      case "M1":
        porcentajeIRPF = 14.0;
        break;
      case "M2":
        porcentajeIRPF = 12.0;
        break;
      case "M3":
        porcentajeIRPF = 11.0;
        break;
    }
  } else if (baseCalculo < 60000) {
    switch (situacionFamiliar) {
      case "S1":
        porcentajeIRPF = 18.5;
        break;
      case "S2":
        porcentajeIRPF = 16.5;
        break;
      case "M1":
        porcentajeIRPF = 17.5;
        break;
      case "M2":
        porcentajeIRPF = 15.5;
        break;
      case "M3":
        porcentajeIRPF = 14.5;
        break;
    }
  } else {
    switch (situacionFamiliar) {
      case "S1":
        porcentajeIRPF = 22.5;
        break;
      case "S2":
        porcentajeIRPF = 20.5;
        break;
      case "M1":
        porcentajeIRPF = 21.5;
        break;
      case "M2":
        porcentajeIRPF = 19.5;
        break;
      case "M3":
        porcentajeIRPF = 18.5;
        break;
    }
  }

  // Ajuste mínimo del 2% y máximo del 40%
  return Math.min(40, Math.max(2, porcentajeIRPF));
}

export function initNominaCalculator() {
  conceptosProrrateables.forEach((campo) => {
    const input = document.querySelector(`[name="${campo}"]`);
    if (input) {
      valoresBrutos[campo] = parseFloat(input.value) || 0;
      input.addEventListener("focus", manejarFocus);
      input.addEventListener("blur", manejarBlur);
    }
  });

  document.getElementById("periodo_inicio").addEventListener("change", () => {
    const dias = calcularDiasTrabajados();
    conceptosProrrateables.forEach((campo) => {
      const input = document.querySelector(`[name="${campo}"]`);
      if (input && document.activeElement !== input) {
        const prorrateado = prorratear(valoresBrutos[campo], dias);
        setValue(`[name="${campo}"]`, prorrateado);
      }
    });
    calcularNomina();
  });

  document.getElementById("periodo_fin").addEventListener("change", () => {
    const dias = calcularDiasTrabajados();
    conceptosProrrateables.forEach((campo) => {
      const input = document.querySelector(`[name="${campo}"]`);
      if (input && document.activeElement !== input) {
        const prorrateado = prorratear(valoresBrutos[campo], dias);
        setValue(`[name="${campo}"]`, prorrateado);
      }
    });
    calcularNomina();
  });

  conceptosNoProrrateables.forEach((campo) => {
    const input = document.querySelector(`[name="${campo}"]`);
    if (input) {
      input.addEventListener("input", calcularNomina);
    }
  });

  const empleado = window.empleadoData;

  const tipoIRPF = calcularPorcentajeIRPF(empleado);
  setValue('[name="tipo_irpf"]', tipoIRPF);

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

    const importeCC = baseCC * (tipoCC / 100);
    const importeMEI = baseCC * (tipoMEI / 100);
    const importeDesempleo = baseCP * (tipoDesempleo / 100);
    const importeFP = baseCP * (tipoFP / 100);
    const importeHextra = horasExtra * (tipoHextra / 100);
    const importeHextraFuerzaMayor =
      horasComplementarias * (tipoHextraFuerzaMayor / 100);

    const importeIRPF =
      (totalDevengado - salarioEspecie - dietas) * (tipoIRPF / 100);
    setValue('[name="importe_irpf"]', importeIRPF);

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
    setValue('[name="total_deducir"]', totalDeducciones);
    setValue('[name="liquido"]', liquido);
  }

  calcularNomina();
}
