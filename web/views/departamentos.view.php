<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>

<main>
    <!-- Tabla departamentos -->
    <section class="container mt-4">

        <div class="row align-items-center mb-3">
            <div class="col-md-10 section-header">
                <h2>Departamentos</h2>
            </div>
            <div class="col-md-2 d-grid">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#anadir-departamento">Añadir departamento</button>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tabla-departamentos">
                <thead>
                    <tr>
                        <th>Ver departamento</th>
                        <th>Nombre departamento</th>
                        <th>Jefe departamento</th>
                        <th>Número de empleados</th>
                        <th>Coste total departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($departamentos as $departamento) {
                        echo '<tr data-id="' . $departamento['id_departamento'] . '">
                                <td><a href="' . BASE_PATH . '/departamento?id=' . $departamento['id_departamento'] . '"<i class="bi bi-building text-dark"></i></a> 
                                <td>' . $departamento['nombre_departamento'] . '</a></td>
                                <td>' . $departamento['jefe_departamento'] . '</td>
                                <td>' . $departamento['num_empleados'] . '</td>
                                <td>' . $departamento['coste_total_departamento'] . ' € </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        

    </section>
</main>

<!-- Modal Añadir Departamento -->
<div class="modal fade" id="anadir-departamento" tabindex="-1" aria-labelledby="añadir-departamentoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Nuevo departamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-nuevo-departamento" method="POST" action="<?= BASE_PATH . '/crear-departamento' ?>">
                    <div class="mb-3">
                        <label for="nombre_departamento" class="form-label">Nombre del departamento:</label>
                        <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" aria-describedby="nombre_departamentolHelp">
                    </div>
                    <div class="mb-3">
                        <label for="jefe_departamento" class="form-label">Jefe del departamento:</label>
                        <input type="text" class="form-control" id="jefe_departamento" name="jefe_departamento" aria-describedby="jefe_departamentoHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" id="registrar_departamento" class="btn btn-primary" disabled>Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php require_once 'views/partials/footer.php'; ?>