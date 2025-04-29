export function crearGrafico() {
    const urlParams = new URLSearchParams(window.location.search);
    const nombreDepartamento = urlParams.get('stats');
    const anioActual = new Date().getFullYear();
    
    if (!nombreDepartamento) {
        console.error('No se ha especificado departamento');
        return;
    }

    // Mostrar loader
    const container = document.querySelector('.container.my-5');
    const loader = document.createElement('div');
    loader.className = 'd-flex justify-content-center my-5';
    loader.innerHTML = `
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
    `;
    container.appendChild(loader);

    // Cargar datos anuales
    Promise.all([
        fetch(`/costes-empleado?stats=${encodeURIComponent(nombreDepartamento)}`),
        fetch(`/costes-empleado-mes?stats=${encodeURIComponent(nombreDepartamento)}&anio=${anioActual}`)
    ])
    .then(responses => Promise.all(responses.map(res => {
        if (!res.ok) throw new Error('Error al cargar los datos');
        return res.json();
    })))
    .then(([dataAnual, dataMensual]) => {
        loader.remove();
        renderizarGraficoAnual(dataAnual.empleados);
        renderizarGraficosMensuales(dataMensual);
    })
    .catch(error => {
        loader.remove();
        const errorAlert = document.createElement('div');
        errorAlert.className = 'alert alert-danger';
        errorAlert.textContent = `Error: ${error.message}`;
        container.appendChild(errorAlert);
        console.error('Error:', error);
    });
}

function renderizarGraficoAnual(empleados) {
    const ctx = document.getElementById('graficoCostes').getContext('2d');
    
    const nombres = empleados.map(empleado => empleado.nombre);
    const costes = empleados.map(empleado => empleado.coste_total);
    
    const backgroundColors = costes.map((_, index) => {
        const hue = (index * 137.508) % 360;
        return `hsl(${hue}, 70%, 60%)`;
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombres,
            datasets: [{
                label: 'Coste Total por Empleado (€)',
                data: costes,
                backgroundColor: backgroundColors,
                borderColor: backgroundColors.map(color => color.replace('60%)', '40%)')),
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
                        font: { weight: 'bold' }
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
                        text: 'Empleados',
                        font: { weight: 'bold' }
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
                legend: { display: false }
            }
        }
    });
}

function renderizarGraficosMensuales(data) {
    const { empleados, anio } = data;
    const meses = [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];

    // Crear gráficos para cada mes
    for (let mes = 1; mes <= 12; mes++) {
        const canvasId = `grafico-mes-${mes}`;
        const ctx = document.getElementById(canvasId)?.getContext('2d');
        
        if (!ctx) continue;

        const datosMes = empleados.map(empleado => ({
            nombre: empleado.nombre,
            coste: empleado.costes_mensuales[mes] || 0
        }));

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: datosMes.map(item => item.nombre),
                datasets: [{
                    label: `Coste ${meses[mes-1]} ${anio} (€)`,
                    data: datosMes.map(item => item.coste),
                    backgroundColor: `hsla(${(mes * 30) % 360}, 70%, 60%, 0.7)`,
                    borderColor: `hsla(${(mes * 30) % 360}, 70%, 40%, 1)`,
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
                            text: 'Coste Mensual (€)',
                            font: { weight: 'bold' }
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
                            text: 'Empleados',
                            font: { weight: 'bold' }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Coste ${meses[mes-1]}: ${context.raw.toLocaleString('es-ES', {
                                    style: 'currency',
                                    currency: 'EUR'
                                })}`;
                            }
                        }
                    },
                    legend: { display: false }
                }
            }
        });
    }
}