<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <div class="card p-4 bg-white">
        <h2 class="mb-4" style="color: #825abd;">Cálculo de Nómina</h2>

        <form method="POST" action="procesar_nomina.php">
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

            <div class="row mb-2 align-items-center">
                <div class="col-md-6">Salario base</div>
                <div class="col-md-6"><input type="number" step="0.01" name="salario_base" class="form-control"></div>
            </div>

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
                            <td><input type="number" step="0.01" name="base_cc" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="tipo_cc" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="importe_cc" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-start">Desempleo</td>
                            <td><input type="number" step="0.01" name="base_desempleo" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="tipo_desempleo" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="importe_desempleo" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-start">Formación profesional</td>
                            <td><input type="number" step="0.01" name="base_fp" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="tipo_fp" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="importe_fp" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-start">Horas extra normales</td>
                            <td><input type="number" step="0.01" name="base_hextra" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="tipo_hextra" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="importe_hextra" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="text-start">IRPF</td>
                            <td><input type="number" step="0.01" name="base_irpf" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="tipo_irpf" class="form-control" readonly></td>
                            <td><input type="number" step="0.01" name="importe_irpf" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- TOTAL DEDUCCIONES -->
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Total a Deducir</strong></div>
                <div class="col-md-6"><input type="number" step="0.01" name="total_deducir" class="form-control"></div>
            </div>

            <!-- LIQUIDO A PERCIBIR -->
            <div class="row mt-4 mb-3 align-items-center bg-light p-2 rounded">
                <div class="col-md-6"><strong>Líquido total a percibir</strong></div>
                <div class="col-md-6"><input type="number" step="0.01" name="liquido" class="form-control"></div>
            </div>

            <!-- ENVÍO -->
            <div class="row mt-5">
                <div class="col-12 d-grid">
                    <button type="submit" class="btn btn-purple btn-lg">Calcular Nómina</button>
                </div>
            </div>

        </form>
    </div>
</div>

<?php require_once 'views/partials/footer.php'; ?>