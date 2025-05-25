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
            <h1>Estadísticas mensuales</h1>
            <ul class="nav nav-tabs mt-4" id="tabsCostes" role="tablist">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $mesNombre = $meses[$i];
                    echo "
                <li class='nav-item' role='presentation'>
                    <button class='nav-link " . ($i === 1 ? 'active' : '') . "' 
                            id='tab-mes-$i' 
                            data-bs-toggle='tab' 
                            data-bs-target='#mes-$i' 
                            type='button' role='tab' 
                            aria-controls='mes-$i' 
                            aria-selected='" . ($i === 1 ? 'true' : 'false') . "'>
                        $mesNombre
                    </button>
                </li>
                ";
                }
                ?>
            </ul>

            <div class="tab-content p-3 bg-white border border-top-0 rounded-bottom" id="tabsContent">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "
                <div class='tab-pane fade " . ($i === 1 ? 'show active' : '') . "' 
                    id='mes-$i' role='tabpanel' aria-labelledby='tab-mes-$i'>
                    <canvas id='grafico-mes-$i' width='100%' height='500px'></canvas>
                </div>
                ";
                }
                ?>
            </div>
        </div>
    </div>
</main>


<?php require_once 'views/partials/footer.php'; ?>