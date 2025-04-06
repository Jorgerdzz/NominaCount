<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>


<!-- Tabla empleados -->
<section class="container mt-4">
    <h1 class="text-danger"><?= $departamentoActual['nombre_departamento'] ?></h1>

    <div class="section-header">
        <h2>Empleados</h2>
    </div>

    <div class="top-toolbar">
        <!-- Controles de tabla arriba -->
    </div>

    <table id="tabla-empleados">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Correo electrónico</th>
                <th>Salario base</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

    <div class="bottom-toolbar">
        <div class="bottom-left">
            <!-- Paginación -->
        </div>
        <div class="bottom-right">
            <!-- Botones de exportación -->
        </div>
    </div>

</section>


<?php require_once 'views/partials/footer.php'; ?>