<?php require 'views/partials/head.php'; ?>
<?php require 'views/partials/nav-empresa.php'; ?>

<div class="container my-5">
    <div class="card p-4 bg-white">
        <h2 class="text-start mb-4" style="color: #825abd;">Perfil de Usuario</h2>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Nombre:</strong> <?= $nombre; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Correo electrónico:</strong> <?= $email; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>C.I.F:</strong> <?= $cif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Denominación social:</strong> <?= $denominacion_social; ?>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="bg-light p-3 rounded">
                    <strong>Nombre comercial:</strong> <?= $nombre_comercial; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Teléfono:</strong> <?= $telefono; ?>
                </div>
            </div>
            <div class="col">
                <div class=" bg-light p-3 rounded">
                    <strong>Dirección:</strong> <?= $direccion; ?>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-grid m-3">
                        <button type="submit" class="btn btn-purple px-4" id="boton-editar-perfil-usuario" data-bs-toggle="modal" data-bs-target="#editar-perfil-usuario">Editar perfil</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid m-3">
                        <button type="submit" class="btn btn-purple px-4" data-bs-toggle="modal" data-bs-target="#cambiar-contraseña">Cambiar contraseña</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-grid m-3">
                        <button type="submit" class="btn btn-danger px-4">Eliminar cuenta</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Perfil Usuario -->
<div class="modal fade" id="editar-perfil-usuario" tabindex="-1" aria-labelledby="editar-perfil-usuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Editar perfil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                <div class="mb-3">
                        <label for="editar-cif" class="form-label">C.I.F:</label>
                        <input type="text" class="form-control" id="editar-cif" name="editar-cif" value="<?= $cif;?>" aria-describedby="editar-cifHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-denominacion-social" class="form-label">Denominación social:</label>
                        <input type="text" class="form-control" id="editar-denominacion-social" name="editar-denominacion-social" value="<?= $denominacion_social;?>" aria-describedby="editar-denominacionHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-nombre-comercial" class="form-label">Nombre comercial:</label>
                        <input type="text" class="form-control" id="editar-nombre-comercial" name="editar-nombre-comercial" value="<?= $nombre_comercial;?>" aria-describedby="editar-nombre-comercialHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-direccion" class="form-label">Dirrección:</label>
                        <input type="text" class="form-control" id="editar-direccion" name="editar-direccion" value="<?= $direccion;?>" aria-describedby="editar-direccionHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-telefono" class="form-label">Telefono:</label>
                        <input type="text" class="form-control" id="editar-telefono" name="editar-telefono" value="<?= $telefono;?>" aria-describedby="editar-telefonoHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-nombre-usuario" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="editar-nombre-usuario" name="editar-nombre-usuario" value="<?= $nombre;?>" aria-describedby="editar-nombre-usuarioHelp">
                    </div>
                    <div class="mb-3">
                        <label for="editar-email-usuario" class="form-label">Correo electrónico:</label>
                        <input type="text" class="form-control" id="editar-email-usuario" name="editar-email-usuario" value="<?= $email;?>" aria-describedby="editar-email-usuarioHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary" id="editarUsuario" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="cambiar-contraseña" tabindex="-1" aria-labelledby="editar-perfil-usuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Cambiar contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="contra-actual" class="form-label">Contraseña actual:</label>
                        <input type="text" class="form-control" id="contra-actual" name="contra-actual" aria-describedby="contra-actualHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nueva-contra" class="form-label">Nueva contraseña:</label>
                        <input type="text" class="form-control" id="nueva-contra" name="nueva-contra" aria-describedby="nueva-contraHelp">
                    </div>
                    <div class="mb-3">
                        <label for="confirmar-contra" class="form-label">Confirmar contraseña:</label>
                        <input type="text" class="form-control" id="confirmar-contra" name="confirmar-contra" aria-describedby="confirmar-contraHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary" id="cambiar-contra" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>











<?php require 'views/partials/footer.php'; ?>