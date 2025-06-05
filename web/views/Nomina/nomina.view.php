<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <div class="container my-5">
        <div class="card p-5 bg-white">
            <h2 class="mx-3" style="color: #825abd;">Nómina calculada</h2>

            <section class="pdf-nomina p-3">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4">
                        <thead class="table-light">
                            <tr>
                                <th colspan="4" class="text-center text-uppercase text-muted">Datos Nómina</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Empresa</strong></td>
                                <td><?= $_SESSION['empresaActiva']['denominacion_social']; ?></td>
                                <td><strong>Trabajador</strong></td>
                                <td><?= $empleado['nombre'] . ' ' . $empleado['apellidos']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>CIF</strong></td>
                                <td><?= $_SESSION['empresaActiva']['cif']; ?></td>
                                <td><strong>DNI</strong></td>
                                <td><?= $empleado['dni']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Dirección</strong></td>
                                <td><?= $_SESSION['empresaActiva']['direccion']; ?></td>
                                <td><strong>Nº SS</strong></td>
                                <td><?= $empleado['num_seguridad_social']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Teléfono empresa</strong></td>
                                <td><?= $_SESSION['empresaActiva']['telefono']; ?></td>
                                <td><strong>Categoría profesional</strong></td>
                                <td><?= $empleado['categoria_profesional']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Periodo de liquidación</strong></td>
                                <td colspan="3"><?= $nomina['fecha_inicio']; ?> a <?= $nomina['fecha_fin']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                <!-- DEVENGOS -->
                <h4 class="mt-4 mb-3" style="color: #825abd;">I. Devengos</h4>
                <table class="table table-sm table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Concepto</th>
                            <th>Importe (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Salario base</td>
                            <td><?= $nomina['salario_base'] ?></td>
                        </tr>
                        <tr>
                            <td>Incentivos</td>
                            <td><?= $nomina['incentivos'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus dedicación</td>
                            <td><?= $nomina['plus_especial_dedicacion'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus antigüedad</td>
                            <td><?= $nomina['plus_antiguedad'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus actividad</td>
                            <td><?= $nomina['plus_actividad'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus nocturnidad</td>
                            <td><?= $nomina['plus_nocturnidad'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus responsabilidad</td>
                            <td><?= $nomina['plus_responsabilidad'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus convenio</td>
                            <td><?= $nomina['plus_convenio'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus idiomas</td>
                            <td><?= $nomina['plus_idiomas'] ?></td>
                        </tr>
                        <tr>
                            <td>Horas extra</td>
                            <td><?= $nomina['horas_extra'] ?></td>
                        </tr>
                        <tr>
                            <td>Horas complementarias</td>
                            <td><?= $nomina['horas_complementarias'] ?></td>
                        </tr>
                        <tr>
                            <td>Salario en especie</td>
                            <td><?= $nomina['salario_especie'] ?></td>
                        </tr>
                        <tr>
                            <td>Plus transporte</td>
                            <td><?= $nomina['plus_transporte'] ?></td>
                        </tr>
                        <tr>
                            <td>Dietas</td>
                            <td><?= $nomina['dietas'] ?></td>
                        </tr>
                        <tr class="table-light">
                            <td><strong>Total Devengado</strong></td>
                            <td><strong><?= $nomina['total_devengado'] ?> €</strong></td>
                        </tr>
                    </tbody>
                </table>

                <!-- DEDUCCIONES -->
                <h4 class="mt-4 mb-3" style="color: #825abd;">II. Deducciones</h4>
                <table class="table table-sm table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Concepto</th>
                            <th>Importe (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Contingencias comunes</td>
                            <td><?= $nomina['importe_cc'] ?></td>
                        </tr>
                        <tr>
                            <td>M.E.I</td>
                            <td><?= $nomina['importe_MEI'] ?></td>
                        </tr>
                        <tr>
                            <td>Desempleo</td>
                            <td><?= $nomina['importe_desempleo'] ?></td>
                        </tr>
                        <tr>
                            <td>Formación Profesional</td>
                            <td><?= $nomina['importe_fp'] ?></td>
                        </tr>
                        <tr>
                            <td>Horas Extraordinarias</td>
                            <td><?= $nomina['importe_horas_extra'] ?></td>
                        </tr>
                        <tr>
                            <td>Horas Extra Fuerza Mayor</td>
                            <td><?= $nomina['importe_horas_extra_fuerza_mayor'] ?></td>
                        </tr>
                        <tr>
                            <td>IRPF</td>
                            <td><?= $nomina['importe_irpf'] ?></td>
                        </tr>
                        <tr class="table-light">
                            <td><strong>Total Deducciones</strong></td>
                            <td colspan="3"><strong><?= $nomina['total_deducciones'] ?> €</strong></td>
                        </tr>
                    </tbody>
                </table>

                <!-- LIQUIDO A PERCIBIR -->
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="p-3 bg-light rounded border border-2">
                            <h5 class="text-dark"><strong>Líquido total a percibir:</strong> <?= $nomina['salario_neto'] ?> €</h5>
                        </div>
                    </div>
                </div>

                <!-- COSTE EMPRESA -->
                <h4 class="mt-4 mb-3" style="color: #825abd;">III. Coste para la empresa</h4>
                <table class="table table-sm table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Concepto</th>
                            <th>Base (€)</th>
                            <th>Tipo %</th>
                            <th>Importe (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Contingencias comunes</td>
                            <td><?= $nomina['base_cc'] ?></td>
                            <td>23.60</td>
                            <td><?= number_format($cotizacion_contingencias_comunes, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Accidentes trabajo / EP</td>
                            <td><?= $nomina['base_cp'] ?></td>
                            <td>1.50</td>
                            <td><?= number_format($cotizacion_accidentes_trabajo, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Desempleo</td>
                            <td><?= $nomina['base_cp'] ?></td>
                            <td>5.50</td>
                            <td><?= number_format($cotizacion_desempleo_empresa, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Formación Profesional</td>
                            <td><?= $nomina['base_cp'] ?></td>
                            <td>0.60</td>
                            <td><?= number_format($cotizacion_formacion_empresa, 2) ?></td>
                        </tr>
                        <tr>
                            <td>FOGASA</td>
                            <td><?= $nomina['base_cp'] ?></td>
                            <td>0.20</td>
                            <td><?= number_format($cotizacion_fogasa_empresa, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Cotización horas extra</td>
                            <td><?= $nomina['horas_extra'] ?></td>
                            <td>23.60</td>
                            <td><?= number_format($cotizacion_horas_extra, 2) ?></td>
                        </tr>
                        <tr>
                            <td>Cotización horas extra fuerza mayor</td>
                            <td><?= $nomina['horas_complementarias'] ?></td>
                            <td>12.00</td>
                            <td><?= number_format($cotizacion_horas_extra_fuerza_mayor, 2) ?></td>
                        </tr>
                        <tr class="table-light">
                            <td><strong>Total costes empresa</strong></td>
                            <td colspan="3">
                                <strong>
                                    <?= number_format($coste_total_trabajador, 2) ?> €
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <div class="row mx-1">
                <div class="col-md-6">     
                    <a href="<?= BASE_PATH . '/empleado?id=' . $id_empleado; ?>">
                        <div class="d-grid m-2">
                            <button class="btn btn-purple btn-lg">Finalizar</button>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="d-grid m-2">
                        <button class="btn-descargar-pdf btn btn-purple btn-lg"
                            data-nombre="<?= $empleado['nombre']; ?>"
                            data-apellidos="<?= $empleado['apellidos']; ?>"
                            data-inicio="<?= $nomina['fecha_inicio']; ?>"
                            data-fin="<?= $nomina['fecha_fin']; ?>">
                            Descargar PDF
                        </button>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</main>


<?php require_once 'views/partials/footer.php'; ?>