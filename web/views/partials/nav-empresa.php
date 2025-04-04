
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">NominaCount</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <div class="navbar-nav">
                <?php
                    require_once 'models/Database.php';
                    require_once 'models/Empresa.php';
                    $_SESSION['nombre_comercial'] = Empresa::getNombreComercialPorIdEmpresa($_SESSION['usuarioActivo']['id_empresa']);
                    echo '<a class="nav-link order-md-4" href="' . BASE_PATH .  '/empresa">' .
                    '<i class="bi bi-building"></i>' . " "
                    . htmlspecialchars($_SESSION['nombre_comercial'], ENT_QUOTES) . '</a>';
                ?>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="departamentoSeleccionado" role="button" 
                    data-bs-toggle="dropdown" aria-expanded="false"> Departamentos </a>
                    <ul class="dropdown-menu" id="menuDepartamento">
                        <?php
                            require_once 'models/Database.php';
                            require_once 'models/Departamento.php';                
                            Database::getInstance($_SESSION['db_nombre']);
                            $departamentos = Departamento::getDepartamentos();
                            foreach($departamentos as $departamento){
                                $nombre_departamento = $departamento['nombre_departamento'];
                                echo "<li><a class='dropdown-item'>$nombre_departamento</a></li>";
                            }
                        ?>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#nuevo_departamento">Añadir departamento</a></li>
                    </ul>
                </li>
            </ul>
            

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <?php
                        echo '<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" 
                        aria-expanded="false">
                        <i class="bi bi-person-circle"></i>' . " " .
                        htmlspecialchars($_SESSION['usuarioActivo']['nombre_usuario'], ENT_QUOTES) .
                        '</a>';
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_PATH . '/mi-cuenta';?>">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= BASE_PATH . '/cerrar-sesion';?>">Cerrar sesion</a></li>
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
                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre_departamento" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" aria-describedby="nombre_departamentolHelp">
                    </div>
                    <div class="mb-3">
                        <label for="jefe_departamento" class="form-label">Jefe:</label>
                        <input type="password" class="form-control" id="jefe_departamento" name="jefe_departamento" aria-describedby="nombre_departamentoHelp">
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