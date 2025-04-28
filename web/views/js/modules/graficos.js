async function cargarCostesTrabajador(idEmpleado, anio = new Date().getFullYear()) {
    try {
        const response = await fetch(`/costes-empleado?id_empleado=${idEmpleado}&anio=${anio}`);
        const result = await response.json();

        if (!result.success) {
            throw new Error(result.message);
        }
        return result.data; 
    } catch (error) {
        console.error('Error cargando costes del trabajador:', error);
        return null;
    }
}

export async function crearGráfico(){
    const idEmpleado = 1; // Aquí deberías poner dinámicamente el ID del empleado
    const datos = await cargarCostesTrabajador(idEmpleado);
    console.log(datos);

    if (datos) {
        // Aquí pintas el gráfico con Chart.js
        const ctx = document.getElementById('grafico-costes-anuales').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Coste (€)',
                    data: Object.values(datos),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    };
}