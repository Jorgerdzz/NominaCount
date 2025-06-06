<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <div class="container my-5">
        <div class="card p-4 bg-white">
            <div class="row g-4 align-items-center mb-4">
                <div class="col-md-8">
                    <h2 style="color: #825abd;">Perfil del Empleado</h2>
                </div>
                <div class="col-md-4 text-center">
                    <?php if (!empty($empleado['foto_empleado'])): ?>
                        <img src="<?= BASE_PATH . '/' . $empleado['foto_empleado'] ?>" alt="Foto del empleado" class="profile-img rounded" style="width: 150px; height: 150px; object-fit: cover;">
                    <?php else: ?>
                        <form id="form-foto-empleado" action="<?= BASE_PATH . '/foto-empleado' ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_empleado" value="<?= $empleado['id_empleado']; ?>">
                            <div class="row ">
                                <div class="col">
                                    <label for="foto_empleado" class="form-label text-muted">
                                        <i class="bi bi-person-bounding-box display-1 d-flex justify-content-center"></i>
                                        <div class="mt-2">
                                            <strong>Subir foto empleado</strong>
                                        </div>
                                        <input type="file" name="foto_empleado" id="foto_empleado" accept="image/*" class="form-control mb-2" style="display: none;">
                                    </label>
                                </div>
                            </div>    
                        </form>
                        <script>
                            document.getElementById('foto_empleado').addEventListener('change', function () {
                                document.getElementById('form-foto-empleado').submit();
                            });
                        </script>
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

            <div class="container gap-3 mt-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-3">
                        <?php if ($empleado['id_departamento'] != NULL) : ?>
                            <a href="<?= BASE_PATH . '/departamento?id=' . $departamento['id_departamento']; ?>">
                                <div class="d-grid m-3">
                                    <button class="btn btn-purple px-4">Volver</button>
                                </div>
                            </a>
                        <?php else : ?>
                            <a href="<?= BASE_PATH . '/empresa' ?>">
                                <div class="d-grid m-3">
                                    <button class="btn btn-purple px-4">Volver</button>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 col-md-3">    
                        <a href="<?= BASE_PATH . '/calcular-nomina/empleado?id=' . $id_empleado; ?>">
                            <div class="d-grid m-3">
                                <button type="button" class="btn btn-purple px-4">Calcular nómina</button>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-3">   
                        <a href="<?= BASE_PATH . '/calcular-finiquito/empleado?id=' . $id_empleado; ?>">
                            <div class="d-grid m-3">
                                <button type="button" class="btn btn-purple px-4">Calcular finiquito</button>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-3">
                        <div class="d-grid m-3">
                            <button type="button" class="btn btn-purple px-4" id="modificarDatosEmpleado" data-bs-toggle="modal" data-bs-target="#editar-perfil-empleado">Editar perfil</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">   
                        <a href="<?= BASE_PATH . '/historial-nomina/empleado?id=' . $id_empleado; ?>">
                            <div class="d-grid m-3">
                                <button type="button" class="btn btn-purple px-4">Ver historial nóminas</button>
                            </div>
                        </a>   
                    </div>
                    <div class="col-12 col-md-3">        
                        <a href="<?= BASE_PATH . '/finiquito/empleado?id=' . $id_empleado; ?>">
                            <div class="d-grid m-3">
                                <button type="button" class="btn btn-purple px-4">Ver finiquito</button>
                            </div>
                        </a>    
                    </div>
                    <div class="col-12">
                        <div class="d-grid m-3">
                            <input type="hidden" id="id_empleado" value="<?= $empleado['id_empleado']; ?>">
                            <input type="hidden" id="email_empleado" value="<?= $empleado['email']; ?>">
                            <input type="hidden" id="departamento_empleado" value="<?= $empleado['id_departamento']; ?>">
                            <button type="button" id="baja_empleado" class="btn btn-danger px-4">
                                Dar de baja empleado
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


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
                        <select class="form-select" name="editar-categoria-profesional" id="editar-categoria-profesional">
                            <option value="" disabled <?= $empleado['categoria_profesional'] === '' ? 'selected' : '' ?>>Seleccione una opción</option>
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
                        <label for="editar-hijos-empleado" class="form-label">Número de hijos:</label>
                        <input type="number" class="form-control" id="editar-hijos-empleado" min="0" name="editar-hijos-empleado" value="<?= $empleado['num_hijos']; ?>" aria-describedby="editar-hijos-empleadoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-estado-empleado" class="form-label">Estado civil:</label>
                        <select class="form-select" name="editar-estado-empleado" id="editar-estado-empleado">
                            <option value="" disabled <?= $empleado['estado_civil'] === '' ? 'selected' : '' ?>>Seleccione una opción</option>
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
                        <select class="form-select" name="editar-minusvalia" id="editar-minusvalia">
                            <option value="" disabled <?= $empleado['minusvalia'] === '' ? 'selected' : '' ?>>Seleccione una opción</option>
                            <option value="Sin discapacidad">Sin discapacidad</option>
                            <option value="Entre el 33% y el 65%">Entre el 33% y el 65%</option>
                            <option value="Igual o superior al 65%">Igual o superior al 65%</option>
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