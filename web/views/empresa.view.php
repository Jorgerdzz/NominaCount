<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <h2>Costes Anuales por Departamento</h2>

    <div class="card p-5 bg-white">
        <div id="grafico-empresa-container" style="height: 500px; width: 100%">
            <canvas id="graficoCostesEmpresa"></canvas>
        </div>
    </div>
</div>

<?php require_once 'views/partials/footer.php'; ?>