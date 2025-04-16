<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <div class="card p-4 bg-white">
        <h2 class="mb-4" style="color: #825abd;">Cálculo de Nómina</h2>

        <form method="POST">
            <!-- PERIODO DE LIQUIDACIÓN -->
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <label for="periodo_inicio" class="form-label">Inicio del periodo:</label>
                    <input type="date" class="form-control" id="periodo_inicio" name="periodo_inicio">
                </div>
                <div class="col-md-6">
                    <label for="periodo_fin" class="form-label">Fin del periodo:</label>
                    <input type="date" class="form-control" id="periodo_fin" name="periodo_fin">
                </div>
            </div>

            <!-- DEVENGOS -->
            <h4 class="mt-4 mb-3" style="color: #825abd;">I. Devengos totales</h4>

            <h5 class="mt-4 mb-3" style="color: #825abd;">I.I. Percepciones salariales</h5>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Salario base</div>
                <div class="col-md-6"><input value="<?= $datos_empleado['salario_base']; ?>" name="salario_base" class="form-control"></div>
            </div>

            <h5 class="mt-4 mb-3" style="color: #825abd;">I.II. Complementos salariales</h5>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Incentivos</div>
                <div class="col-md-6"><input type="number" step="0.01" name="incentivos" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus especial dedicación</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_dedicacion" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus antigüedad</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_antiguedad" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus actividad</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_actividad" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus nocturnidad</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_nocturnidad" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus responsabilidad</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_responsabilidad" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus convenio</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_convenio" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus idiomas</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_idiomas" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Horas extraordinarias</div>
                <div class="col-md-6"><input type="number" step="0.01" name="horas_extra" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Horas complementarias</div>
                <div class="col-md-6"><input type="number" step="0.01" name="horas_complementarias" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Salario en especie</div>
                <div class="col-md-6"><input type="number" step="0.01" name="salario_especie" class="form-control"></div>
            </div>

            <h5 class="mt-4 mb-3" style="color: #825abd;">I.III. Percepciones no salariales</h5>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Indemnizaciones o Suplidos</div>
                <div class="col-md-6"><input type="number" step="0.01" name="indemnizaciones" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Prestaciones e indemnizaciones de la seguridad social</div>
                <div class="col-md-6"><input type="number" step="0.01" name="indemnizaciones_ss" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Indemnizaciones por traslados, suspensiones o despidos</div>
                <div class="col-md-6"><input type="number" step="0.01" name="indemnizaciones_despido" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Plus transporte</div>
                <div class="col-md-6"><input type="number" step="0.01" name="plus_transporte" class="form-control"></div>
            </div>

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Dietas</div>
                <div class="col-md-6"><input type="number" step="0.01" name="dietas" class="form-control"></div>
            </div>

            <!-- TOTAL DEVENGADO -->
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Total Devengado</strong></div>
                <div class="col-md-6"><input type="number" step="0.01" name="total_devengado" class="form-control"></div>
            </div>

            <!-- II. DEDUCCIONES -->
            <h4 class="mt-5 mb-3" style="color: #825abd;">II. Deducciones</h4>

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Concepto</th>
                            <th>Base (€)</th>
                            <th>Tipo (%)</th>
                            <th>Importe (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Contingencias comunes</td>
                            <td><input id="base_cc" name="base_cc" class="form-control text-center" readonly></td>
                            <td><input value="4.70" name="tipo_cc" class="form-control text-center" readonly></td>
                            <td><input name="importe_cc" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">M.E.I</td> <!-- Mecanismo de Equidad Integracional -->
                            <td><input name="base_MEI" class="form-control text-center" readonly></td>
                            <td><input value="0.13" name="tipo_MEI" class="form-control text-center" readonly></td>
                            <td><input name="importe_MEI" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">Desempleo</td>
                            <td><input name="base_desempleo" class="form-control text-center" readonly></td>
                            <td><input value="1.55" name="tipo_desempleo" class="form-control text-center" readonly></td>
                            <td><input name="importe_desempleo" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">Formación profesional</td>
                            <td><input name="base_fp" class="form-control text-center" readonly></td>
                            <td><input value="0.10" name="tipo_fp" class="form-control text-center" readonly></td>
                            <td><input name="importe_fp" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">Horas extra normales</td>
                            <td><input name="base_hextra" class="form-control text-center" readonly></td>
                            <td><input value="4.70" name="tipo_hextra" class="form-control text-center" readonly></td>
                            <td><input name="importe_hextra" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">Horas extra de Fuerza Mayor</td>
                            <td><input name="base_hextraFuerzaMayor" class="form-control text-center" readonly></td>
                            <td><input value="2.00" name="tipo_hextraFuerzaMayor" class="form-control text-center" readonly></td>
                            <td><input name="importe_hextraFuerzaMayor" class="form-control text-center" readonly></td>
                        </tr>
                        <tr>
                            <td class="text-start">IRPF</td>
                            <td><input name="base_irpf" class="form-control text-center" readonly></td>
                            <td><input name="tipo_irpf" class="form-control text-center" readonly></td>
                            <td><input name="importe_irpf" class="form-control text-center" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- TOTAL DEDUCCIONES -->
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Total Aportaciones a la Seguridad Social</strong></div>
                <div class="col-md-6"><input name="total_aportaciones" class="form-control"></div>
            </div>
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Total Deducciones</strong></div>
                <div class="col-md-6"><input name="total_deducir" class="form-control"></div>
            </div>

            <!-- LIQUIDO A PERCIBIR -->
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Líquido total a percibir</strong></div>
                <div class="col-md-6"><input name="liquido" class="form-control"></div>
            </div>

            <!-- ENVÍO -->
            <div class="row mt-5">
                <div class="col-md-6 d-grid">
                    <button class="btn btn-purple btn-lg">
                        <a href="<?= BASE_PATH . '/empleado?id=' . $id_empleado; ?>">Volver</a>
                    </button>
                </div>
                <div class="col-md-6 d-grid">
                    <button type="submit" class="btn btn-purple btn-lg">Generar nómina</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
window.empleadoData = {
    id: <?= json_encode($datos_empleado['id_empleado']); ?>,
    salario_base: <?= json_encode($datos_empleado['salario_base']); ?>,
    estado_civil: <?= json_encode($datos_empleado['estado_civil']); ?>,
    num_hijos: <?= json_encode($datos_empleado['num_hijos']); ?>,
    minusvalia: <?= json_encode($datos_empleado['minusvalia']); ?>,
    edad: <?= json_encode($datos_empleado['edad'] ?? 0); ?>
};
</script>

<?php require_once 'views/partials/footer.php'; ?>