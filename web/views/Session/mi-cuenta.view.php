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
                    <strong>Dirección:</strong> <?= $direccion; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light p-3 rounded">
                    <strong>Teléfono:</strong> <?= $telefono; ?>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-purple px-4" data-bs-toggle="modal" data-bs-target="#editar-perfil-usuario">Editar Perfil</button>
        </div>
    </div>
</div>

<!-- Modal Editar Perfil Usuario -->
<div class="modal fade" id="editar-perfil-usuario" tabindex="-1" aria-labelledby="editar-perfil-usuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Editar Perfil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="emailInicioSesion" class="form-label">Correo electrónico:</label>
                        <input type="text" class="form-control" id="emailInicioSesion" name="emailInicioSesion" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="contraInicioSesion" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="contraInicioSesion" name="contraInicioSesion" aria-describedby="contraHelp">
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











<?php require 'views/partials/footer.php'; ?>