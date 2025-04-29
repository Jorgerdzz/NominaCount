export function crearGrafico() {
    // Obtener el nombre del departamento de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const nombreDepartamento = urlParams.get('stats');
    
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

    // Obtener datos del endpoint
    fetch(`/costes-empleado?stats=${encodeURIComponent(nombreDepartamento)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar los datos');
            }
            return response.json();
        })
        .then(data => {
            // Eliminar loader
            loader.remove();
            renderizarGrafico(data.empleados);
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

function renderizarGrafico(empleados) {
    const ctx = document.getElementById('graficoCostes').getContext('2d');
    
    const nombres = empleados.map(empleado => empleado.nombre);
    const costes = empleados.map(empleado => empleado.coste_total);
    
    // Colores dinámicos
    const backgroundColors = costes.map((_, index) => {
        const hue = (index * 137.508) % 360; // Distribución áurea de colores
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
                        text: 'Empleados',
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
}