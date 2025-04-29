export function graficoCostesDepartamentoTotales() {
    fetch('/costes-totales-departamento')
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                const container = document.getElementById('grafico-empresa-container');
                container.innerHTML = '<div class="alert alert-info">No hay datos de costes disponibles</div>';
                return;
            }

            const nombres = data.map(depto => depto.nombre_departamento);
            const costes = data.map(depto => depto.coste_total_departamento);

            const ctx = document.getElementById('graficoCostesEmpresa').getContext('2d');
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombres,
                    datasets: [{
                        label: 'Coste Total por Departamento (€)',
                        data: costes,
                        backgroundColor: '#5DD9C1',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Coste Total (€)',
                                font: {
                                    weight: 'bold'
                                }
                            },
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString('es-ES', {
                                        style: 'currency',
                                        currency: 'EUR',
                                        maximumFractionDigits: 0
                                    });
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Departamentos',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `Coste total: ${context.raw.toLocaleString('es-ES', {
                                        style: 'currency',
                                        currency: 'EUR'
                                    })}`;
                                }
                            }
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
            const container = document.getElementById('grafico-empresa-container');
            container.innerHTML = `<div class="alert alert-danger">Error al cargar los datos: ${error.message}</div>`;
        });
}