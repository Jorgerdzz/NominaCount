<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <div class="container my-5">
        <h2>Estadísticas Globales de la Empresa</h2>

        <div class="card p-5 bg-white">
            <div id="grafico-empresa-container" style="height: 500px; width: 100%">
                <canvas id="graficoCostesEmpresa"></canvas>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Resumen de Costes de la Empresa</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Coste Total Empresa:</span>
                                <strong><?= number_format($estadisticas['coste_total'] ?? 0, 2, ',', '.') ?> €</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Coste Medio por Departamento:</span>
                                <strong><?= number_format($estadisticas['coste_medio'] ?? 0, 2, ',', '.') ?> €</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Número de Departamentos:</span>
                                <strong><?= $estadisticas['num_departamentos'] ?? 0 ?></strong>
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
    </div>
</main>

<?php require_once 'views/partials/footer.php'; ?>