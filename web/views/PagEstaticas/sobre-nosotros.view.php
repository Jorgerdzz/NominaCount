<?php require_once 'views/partials/head.php'; ?>
<?php 
    if(isset($_SESSION['usuarioActivo'])){
        if($_SESSION['usuarioActivo']['rol'] == 'Empresario'){
        require_once 'views/partials/nav-empresa.php';
        }else {
            require_once 'views/partials/nav-empleado.php';
        }
    }  
?>



<?php require_once 'views/partials/footer.php'; ?>