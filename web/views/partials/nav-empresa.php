<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <?php if($_SESSION['empresaActiva']['logo_path'] !== null): ?>            
            <a class="navbar-brand" href="<?= BASE_PATH . '/empresa'; ?>">
                <img src="<?= BASE_PATH . '/' . $_SESSION['empresaActiva']['logo_path'] ?>" alt="Logo de <?= $_SESSION['empresaActiva']['nombre_comercial']; ?>" style="height: 60px;">
            </a>
        <?php else: ?>   
            <a class="navbar-brand" href="<?= BASE_PATH . '/empresa'; ?>">NominaCount</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="departamentoSeleccionado" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Departamentos
                    </a>
                    <ul class="dropdown-menu menu-departamento" id="menuDepartamento" data-dropdown-type="departamento">
                        <?php
                        if (isset($_SESSION['db_nombre'])) {
                            Database::getInstance($_SESSION['db_nombre']);
                            $departamentos = Departamento::getDepartamentos();

                            if (!empty($departamentos)) {
                                foreach ($departamentos as $departamento) {
                                    $nombreDepartamento = urlencode($departamento['nombre_departamento']);
                                    echo "<li><a class='dropdown-item' href='/departamento?departamento={$nombreDepartamento}'>{$departamento['nombre_departamento']}</a></li>";
                                }
                                echo "<li><hr class='dropdown-divider'></li>";
                                echo "<li><a class='dropdown-item no-cambiar-departamento' data-bs-toggle='modal'
                                data-bs-target='#nuevo_departamento'>Añadir departamento</a></li>";
                            } else {
                                echo "<li class='dropdown-item'> No hay departamentos disponibles</li>";
                                echo "<li><hr class='dropdown-divider'></li>";
                                echo "<li><a class='dropdown-item no-cambiar-departamento' data-bs-toggle='modal' 
                                    data-bs-target='#nuevo_departamento'>Añadir departamento</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Estadísticas
                    </a>
                    <ul class="dropdown-menu menu-estadisticas" id="menu-estadisticas" data-dropdown-type="estadisticas">
                        <?php
                        if (!empty($departamentos)) {
                            foreach ($departamentos as $dep) {
                                $nombreDepartamento = urlencode($dep['nombre_departamento']);
                                echo "<li><a class='dropdown-item' href='/estadisticas?stats={$nombreDepartamento}'>{$dep['nombre_departamento']}</a></li>";
                            }
                        } else {
                            echo "<li class='dropdown-item'> No hay departamentos disponibles</li>";
                        }
                        ?>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav mx-auto">
                <form class="d-flex ms-3" role="search" id="formBuscadorEmpleados">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Buscar empleado..."
                            aria-label="Buscar" id="inputBuscadorEmpleados">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <div class="position-relative">
                    <div class="dropdown-menu auto position-absolute" id="resultadosBusqueda"></div>
                </div>
            </ul>



            <ul class="navbar-nav ms-start">
                <li class="nav-item dropdown m-2">
                    <?php if (isset($_SESSION['usuarioActivo'])): ?>
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            <?= htmlspecialchars($_SESSION['usuarioActivo']['nombre_usuario']) ?>
                        </a>
                        <?php
                            $cont = Vacaciones::contarSolicitudesPendientes('pendiente');
                        ?>
                        <?php if($cont != 0):?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?= $cont ;?>
                                <span class="visually-hidden">notificaciones no leidas</span>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_PATH . '/mi-cuenta'; ?>">Perfil</a></li>
                        <?php if ($_SESSION['usuarioActivo']['ceo']) : ?>
                            <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#delegar_usuarios'>Delegar usuarios</a></li>
                        <?php endif; ?>
                        <?php if($_SESSION['usuarioActivo']['delegado']) : 
                                if($_SESSION['usuarioActivo']['rol'] == 'Empresario') : ?>
                                    <li><a class="dropdown-item" href="<?= BASE_PATH . '/cambiar-rol'; ?>">Rol empleado</a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="<?= BASE_PATH . '/cambiar-rol'; ?>">Rol empresario</a></li>
                                <?php endif; ?>
                        <?php endif; ?>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_PATH . '/notificaciones'; ?>">Notificaciones
                                <?php if($cont != 0): ?>
                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $cont; ?>
                                    <span class="visually-hidden">notificaciones no leidas</span>
                                </span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= BASE_PATH . '/cerrar-sesion'; ?>">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>

            </ul>
        </div>
    </div>
</nav>

<!-- Modal Añadir Departamento -->
<div class="modal fade" id="nuevo_departamento" tabindex="-1" aria-labelledby="añadir-departamentoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Nuevo departamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-nuevo-departamento" method="POST" action="/crear-departamento">
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
                            <button type="submit" id="registrar_departamento" class="btn btn-primary" disabled >Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delegar Usuarios -->
<div class="modal fade" id="delegar_usuarios" tabindex="-1" aria-labelledby="añadir-departamentoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #825abd;">
            <div class="modal-header" data-bs-theme="dark">
                <h1 class="modal-title fs-5" id="titulo">Delegación de funciones</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-delegar-usuarios" method="POST" action="/delegar-usuarios">
                    <input type="hidden" name="accion" value="delegar_usuario">
                    <div class="mb-3">
                        <label for="delegar_nombre_usuario" class="form-label">Nombre y apellidos:</label>
                        <input type="text" class="form-control" id="delegar_nombre_usuario" name="delegar_nombre_usuario" aria-describedby="delegar_nombre_usuarioHelp">
                    </div>
                    <div class="mb-3">
                        <label for="delegar_email" class="form-label">Correo electrónico:</label>
                        <input type="text" class="form-control" id="delegar_email" name="delegar_email" aria-describedby="delegar_emailHelp">
                    </div>
                    <div class="modal-footer">
                        <div class="d-grid w-100">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>