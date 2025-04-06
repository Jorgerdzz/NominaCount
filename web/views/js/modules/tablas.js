export function crearTabla() {
    $(document).ready(function () {
        if (!$.fn.DataTable.isDataTable('#tabla-empleados')) {
            console.log("Tabla no inicializada, inicializando ahora");
            $('#tabla-empleados').DataTable({
                paging: false,
                select: true,
                scrollY: 400,
            });
        }
    });
}