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

        <div class="container gap-3 mt-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-3">
                    <div class="d-grid m-3">
                        <button class="btn btn-purple px-4">
                            <a href="<?= BASE_PATH . '/departamento?departamento=' . $_SESSION['nombre_departamento']; ?>">Volver</a>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-grid m-3">
                        <button type="button" class="btn btn-purple px-4" id="modificarDatosEmpleado" data-bs-toggle="modal" data-bs-target="#editar-perfil-empleado">Editar perfil</button>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-grid m-3">
                        <button type="button" class="btn btn-purple px-4">
                            <a href="<?= BASE_PATH . '/calcular-nomina/empleado?id=' . $id_empleado; ?>">Calcular nómina</a>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="d-grid m-3">
                        <button type="button" class="btn btn-purple px-4">
                            <a href="<?= BASE_PATH . '/historial-nomina/empleado?id=' . $id_empleado; ?>">Ver historial nóminas</a>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid m-3">
                        <input type="hidden" id="id_empleado" value="<?= $empleado['id_empleado']; ?>">
                        <input type="hidden" id="email_empleado" value="<?= $empleado['email']; ?>">
                        <button type="button" id="baja_empleado" class="btn btn-danger px-4">
                            Dar de baja empleado
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Perfil Empleado -->
<div class="modal fade" id="editar-perfil-empleado" tabindex="-1" aria-labelledby="editar-perfil-empleadoLabel">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Editar perfil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="editar-nombre-empleado" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="editar-nombre-empleado" name="editar-nombre-empleado" value="<?= $empleado['nombre']; ?>" aria-describedby="editar-nombre-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-apellidos-empleado" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" id="editar-apellidos-empleado" name="editar-apellidos-empleado" value="<?= $empleado['apellidos']; ?>" aria-describedby="editar-apellidos-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-dni-empleado" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="editar-dni-empleado" name="editar-dni-empleado" value="<?= $empleado['dni']; ?>" aria-describedby="editar-dni-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-num-seguridad-social" class="form-label">Número seguridad social:</label>
                        <input type="text" class="form-control" id="editar-num-seguridad-social" name="editar-num-seguridad-social" value="<?= $empleado['num_seguridad_social']; ?>" aria-describedby="editar-num-seguridad-socialHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-email-empleado" class="form-label">Correo electrónico:</label>
                        <input type="text" class="form-control" id="editar-email-empleado" name="editar-email-empleado" value="<?= $empleado['email']; ?>" aria-describedby="editar-email-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-telefono-empleado" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="editar-telefono-empleado" name="editar-telefono-empleado" value="<?= $empleado['telefono']; ?>" aria-describedby="editar-telefono-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-antiguedad-empleado" class="form-label">Fecha de incorporación:</label>
                        <input type="date" class="form-control" id="editar-antiguedad-empleado" name="editar-antiguedad-empleado" value="<?= $empleado['antiguedad_empresa']; ?>" aria-describedby="editar-antiguedad-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-categoria-profesional" class="form-label">Categoría profesional:</label>
                        <select name="editar-categoria-profesional" id="editar-categoria-profesional" value="<?= $empleado['categoria_profesional']; ?>">
                            <option value="ingenieros_licenciados">Ingenieros y Licenciados. Personal de alta dirección</option>
                            <option value="ingenieros_tecnicos">Ingenieros Técnicos, Peritos y Ayudantes Titulados</option>
                            <option value="jefes_administrativos">Jefes Administrativos y de Taller</option>
                            <option value="ayudantes_no_titulados">Ayudantes no titulados</option>
                            <option value="oficiales_administrativos">Oficiales Administrativos</option>
                            <option value="subalternos">Subalternos</option>
                            <option value="auxiliares_administrativos">Auxiliares administrativos</option>
                            <option value="oficiales_primera_segunda">Oficiales de primera y segunda</option>
                            <option value="oficiales_tercera_especialistas">Oficiales de tercera y especialistas</option>
                            <option value="peones">Peones</option>
                            <option value="menores">Trabajadores menores de dieciocho años</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar-hijos-empleado" class="form-label">Número de hijos:</label>
                        <input type="text" class="form-control" id="editar-hijos-empleado" name="editar-hijos-empleado" value="<?= $empleado['num_hijos']; ?>" aria-describedby="editar-hijos-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-estado-empleado" class="form-label">Estado civil:</label>
                        <select name="editar-estado-empleado" id="editar-estado-empleado" value="<?= $empleado['nombre']; ?>">
                            <option value="soltero">Soltero</option>
                            <option value="casado">Casado</option>
                            <option value="divorciado">Divorciado</option>
                            <option value="pareja_hecho">Pareja de hecho</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar-nacimiento-empleado" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="editar-nacimiento-empleado" name="editar-nacimiento-empleado" value="<?= $empleado['fecha_nacimiento']; ?>" aria-describedby="editar-nacimiento-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-minusvalia" class="form-label">Minusvalía:</label>
                        <select name="editar-minusvalia" id="editar-minusvalia" value="<?= $empleado['minusvalia']; ?>">
                            <option value="Sin_discapacidad">Sin discapacidad</option>
                            <option value="media">Entre el 33% y el 65%</option>
                            <option value="alta">Igual o superior al 65%</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar-salario-empleado" class="form-label">Salario base:</label>
                        <input type="text" class="form-control" id="editar-salario-empleado" name="editar-salario-empleado" value="<?= $empleado['salario_base']; ?>" aria-describedby="editar-salario-empleadoHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary" id="confirmarModificacion" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require_once 'views/partials/footer.php'; ?>