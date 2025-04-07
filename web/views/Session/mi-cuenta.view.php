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
            <form method="post" action="editar_usuario.php">
                <input type="hidden" name="email" value="<?= $email; ?>">
                <button type="submit" class="btn btn-purple px-4">Editar Perfil</button>
            </form>
        </div>
    </div>
</div>











<?php require 'views/partials/footer.php'; ?>