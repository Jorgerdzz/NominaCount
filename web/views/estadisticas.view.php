<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <h1>Estadísticas del departamento: <?= htmlspecialchars($nombre_departamento); ?></h1>

    <canvas id="grafico-costes-anuales" width="400" height="200"></canvas>

    <div class="mt-5">
        <ul class="nav nav-tabs" id="tabsCostes" role="tablist">
            <?php
            // 12 meses
            for ($i = 1; $i <= 12; $i++) {
                $mesNombre = date('F', mktime(0, 0, 0, $i, 10));
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

        <div class="tab-content p-3 border border-top-0 rounded-bottom" id="tabsContent">
            <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "
                <div class='tab-pane fade " . ($i === 1 ? 'show active' : '') . "' 
                    id='mes-$i' role='tabpanel' aria-labelledby='tab-mes-$i'>
                    <canvas id='grafico-mes-$i' width='400' height='200'></canvas>
                </div>
                ";
            }
            ?>
        </div>
    </div>
</div>

<?php require_once 'views/partials/footer.php'; ?>