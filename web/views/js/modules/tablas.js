export function crearTabla() {
    new DataTable('#tabla-empleados', {
        paging: true,
        select: true,
        scrollY: 400,
        language: {
            "emptyTable": "No hay datos disponibles",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron resultados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activar para ordenar ascendentemente",
                "sortDescending": ": activar para ordenar descendentemente"
            }
        },
        headerCallback: function(thead) {
            $(thead).find('th').css({
                'background-color': '#160F29',
                'color': '#FFFFFF',
                'text-align': 'center',
                'padding': '20px',
                'font-weight': '500',
                'letter-spacing': '0.5px',
                'border-bottom': '2px solid #5DD9C1'
            });
        },
        createdRow: function(row, data, dataIndex) {
            $(row).find('td').css({
                'text-align': 'center',
                'padding': '20px',
                'border-bottom': '1px solid #160F29',
                'color': '#000000'
            });
            
            // Efecto hover
            $(row).hover(
                function() {
                    $(this).css('background-color', '#f8f9fa');
                },
                function() {
                    $(this).css('background-color', dataIndex % 2 === 0 ? '#ffffff' : '#f5f5f5');
                }
            );
            
            // Filas pares
            if (dataIndex % 2 === 0) {
                $(row).css('background-color', '#ffffff');
            } else {
                $(row).css('background-color', '#f5f5f5');
            }
        }
    });
}