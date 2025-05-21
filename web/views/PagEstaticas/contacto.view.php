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
        <h1 class="text-center mb-4">Contacta con NominaCount</h1>
        
        <div class="row">
            <!-- Formulario de contacto -->
            <div class="col-lg-6 mb-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="mb-4" style="color: #825abd;">Escríbenos</h2>
                        <form method="POST" id="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nombre*</label>
                                    <input type="text" class="form-control" id="name" name="name" required 
                                        value="<?= $name ?? '' ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last-name" class="form-label">Apellidos*</label>
                                    <input type="text" class="form-control" id="last-name" name="last-name" required
                                        value="<?= $lastName ?? '' ?>">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico*</label>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="<?= $email ?? '' ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="company" class="form-label">Empresa</label>
                                <input type="text" class="form-control" id="company" name="company"
                                    value="<?= $company ?? '' ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Asunto*</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="" disabled selected>Seleccione un tema</option>
                                    <option value="soporte">Soporte técnico</option>
                                    <option value="ventas">Información comercial</option>
                                    <option value="facturacion">Facturación y pagos</option>
                                    <option value="privacidad">Privacidad y datos</option>
                                    <option value="otros">Otros</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensaje*</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="privacy" required>
                                <label class="form-check-label" for="privacy">
                                    Acepto la <a href="<?= BASE_PATH . '/politica-privacidad'; ?>" class="link-primary">política de privacidad</a>*
                                </label>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-purple btn-lg" id="send-btn">
                                    Enviar mensaje
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Información de contacto -->
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h2 class="mb-4" style="color: #825abd;">Información de contacto</h2>
                        
                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h6">Dirección</h3>
                                <p class="mb-0">Calle Desarrollo Web, 123<br>28080 Madrid, España</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h6">Correo electrónico</h3>
                                <p class="mb-0">
                                    <a href="mailto:info@nominacount.com" class="link-primary">info@nominacount.com</a><br>
                                    <a href="mailto:soporte@nominacount.com" class="link-primary">soporte@nominacount.com</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 text-primary">
                                <i class="fas fa-phone-alt fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h6">Teléfono</h3>
                                <p class="mb-0">+34 910 123 456<br>Lunes a viernes de 9:00 a 18:00</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <div class="me-3 text-primary">
                                <i class="fas fa-info-circle fa-2x"></i>
                            </div>
                            <div>
                                <h3 class="h6">Soporte técnico</h3>
                                <p class="mb-0">Para incidencias urgentes, contacte con nuestro servicio de soporte 24/7:<br>
                                <a href="tel:+34900123456" class="link-primary">900 123 456</a></p>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h3 class="h5 mb-3">¿Necesitas ayuda inmediata?</h3>
                        <p>Consulta nuestra <a href="<?= BASE_PATH . '/faq'; ?>" class="link-primary">sección de preguntas frecuentes</a> donde encontrarás respuestas a las dudas más comunes sobre el uso de NominaCount.</p>
                        
                        <div class="mt-4">
                            <a href="<?= BASE_PATH . '/demo'; ?>" class="btn btn-outline-primary me-2">Solicitar demo</a>
                            <a href="<?= BASE_PATH . '/soporte'; ?>" class="btn btn-outline-secondary">Centro de ayuda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de confirmación -->
    <div class="modal fade" id="contact-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title text-success">¡Mensaje enviado con éxito!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                    <p class="lead">Gracias por contactar con NominaCount</p>
                    <p>Hemos recibido tu mensaje correctamente. Nuestro equipo te responderá en un plazo máximo de 24-48 horas.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Entendido</button>
                </div>
            </div>
        </div>
    </div>
</main>



<?php require_once 'views/partials/footer.php'; ?>