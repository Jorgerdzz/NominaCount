<?php
Database::getInstance($_SESSION['db_nombre']);
$empleado = Empleado::getEmpleadoPorEmail($_SESSION['usuarioActivo']['email']);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <?php if (!empty($_SESSION['empresaActiva']['logo_path'])): ?>
            <a class="navbar-brand" href="<?= BASE_PATH . '/usuario-empleado'; ?>">
                <img src="<?= BASE_PATH . '/' . $_SESSION['empresaActiva']['logo_path'] ?>" style="height: 60px;">
            </a>
        <?php else: ?>
            <a class="navbar-brand" href="<?= BASE_PATH . '/usuario-empleado'; ?>">NominaCount</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_PATH . '/usuario-empleado/historial-nomina/empleado?id=' . $empleado['id_empleado']; ?>">Historial Nóminas</a>
                </li>
            </div>

            <div class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_PATH . '/calendario-empleado/empleado?id=' . $empleado['id_empleado']; ?>">Calendario</a>
                </li>
            </div>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <?php
                    if (isset($_SESSION['usuarioActivo'])) {
                        echo '<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" 
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>' . " " .
                            htmlspecialchars($_SESSION['usuarioActivo']['nombre_usuario'], ENT_QUOTES) .
                            '</a>';
                    }
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_PATH . '/mi-cuenta'; ?>">Perfil</a></li>
                        <?php if($_SESSION['usuarioActivo']['delegado']) : 
                                if($_SESSION['usuarioActivo']['rol'] == 'Empresario') : ?>
                                    <li><a class="dropdown-item" href="<?= BASE_PATH . '/cambiar-rol'; ?>">Rol empleado</a></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="<?= BASE_PATH . '/cambiar-rol'; ?>">Rol empresario</a></li>
                                <?php endif; ?>
                        <?php endif; ?>
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