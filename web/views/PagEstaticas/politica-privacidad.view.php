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

<main>
    <div class="container my-4">
        <h1 class="text-center">Política de privacidad</h1>
        <p><strong>Última actualización:</strong> 21 de mayo de 2025</p>

        <p>En NominaCount, valoramos y respetamos su privacidad. Esta Política de Privacidad describe cómo recopilamos, utilizamos, protegemos y gestionamos la información personal que usted y sus empleados nos proporcionan al utilizar nuestra aplicación de gestión empresarial.</p>

        <h2>1. Información que recopilamos</h2>
        <p>Recopilamos la siguiente información cuando su empresa se registra en nuestra plataforma y cuando gestiona a sus empleados:</p>
        <ul>
            <li><strong>Datos de la empresa:</strong> Nombre, dirección, CIF, datos de contacto</li>
            <li><strong>Datos de empleados:</strong> Nombre completo, DNI/NIE, dirección, datos bancarios, datos de contacto, situación familiar, datos de contratación, nóminas, bajas laborales, vacaciones</li>
            <li><strong>Datos de departamentos:</strong> Estructura organizativa, asignación de empleados</li>
            <li><strong>Datos de acceso:</strong> Credenciales de usuario para empresas y empleados</li>
        </ul>

        <h2>2. Uso de la información</h2>
        <p>La información recopilada se utiliza exclusivamente para:</p>
        <ul>
            <li>Proporcionar y gestionar los servicios de gestión de nóminas y recursos humanos</li>
            <li>Generar nóminas, finiquitos y documentos legales requeridos</li>
            <li>Gestionar vacaciones y ausencias de los empleados</li>
            <li>Generar informes y estadísticas para la empresa</li>
            <li>Mejorar nuestros servicios y experiencia de usuario</li>
            <li>Cumplir con obligaciones legales en materia laboral y fiscal</li>
        </ul>

        <h2>3. Protección de la información</h2>
        <p>Implementamos las siguientes medidas de seguridad:</p>
        <ul>
            <li>Cifrado de datos tanto en tránsito como en reposo</li>
            <li>Autenticación segura con validación en tiempo real</li>
            <li>Acceso restringido a la información según roles (empresa/empleado)</li>
            <li>Copias de seguridad periódicas</li>
            <li>Alojamiento seguro en AWS con medidas de protección avanzadas</li>
        </ul>
        <p>Aunque empleamos los mejores estándares de seguridad, ningún sistema es 100% seguro. Recomendamos a los usuarios proteger sus credenciales de acceso.</p>

        <h2>4. Compartir información</h2>
        <p>No compartimos información personal con terceros excepto en estos casos:</p>
        <ul>
            <li>Cuando sea requerido por autoridades legales o regulatorias</li>
            <li>Para generar documentos legales como nóminas o finiquitos</li>
            <li>Con proveedores de servicios esenciales (como hosting), bajo estrictos acuerdos de confidencialidad</li>
        </ul>

        <h2>5. Derechos de los usuarios</h2>
        <p>De acuerdo con el RGPD, usted y sus empleados tienen derecho a:</p>
        <ul>
            <li>Acceder a sus datos personales</li>
            <li>Solicitar la rectificación de datos inexactos</li>
            <li>Solicitar la eliminación de datos cuando sea aplicable</li>
            <li>Limitar el tratamiento de sus datos</li>
            <li>Oponerse al tratamiento de datos</li>
            <li>Portabilidad de datos</li>
        </ul>
        <p>Para ejercer estos derechos, contacte con nosotros a través de los medios indicados al final de esta política.</p>

        <h2>6. Conservación de datos</h2>
        <p>Conservamos los datos mientras sea necesario para prestar nuestros servicios y cumplir con obligaciones legales (especialmente en materia laboral y fiscal). Los datos se eliminarán de forma segura cuando ya no sean necesarios.</p>

        <h2>7. Cambios en la política de privacidad</h2>
        <p>Nos reservamos el derecho de modificar esta política para adaptarnos a cambios legales o en nuestros servicios. Cualquier cambio será notificado a los usuarios y publicado en esta página con la nueva fecha de actualización.</p>

        <h2>8. Contacto</h2>
        <p>Si tiene alguna pregunta o inquietud sobre esta Política de Privacidad, no dude en escribirnos mediante el <a href="<?= BASE_PATH . '/contacto'; ?>" style="text-decoration: underline;">formulario de contacto</a>.</p>

        <p>Al utilizar NominaCount, usted acepta los términos de esta Política de Privacidad. Gracias por confiar en nosotros para la gestión de sus recursos humanos.</p>
    </div>
</main>




<?php require_once 'views/partials/footer.php'; ?>