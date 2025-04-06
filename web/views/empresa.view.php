<?php require_once 'views/partials/head.php'; ?>
<?php require_once 'views/partials/nav-empresa.php'; ?>


    <div id="main-content">
        <?php
        if ($page === 'departamento') {
            require 'departamento.view.php';
        }
        ?>
    </div>












<?php require_once 'views/partials/footer.php'; ?>