<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
  <div class="card p-5 bg-white">
    <h2 class="mb-4" style="color: #825abd;">Finiquito</h2>

    <p class="mb-5">
      D/Dª <strong><?= $nombreCompleto ?></strong>, mayor de edad, con D.N.I. <strong><?= $dni ?></strong>,
      declara su total y absoluta conformidad con la liquidación de haberes presentada por
      <strong><?= $nombreEmpresa ?></strong>, siendo esta la siguiente:
    </p>

    <!-- I. DEVENGOS -->
    <h4 class="mt-4 mb-3" style="color: #825abd;">I. Devengos</h4>

    <div class="row mb-3">
      <div class="col-md-6">Prorrateo pagas extra de salario base</div>
      <div class="col-md-6">
        <input type="text" readonly class="form-control" value="<?= number_format($finiquito['prorrateo_pagas_extra_salario_base'], 2) ?> €">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">Total Devengado Prorrateado</div>
      <div class="col-md-6">
        <input type="text" readonly class="form-control" value="<?= number_format($finiquito['total_devengado_prorrateado'], 2) ?> €">
      </div>
    </div>

    <!-- II. VACACIONES -->
    <h4 class="mt-5 mb-3" style="color: #825abd;">II. Vacaciones no disfrutadas</h4>
    <div class="row mb-3">
      <div class="col-md-6">Importe correspondiente a vacaciones</div>
      <div class="col-md-6">
        <input type="text" readonly class="form-control" value="<?= number_format($finiquito['pago_vacaciones'], 2) ?> €">
      </div>
    </div>

    <!-- III. INDEMNIZACIÓN -->
    <h4 class="mt-5 mb-3" style="color: #825abd;">III. Indemnización por despido (si aplica)</h4>
    <div class="row mb-3">
      <div class="col-md-6">Importe de indemnización</div>
      <div class="col-md-6">
        <input type="text" readonly class="form-control" value="<?= number_format($finiquito['indemnizacion'], 2) ?> €">
      </div>
    </div>

    <!-- TOTAL -->
    <div class="row mt-5 mb-4 align-items-center bg-light p-3 rounded">
      <div class="col-md-6"><strong>Total Finiquito</strong></div>
      <div class="col-md-6">
        <input type="text" readonly class="form-control" value="<?= number_format($finiquito['total_finiquito'], 2) ?> €">
      </div>
    </div>

    <!-- TEXTO LEGAL FINAL -->
    <p class="mt-5">
      Con el percibo de dicha cantidad, que se hará efectiva en el plazo de una semana,
      mediante transferencia bancaria a la cuenta en la que he venido percibiendo mis salarios,
      declaro hallarme perfectamente saldado y finiquitado por la extinción del contrato de trabajo
      que me vinculaba a <strong><?= $nombreEmpresa ?></strong> por baja por <strong><?= str_replace('_', ' ', $finiquito['motivo_baja']) ?></strong>
      que se produjo en la fecha <strong><?= date("d/m/Y", strtotime($finiquito['fecha_baja'])) ?></strong>,
      no teniendo, nada más que reclamar por ningún concepto a la mercantil anteriormente mencionada,
      ni a ninguna otra perteneciente a <strong><?= $nombreEmpresa ?></strong>, no adeudándome ninguna cantidad alguna
      por salarios, pagas extraordinarias, vacaciones, dietas o indemnizaciones por extinción de contrato
      o cualquier otra causa.
    </p>

    <!-- FIRMAS -->
    <div class="row mt-5">
      <div class="col-md-4 text-start">
        <p><strong>Firma del trabajador</strong></p>
        <div style="height: 80px; border-bottom: 1px solid #000; width: 75%;"></div>
      </div>
      <div class="col-md-4 text-start">
        <p><strong>Firma de la empresa</strong></p>
        <div style="height: 80px; border-bottom: 1px solid #000; width: 75%;"></div>
      </div>
      <div class="col-md-4 text-start">
        <img src="<?= BASE_PATH . '/' . $_SESSION['empresaActiva']['logo_path'] ?>" alt="Logo Empresa" style="max-height: 80px;">
      </div>
    </div>

    <!-- BOTÓN VOLVER -->
    <div class="row mt-5">
            <div class="col-md-6 d-grid">
                <button class="btn btn-purple btn-lg">
                    <a href="<?= BASE_PATH . '/empleado?id=' . $id_empleado; ?>">Finalizar</a>
                </button>
            </div>
            <div class="col-md-6 d-grid">
                <button class="btn-descargar-pdf btn btn-purple btn-lg"
                    data-nombre="<?= $nombreCompleto; ?>">
                    Descargar PDF
                </button>
            </div>
        </div>
  </div>
</div>



<?php require_once 'views/partials/footer.php'; ?>