<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <div class="container my-5">
        <h1>Estadísticas del departamento de <?= htmlspecialchars($nombre_departamento); ?></h1>

        <div class="chart-container card p-5 bg-white my-3">
            <div class="grafico-departamento-container" style="height: 500px; width: 100%">
                <canvas id="graficoCostes"></canvas>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Resumen de Costes del Departamento</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Coste Total Departamento:</span>
                                <strong><?= number_format($estadisticas['coste_total_departamento'] ?? 0, 2, ',', '.') ?> €</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Coste Medio por Empleado:</span>
                                <strong><?= number_format($estadisticas['coste_medio_empleado'] ?? 0, 2, ',', '.') ?> €</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Número de Empleados:</span>
                                <strong><?= $estadisticas['num_empleados'] ?? 0 ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
    <h1 class="mb-4">Estadísticas Mensuales</h1>
    
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <ul class="nav nav-tabs nav-justified px-3 pt-3" id="tabsCostes" role="tablist">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= $i === 1 ? 'active' : '' ?> rounded-top" 
                            id="tab-mes-<?= $i ?>" 
                            data-bs-toggle="tab" 
                            data-bs-target="#mes-<?= $i ?>" 
                            type="button" role="tab"
                            aria-controls="mes-<?= $i ?>"
                            aria-selected="<?= $i === 1 ? 'true' : 'false' ?>">
                        <?= $meses[$i] ?>
                    </button>
                </li>
                <?php endfor; ?>
            </ul>

            <div class="tab-content p-4" id="tabsContent">
                <?php for ($i = 1; $i <= 12; $i++): 
                    $datosMes = $estadisticas_mensuales['datos_mensuales'][$i] ?? [
                        'coste_total' => 0,
                        'num_empleados' => 0,
                        'coste_medio_empleado' => 0,
                        'nombre_mes' => $meses[$i]
                    ];
                ?>
                <div class="tab-pane fade <?= $i === 1 ? 'show active' : '' ?>" 
                     id="mes-<?= $i ?>" role="tabpanel" aria-labelledby="tab-mes-<?= $i ?>">
                    
                    <!-- Gráfico grande -->
                    <div class="card border-0 mb-4 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0 text-primary">
                                <i class="fas fa-chart-bar me-2"></i>
                                Gráfico de <?= $meses[$i] ?>
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="grafico-mes-<?= $i ?>" width="100%" height="400"></canvas>
                        </div>
                    </div>
                    
                    <!-- Card con estadísticas -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title mb-0 text-primary">
                                <i class="fas fa-calculator me-2"></i>
                                Resumen de <?= $meses[$i] ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 border-end">
                                    <div class="text-center py-2">
                                        <div class="text-muted small">Coste Total</div>
                                        <h3 class="text-primary my-2">
                                            <?= number_format($datosMes['coste_total'], 2, ',', '.') ?> €
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end">
                                    <div class="text-center py-2">
                                        <div class="text-muted small">Coste Medio</div>
                                        <h3 class="text-primary my-2">
                                            <?= number_format($datosMes['coste_medio_empleado'], 2, ',', '.') ?> €
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center py-2">
                                        <div class="text-muted small">Empleados</div>
                                        <h3 class="text-primary my-2">
                                            <?= $datosMes['num_empleados'] ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
    </div>
</main>


<?php require_once 'views/partials/footer.php'; ?>