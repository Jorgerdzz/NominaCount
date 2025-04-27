export function setupBuscadorEmpleados() {
    const input = document.getElementById('inputBuscadorEmpleados');
    const resultados = document.getElementById('resultadosBusqueda');

    if (!input || !resultados) return;

    input.addEventListener('input', async () => {
        const termino = input.value.trim();

        if (termino.length === 0) {
            resultados.classList.remove('show');
            resultados.innerHTML = '';
            return;
        }

        try {
            const response = await fetch(`/buscar-empleados?termino=${encodeURIComponent(termino)}`);
            const empleados = await response.json();

            if (empleados.length > 0) {
                resultados.innerHTML = empleados.map(empleado => `
                    <a href="/empleado?id=${empleado.id_empleado}" class="dropdown-item">
                        ${empleado.nombre} ${empleado.apellidos}
                    </a>
                `).join('');
                resultados.classList.add('show');
            } else {
                resultados.innerHTML = '<span class="dropdown-item disabled">No se encontraron empleados</span>';
                resultados.classList.add('show');
            }

        } catch (error) {
            console.error('Error buscando empleados:', error);
        }
    });

    document.addEventListener('click', (e) => {
        if (!input.contains(e.target) && !resultados.contains(e.target)) {
            resultados.classList.remove('show');
        }
    });
}
