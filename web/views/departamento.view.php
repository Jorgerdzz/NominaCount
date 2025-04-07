<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>


<!-- Tabla empleados -->
<section class="container mt-4">
    
    <div class="section-header">
        <h2>Empleados</h2>
    </div>

    <div class="top-toolbar">
        <!-- Controles de tabla arriba -->
    </div>

    <table id="tabla-empleados">
        <thead>
            <tr>
                <th>Ver perfil</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Correo electrónico</th>
                <th>Salario base</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($empleados as $empleado) {
                    echo '<tr data-id="' . $empleado['id_empleado'] . '">
                            <td><a href="' . BASE_PATH . '/empleado?id=' . $empleado['id_empleado'] . '"<i class="bi bi-person-circle"></i></a> 
                            <td>' . $empleado['nombre'] . '</a></td>
                            <td>' . $empleado['apellidos'] . '</td>
                            <td>' . $empleado['dni'] . '</td>
                            <td>' . $empleado['email'] . '</td>
                            <td>' . $empleado['salario_base'] . ' €</td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>

    <div class="container my-2">
        <div class="row">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#anadir-empleado">Añadir empleado</button>
        </div>
    </div>

</section>


<!-- Modal Añadir Empleado -->
<div class="modal fade" id="anadir-empleado" tabindex="-1" aria-labelledby="anadir-empleadoLabel">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Añadir empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre_empleado" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ej: Javier" aria-describedby="nombre_empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos_empleado" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="apellidos_empleado" name="apellidos_empleado" placeholder="Ej: Gutierrez Martín" aria-describedby="apellidos_empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="dni_empleado" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni_empleado" name="dni_empleado" placeholder="Ej: 60954324T" aria-describedby="dni_empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email_empleado" class="form-label">Correo electrónico:</label>
                        <input type="text" class="form-control" id="email_empleado" name="email_empleado" placeholder="example@empresa.com" aria-describedby="email_empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="telefono_empleado" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="telefono_empleado" name="telefono_empleado" placeholder="Ej: 678 324 677" aria-describedby="telefono_empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="antiguedad_empresa" class="form-label">Fecha de incorporación:</label>
                        <input type="text" class="form-control" id="antiguedad_empresa" name="antiguedad_empresa" placeholder="Ej: 2023-05-22" aria-describedby="antiguedad_empresaHelp">
                    </div>
                    <div class="mb-3">
                        <label for="num_hijos" class="form-label">Número de hijos:</label>
                        <input type="text" class="form-control" id="num_hijos" name="num_hijos" placeholder="Ej: 1" aria-describedby="num_hijosHelp">
                    </div>
                    <div class="mb-3">
                        <label for="estado_civil" class="form-label">Estado civil:</label>
                        <select name="estado_civil" id="estado_civil">
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="pareja_hecho">Pareja de hecho</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                        <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ej: 2000-07-16" aria-describedby="fecha_nacimientoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="salario_base" class="form-label">Salario base:</label>
                        <input type="text" class="form-control" id="salario_base" name="salario_base" placeholder="Ej: 3500 €" aria-describedby="salario_baseHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary" id="botonInicioSesion" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once 'views/partials/footer.php'; ?>