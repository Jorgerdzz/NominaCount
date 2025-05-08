<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Notificaciones</h1>
    </div>

    <div class="card shadow border-start border-4 border-warning">
        <div class="card-body">
            <h5 class="card-title mb-2">
                Solicitud de vacaciones – <strong>Juan Pérez</strong>
            </h5>
            <p class="card-text mb-1">
                <i class="bi bi-calendar-event"></i> Desde: <strong>2025-06-15</strong>
            </p>
            <p class="card-text mb-2">
                <i class="bi bi-calendar-check"></i> Hasta: <strong>2025-06-20</strong>
            </p>
            <p class="card-text text-muted mb-3">
                Enviada el: 08/05/2025 a las 10:23
            </p>
            <div class="d-flex gap-2">
                <form method="POST">
                    <button class="btn btn-success">
                        <i class="bi bi-check-circle-fill"></i> Aceptar
                    </button>
                    <button class="btn btn-danger">
                        <i class="bi bi-x-circle-fill"></i> Rechazar
                    </button>
                </form>  
            </div>
        </div>
    </div>

</div>


<?php require_once 'views/partials/footer.php'; ?>