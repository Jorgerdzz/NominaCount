<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <div class="card p-4 bg-white">
        <div class="row g-4 align-items-center mb-4">
            <div class="col-md-9">
                <h2 style="color: #825abd;">Perfil del Empleado</h2>
            </div>
            <div class="col-md-3 text-md-end text-center">
                <img src="https://via.placeholder.com/150" alt="Foto del empleado" class="profile-img">
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
                    <strong>Email:</strong> <?= $empleado['email']; ?>
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
                    <strong>Estado Civil:</strong> <?= $empleado['estado_civil']; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Fecha de Nacimiento:</strong> <?= $empleado['fecha_nacimiento']; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Salario Base:</strong> <?= $empleado['salario_base']; ?> €
                </div>
            </div>
        </div>

        <div class="text-center mt-4 d-flex justify-content-center gap-3">
            <div class="col-md-3">
                <input type="hidden" name="dni" value="<?= $departamento['nombre_departamento']; ?>">
                <button type="submit" class="btn btn-purple px-4">
                    <a href="<?= BASE_PATH . '/departamento?departamento=' . $_SESSION['nombre_departamento']; ?>">Volver</a>
                </button>
            </div>
            <div class="col-md-3">
                <input type="hidden" name="dni" value="<?= $empleado['dni']; ?>">
                <button type="submit" class="btn btn-purple px-4">Editar Perfil</button>
            </div>
            <div class="col-md-3">
                <input type="hidden" name="dni" value="<?= $empleado['dni']; ?>">
                <button type="submit" class="btn btn-purple px-4">
                    <a href="<?= BASE_PATH . '/calcular-nomina';?>">Calcular Nómina</a>
                </button>
            </div>
            <div class="col-md-3">
                <input type="hidden" name="dni" value="<?= $empleado['dni']; ?>">
                <button type="submit" class="btn btn-danger px-4">Dar de baja empleado</button>
            </div>
        </div>
    </div>
</div>





<?php require_once 'views/partials/footer.php'; ?>