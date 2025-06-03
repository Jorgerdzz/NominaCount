<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <!-- Tabla empleados -->
    <section class="container mt-4">

        <div class="row mb-3">
            <div class="col-10 section-header">
                <h2>Departamento de <?= $nombre_departamento; ?></h2>
            </div>
            <div class="col-2">
                <a href="<?= BASE_PATH . '/estadisticas?stats=' . $id_departamento; ?>" class="text-dark">
                    <div class="d-grid">
                        <button type="button" id="VerEstadisticas" class="btn btn-primary">Ver estadísticas</button>
                    </div>
                </a>
            </div>
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
                    <th>Numero seguridad social</th>
                    <th>Correo electrónico</th>
                    <th>Salario base</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($empleados as $empleado) {
                    echo '<tr data-id="' . $empleado['id_empleado'] . '">
                            <td><a href="' . BASE_PATH . '/empleado?id=' . $empleado['id_empleado'] . '"<i class="bi bi-person-circle text-dark"></i></a> 
                            <td>' . $empleado['nombre'] . '</a></td>
                            <td>' . $empleado['apellidos'] . '</td>
                            <td>' . $empleado['dni'] . '</td>
                            <td>' . $empleado['num_seguridad_social'] . '</td>
                            <td>' . $empleado['email'] . '</td>
                            <td>' . $empleado['salario_base'] . ' €</td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="container my-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-grid mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#anadir-empleado">Dar de alta empleado</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <a class="text-dark" href="<?= BASE_PATH . '/plantillaCSV'; ?>">
                        <div class="d-grid mb-3">
                            <button type="button" class="btn btn-primary">Descargar plantilla csv</button>
                        </div>
                    </a> 
                </div>
                <div class="col-md-3">
                    <div class="d-grid mb-3">
                        <form id="formImportCSV" method="POST" enctype="multipart/form-data" style="display: none;">
                            <input type="file" name="csv_empleados" id="csv_empleados" accept=".csv" required>
                            <input type="hidden" name="importar_csv" value="1">
                        </form>
                        <button type="button" id="btnImportarCSV" class="btn btn-primary">Importar csv empleados</button>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="hidden" id="id_departamento" value="<?= $departamentoActual['id_departamento']; ?>">
                    <div class="d-grid">
                        <button type="button" id="eliminar-departamento" class="btn btn-danger px-4">
                            Eliminar departamento
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<!-- Modal Añadir Empleado -->
<div class="modal fade" id="anadir-empleado" tabindex="-1" aria-labelledby="anadir-empleadoLabel">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Dar de alta empleado</h1>
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
                        <label for="num_seguridad_social" class="form-label">Numero seguridad social:</label>
                        <input type="text" class="form-control" id="num_seguridad_social" name="num_seguridad_social" placeholder="Ej: 721660997254" aria-describedby="num_seguridad_socialHelp">
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
                        <input type="date" class="form-control" id="antiguedad_empresa" name="antiguedad_empresa" aria-describedby="antiguedad_empresaHelp">
                    </div>
                    <div class="mb-3">
                        <label for="categoria_profesional" class="form-label">Categoría profesional:</label>
                        <select class="form-select" name="categoria_profesional" id="categoria_profesional">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="Ingenieros y Licenciados. Personal de alta dirección">Ingenieros y Licenciados. Personal de alta dirección</option>
                            <option value="Ingenieros Técnicos, Peritos y Ayudantes Titulados">Ingenieros Técnicos, Peritos y Ayudantes Titulados</option>
                            <option value="Jefes Administrativos y de Taller">Jefes Administrativos y de Taller</option>
                            <option value="Ayudantes no titulados">Ayudantes no titulados</option>
                            <option value="Oficiales Administrativos">Oficiales Administrativos</option>
                            <option value="Subalternos">Subalternos</option>
                            <option value="Auxiliares administrativos">Auxiliares administrativos</option>
                            <option value="Oficiales de primera y segunda">Oficiales de primera y segunda</option>
                            <option value="Oficiales de tercera y especialistas">Oficiales de tercera y especialistas</option>
                            <option value="Peones">Peones</option>
                            <option value="Trabajadores menores de dieciocho años">Trabajadores menores de dieciocho años</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="num_hijos" class="form-label">Número de hijos:</label>
                        <input type="number" class="form-control" id="num_hijos" name="num_hijos" min="0" placeholder="Ej: 1" aria-describedby="num_hijosHelp">
                    </div>
                    <div class="mb-3">
                        <label for="estado_civil" class="form-label">Estado civil:</label>
                        <select class="form-select" name="estado_civil" id="estado_civil">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="pareja_hecho">Pareja de hecho</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" aria-describedby="fecha_nacimientoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="minusvalia" class="form-label">Minusvalía:</label>
                        <select class="form-select" name="minusvalia" id="minusvalia">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="Sin discapacidad">Sin discapacidad</option>
                            <option value="Entre el 33% y el 65%">Entre el 33% y el 65%</option>
                            <option value="Igual o superior al 65%">Igual o superior al 65%</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salario_base" class="form-label">Salario base:</label>
                        <input type="text" class="form-control" id="salario_base" name="salario_base" placeholder="Ej: 3500" aria-describedby="salario_baseHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary" id="registroEmpleado" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require_once 'views/partials/footer.php'; ?>