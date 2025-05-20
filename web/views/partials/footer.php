<footer class="p-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <?php if(!isset($_SESSION['usuarioActivo'])): ?>
            <li class="nav-item">
                <a href="<?= BASE_PATH . '/'; ?>" class="nav-link px-2 text-white">Home</a>
            </li>
        <?php elseif(isset($_SESSION['usuarioActivo']) && $_SESSION['usuarioActivo']['rol'] == 'Empresario'): ?>
            <li class="nav-item">
                <a href="<?= BASE_PATH . '/empresa'; ?>" class="nav-link px-2 text-white">Home</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a href="<?= BASE_PATH . '/usuario-empleado'; ?>" class="nav-link px-2 text-white">Home</a>
            </li>
        <?php endif; ?>
        <li class="nav-item">
            <a href="<?= BASE_PATH . '/politica-privacidad'; ?>" class="nav-link px-2 text-white">Política de privacidad</a>
        </li>
        <li class="nav-item">
            <a href="<?= BASE_PATH . '/cookies'; ?>" class="nav-link px-2 text-white">Cookies</a>
        </li>
        <li class="nav-item">
            <a href="<?= BASE_PATH . '/sobre-nosotros'; ?>" class="nav-link px-2 text-white">Sobre nosotros</a>
        </li>
        <li class="nav-item">
            <a href="<?= BASE_PATH . '/contacto'; ?>" class="nav-link px-2 text-white">Contacto</a>
        </li>
    </ul>
    <div class="row">
        <div class="col-md-6">
            <p class="text-center text-white">2025 NominaCount, Inc</p>
        </div>
        <div class="col-md-6">
            <i class="bi bi-twitter-x m-3"></i>
            <i class="bi bi-facebook m-3"></i>
            <i class="bi bi-instagram m-3"></i>
        </div>
    </div>
        
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- script jQuery -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script> <!-- script dataTables -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Para poder usar la libreria sweetalert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>  <!-- script jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script> <!-- script html2canvas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  <!-- script Chart.js -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
<script src="<?= BASE_PATH; ?>/views/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="module" src="<?= BASE_PATH; ?>/views/js/script.js"></script>

</body>

</html>