<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empleado.php'; ?>

<main>
    <div class="container my-5">
        <div class="card p-4 bg-white">
            <div class="row g-4 align-items-center mb-4">
                <div class="col-md-8 d-flex align-self-center">
                    <h2 style="color: #825abd;">Perfil del Empleado</h2>
                </div>
                <div class="col-md-4 text-center">
                    <?php if (!empty($empleado['foto_empleado'])): ?>
                        <img src="<?= BASE_PATH . '/' . $empleado['foto_empleado'] ?>" alt="Foto del empleado" class="profile-img rounded" style="width: 150px; height: 150px; object-fit: cover;">
                    <?php else: ?>
                        <i class="bi bi-person-bounding-box display-1"></i>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Nombre:</strong> <?= $empleado['nombre']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Apellidos:</strong> <?= $empleado['apellidos']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>DNI:</strong> <?= $empleado['dni']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Numero seguridad social:</strong> <?= $empleado['num_seguridad_social']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Email:</strong> <?= $empleado['email']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Categoría profesional:</strong> <?= $empleado['categoria_profesional']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Teléfono:</strong> <?= $empleado['telefono']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Fecha de incorporación:</strong> <?= $empleado['antiguedad_empresa']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Número de Hijos:</strong> <?= $empleado['num_hijos']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Minusvalía:</strong> <?= $empleado['minusvalia']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Estado Civil:</strong> <?= $empleado['estado_civil']; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-3 rounded">
                        <strong>Fecha de Nacimiento:</strong> <?= $empleado['fecha_nacimiento']; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="bg-light p-3 rounded">
                        <strong>Salario Base:</strong> <?= $empleado['salario_base']; ?> €
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php require_once 'views/partials/footer.php'; ?>