export function tablaEmpleados() {
    new DataTable('#tabla-empleados', {
        responsive: true,
        paging: true,
        select: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json",
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

export function tablaDepartamentos(){
    new DataTable('#tabla-departamentos', {
        responsive: true,
        paging: true,
        select: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/2.2.2/i18n/es-ES.json",
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