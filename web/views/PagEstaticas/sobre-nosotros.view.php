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
        <h1 class="text-center">Sobre NominaCount</h1>
        
        <section class="mb-5">
            <h2>Nuestra Historia</h2>
            <p>NominaCount nació en 2025 como proyecto final del ciclo formativo de Desarrollo de Aplicaciones Web, con la visión de simplificar la gestión empresarial. Lo que comenzó como una solución académica se ha convertido en una plataforma profesional dedicada a transformar la administración de recursos humanos.</p>
            <p>Fundada por Jorge Rodríguez Alonso, nuestra aplicación combina conocimiento técnico con un profundo entendimiento de las necesidades reales de las empresas en gestión de nóminas y personal.</p>
        </section>

        <section class="mb-5">
            <h2>Nuestra Misión</h2>
            <p>En NominaCount nos comprometemos a:</p>
            <ul>
                <li>Automatizar los procesos de gestión de personal para ahorrar tiempo y reducir errores</li>
                <li>Simplificar el cálculo de nóminas cumpliendo con toda la normativa vigente</li>
                <li>Proporcionar herramientas intuitivas para la gestión de departamentos y empleados</li>
                <li>Ofrecer análisis detallados que ayuden en la toma de decisiones empresariales</li>
            </ul>
        </section>

        <section class="mb-5">
            <h2>Nuestro Equipo</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Jorge Rodríguez Alonso</h3>
                            <h6 class="card-subtitle mb-2 text-muted">Fundador y Desarrollador Principal</h6>
                            <p class="card-text">Especialista en desarrollo web con formación específica en aplicaciones empresariales. Apasionado por crear soluciones tecnológicas que resuelvan problemas reales en el ámbito laboral.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title">Equipo de Soporte</h3>
                            <h6 class="card-subtitle mb-2 text-muted">Asesoramiento y Atención al Cliente</h6>
                            <p class="card-text">Nuestro equipo de soporte está formado por profesionales con experiencia tanto en tecnología como en recursos humanos, asegurando que recibas la mejor asistencia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5">
            <h2>Nuestra Tecnología</h2>
            <p>NominaCount se desarrolla utilizando las tecnologías más modernas y seguras:</p>
            <div class="row align-items-center text-center">
                <div class="col-md-3 mb-3">
                    <div class="card p-3">
                        <h5 class="text-dark">HTML5, CSS3, JavaScript</h5>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-4">
                        <h5 class="text-dark">PHP</h5>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-4">
                        <h5 class="text-dark">MySQL</h5>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card p-4">
                        <h5 class="text-dark">AWS</h5>
                    </div>
                </div>
            </div>
            <p class="mt-3">Utilizamos frameworks como Bootstrap para un diseño responsive y librerías como Chart.js para gráficos interactivos, garantizando una experiencia de usuario óptima en cualquier dispositivo.</p>
        </section>

        <section class="mb-5">
            <h2>Nuestros Valores</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <h4 class="text-dark text-center"><i class="fas fa-lock text-primary mr-2"></i> Seguridad</h4>
                        <p class="card-text">Protegemos tus datos con los más altos estándares de seguridad y cumplimiento normativo.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <h4 class="text-dark text-center"><i class="fas fa-lightbulb text-primary mr-2"></i> Innovación</h4>
                        <p class="card-text">Nos mantenemos a la vanguardia tecnológica para ofrecerte siempre las mejores soluciones.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card p-3">
                        <h4 class="text-dark text-center"><i class="fas fa-hands-helping text-primary mr-2"></i> Soporte</h4>
                        <p class="card-text">Ofrecemos asistencia personalizada para resolver cualquier duda o incidencia rápidamente.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>


<?php require_once 'views/partials/footer.php'; ?>