<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Notificaciones</h1>
    </div>
    
    <?php
    $existeSolicitudPendiente = false;
    $cont = 0;
    foreach ($vacaciones as $vacacion):
        if ($vacacion['estado'] === 'pendiente') :
            $cont++;
            $existeSolicitudPendiente = true; ?>
            <div class="card shadow border-start border-4 border-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-2">
                        Solicitud de vacaciones –
                        <strong>
                            <?php
                            $empleado = Empleado::getEmpleadoPorId($vacacion['id_empleado']);
                            ?>
                            <?= htmlspecialchars($empleado['nombre'] . " " . $empleado['apellidos']); ?>
                        </strong>
                    </h5>
                    <p class="card-text mb-1">
                        <i class="bi bi-calendar-event"></i> Desde: <strong><?= $vacacion['fecha_inicio']; ?></strong>
                    </p>
                    <p class="card-text mb-2">
                        <i class="bi bi-calendar-check"></i> Hasta: <strong><?= $vacacion['fecha_fin']; ?></strong>
                    </p>
                    <p class="card-text text-muted mb-3">
                        Enviada el: <?= htmlspecialchars($vacacion['fecha_solicitud']); ?>
                    </p>
                    <div class="d-flex gap-2">
                        <form method="POST">
                            <input type="hidden" name="id_vacacion" value="<?= $vacacion['id_vacacion']; ?>">
                            <button type="submit" name="accion" value="aceptar" class="btn btn-success">
                                <i class="bi bi-check-circle-fill"></i> Aceptar
                            </button>
                            <button type="submit" name="accion" value="rechazar" class="btn btn-danger">
                                <i class="bi bi-x-circle-fill"></i> Rechazar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach;
    if (!$existeSolicitudPendiente): ?>
        <h5 class="alert alert-info">No hay solicitudes pendientes</h5>
    <?php endif; ?>

</div>

<?php require_once 'views/partials/footer.php'; ?>