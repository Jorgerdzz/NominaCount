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
        <h1 class="text-center">Política de Cookies</h1>
        <p><strong>Última actualización:</strong> 21 de mayo de 2025</p>

        <section class="mb-5">
            <h2>1. ¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños archivos de texto que se almacenan en su dispositivo (ordenador, tablet, smartphone) cuando visita nuestro sitio web. NominaCount utiliza cookies para garantizar el correcto funcionamiento de la plataforma, mejorar la seguridad y proporcionarle una experiencia de usuario óptima.</p>
        </section>

        <section class="mb-5">
            <h2>2. Tipos de cookies que utilizamos</h2>
            
            <h3 class="mt-4">Cookies técnicas (esenciales)</h3>
            <ul>
                <li><strong>Función:</strong> Son necesarias para el funcionamiento básico de la plataforma</li>
                <li><strong>Ejemplos:</strong> Mantener su sesión iniciada, recordar preferencias básicas, seguridad de acceso</li>
                <li><strong>Duración:</strong> Sesión o persistentes (hasta 30 días)</li>
            </ul>
            
            <h3 class="mt-4">Cookies de funcionalidad</h3>
            <ul>
                <li><strong>Función:</strong> Mejorar su experiencia de usuario</li>
                <li><strong>Ejemplos:</strong> Recordar configuración de visualización, preferencias de idioma</li>
                <li><strong>Duración:</strong> Hasta 6 meses</li>
            </ul>
            
            <h3 class="mt-4">Cookies de análisis (Google Analytics)</h3>
            <ul>
                <li><strong>Función:</strong> Analizar el uso de la plataforma para mejoras</li>
                <li><strong>Datos recogidos:</strong> Páginas visitadas, tiempo de uso, errores (información anónima)</li>
                <li><strong>Duración:</strong> Hasta 2 años</li>
            </ul>
            
            <div class="alert alert-info mt-4">
                <strong>Nota importante:</strong> NominaCount <u>no utiliza</u> cookies de publicidad o de redes sociales, ya que somos una plataforma profesional de gestión empresarial.
            </div>
        </section>

        <section class="mb-5">
            <h2>3. Gestión de cookies</h2>
            <p>Puede controlar y/o eliminar las cookies según desee. Al acceder por primera vez a NominaCount, se le mostrará un banner donde podrá:</p>
            <ul>
                <li>Aceptar todas las cookies (técnicas, funcionales y de análisis)</li>
                <li>Configurar sus preferencias, seleccionando qué tipos de cookies permite</li>
                <li>Rechazar todas las cookies no técnicas</li>
            </ul>
            
            <p>También puede gestionar las cookies a través de su navegador:</p>
            <ul>
                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank">Chrome</a></li>
                <li><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias" target="_blank">Firefox</a></li>
                <li><a href="https://support.microsoft.com/es-es/microsoft-edge/eliminar-las-cookies-en-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank">Edge</a></li>
                <li><a href="https://support.apple.com/es-es/guide/safari/sfri11471/mac" target="_blank">Safari</a></li>
            </ul>
            
            <div class="alert alert-warning mt-3">
                <strong>Importante:</strong> Si desactiva las cookies técnicas, algunas funcionalidades de NominaCount podrían no estar disponibles o no funcionar correctamente.
            </div>
        </section>

        <section class="mb-5">
            <h2>4. Cambios en la política de cookies</h2>
            <p>Nos reservamos el derecho de modificar esta Política de Cookies para adaptarnos a cambios legales o técnicos. Cualquier cambio significativo será comunicado a nuestros usuarios a través de la plataforma.</p>
        </section>

        <section class="mb-5">
            <h2>5. Contacto</h2>
            <p>Si tiene alguna pregunta o inquietud sobre esta Política de Cookies, no dude en escribirnos mediante el <a href="<?= BASE_PATH . '/contacto'; ?>" style="text-decoration: underline;">formulario de contacto</a>.</p>
        </section>

        <div class="card bg-light p-4">
            <p class="mb-0"><strong>Al continuar utilizando NominaCount, acepta el uso de cookies según lo descrito en esta política.</strong> Puede cambiar sus preferencias en cualquier momento a través de la configuración de su cuenta o de su navegador.</p>
        </div>
    </div>
</main>



<?php require_once 'views/partials/footer.php'; ?>