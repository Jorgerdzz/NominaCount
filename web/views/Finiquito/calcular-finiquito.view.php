<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
  <div class="card p-5 bg-white">
    <h2 class="mb-4" style="color: #825abd;">Cálculo de Finiquito</h2>

    <form id="form-finiquito" method="POST">
      <!-- FECHA DE BAJA Y MOTIVO -->
      <div class="row mb-4 align-items-center">
        <div class="col-md-6">
          <label for="fecha_baja" class="form-label">Fecha de baja:</label>
          <input type="date" class="form-control" id="fecha_baja" name="fecha_baja">
        </div>
        <div class="col-md-6">
          <label for="motivo_baja" class="form-label">Motivo de baja:</label>
          <select class="form-select" id="motivo_baja" name="motivo_baja">
            <option value="">-- Seleccionar --</option>
            <option value="despido">Despido</option>
            <option value="baja_voluntaria">Baja voluntaria</option>
            <option value="fin_contrato">Fin de contrato</option>
            <option value="jubilacion">Jubilación</option>
            <option value="incapacidad">Incapacidad permanente</option>
            <option value="fallecimiento">Fallecimiento</option>
            <option value="expediente">Despido disciplinario</option>
            <option value="mutuo_acuerdo">Mutuo acuerdo</option>
          </select>
        </div>
      </div>

      <!-- DEVENGOS -->
      <h4 class="mt-4 mb-3" style="color: #825abd;">I. Devengos</h4>
      <h4 class="mt-4 mb-3" style="color: #825abd;">I. Devengos totales</h4>

      <h5 class="mt-4 mb-3" style="color: #825abd;">I.I. Percepciones salariales</h5>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Salario base</div>
        <div class="col-md-6"><input value="<?= $datos_empleado['salario_base']; ?>" name="salario_base" class="form-control"></div>
      </div>

      <h5 class="mt-4 mb-3" style="color: #825abd;">I.II. Complementos salariales</h5>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Incentivos</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus especial dedicación</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus antigüedad</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus actividad</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus nocturnidad</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus responsabilidad</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus convenio</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus idiomas</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Horas extraordinarias</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Horas complementarias</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Salario en especie</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <h5 class="mt-4 mb-3" style="color: #825abd;">I.III. Percepciones no salariales</h5>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Indemnizaciones o Suplidos</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Prestaciones e indemnizaciones de la seguridad social</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Indemnizaciones por traslados, suspensiones o despidos</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Plus transporte</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Dietas</div>
        <div class="col-md-6"><input type="number" step="0.01" class="form-control"></div>
      </div>

      <!-- PRORRATEO PAGAS EXTRA -->
      <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
        <div class="col-md-6"><strong>Prorrateo pagas extra de salario base</strong></div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="prorrateo_pagas" id="prorrateo_pagas" class="form-control" readonly>
        </div>
      </div>

      <!-- TOTAL DEVENGADO PRORRATEADO -->
      <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
        <div class="col-md-6"><strong>Total Devengado Prorrateado</strong></div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="total_devengado" id="total_devengado" class="form-control" readonly>
        </div>
      </div>

      <!-- VACACIONES -->
      <h4 class="mt-5 mb-3" style="color: #825abd;">II. Vacaciones no disfrutadas</h4>
      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Importe correspondiente a vacaciones</div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="importe_vacaciones" id="importe_vacaciones" class="form-control" readonly>
        </div>
      </div>

      <!-- INDEMNIZACION -->
      <h4 class="mt-5 mb-3" style="color: #825abd;">III. Indemnización por despido (si aplica)</h4>
      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Salario diario a efectos indemnización</div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="salario_diario_indem" id="salario_diario_indem" class="form-control" readonly>
        </div>
      </div>

      <div class="row mb-2 align-items-center">
        <div class="col-md-6">Importe de indemnización</div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="importe_indemnizacion" id="importe_indemnizacion" class="form-control" readonly>
        </div>
      </div>

      <!-- TOTAL FINIQUITO -->
      <div class="row mt-5 mb-3 align-items-center bg-light p-3 rounded">
        <div class="col-md-6"><strong>Total Finiquito</strong></div>
        <div class="col-md-6">
          <input type="number" step="0.01" name="total_finiquito" id="total_finiquito" class="form-control" readonly>
        </div>
      </div>

      <!-- ENVÍO -->
      <div class="row mt-5">
        <div class="col-md-6 d-grid">
          <a href="<?= BASE_PATH . '/empleado?id=' . $id_empleado; ?>" class="btn btn-purple btn-lg">Volver</a>
        </div>
        <div class="col-md-6 d-grid">
          <button type="button" class="btn btn-purple btn-lg" id="btn-calcular-finiquito">Calcular Finiquito</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  window.empleadoData = {
    fecha_incorporacion: "<?= $empleado['antiguedad_empresa'] ?>",
    salario_base: <?= json_encode($empleado['salario_base']) ?>
  };
</script>

<?php require_once 'views/partials/footer.php'; ?>