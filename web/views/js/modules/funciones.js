export function cambiarDepartamento(nombre) {
  console.log(`Departamento seleccionado: ${nombre}`);

  window.location.href = `/departamento?departamento=${encodeURIComponent(nombre)}`;

  // Actualiza el texto del botón dropdown
  const dropdownToggle = document.querySelector(".dropdown-toggle");
  dropdownToggle.textContent = nombre;

  // Busca el contenedor o créalo si no existe
  let container = document.getElementById("contenido-departamento");
  console.log(container);
  if (!container) {
    container = document.createElement("div");
    container.id = "contenido-departamento";
    document.body.appendChild(container);
  }

  // Carga el contenido
  fetch(`/departamento?departamento=${encodeURIComponent(nombre)}`)
    .then((response) => {
      return response.text();
    })
    .then((html) => (container.innerHTML = html))
    .catch((error) => {
      console.error("Error:", error);
    });

    window.addEventListener('popstate', () => {
      if (window.location.pathname.includes('/departamento')) {
        const urlParams = new URLSearchParams(window.location.search);
        const nombre = urlParams.get('departamento');
        cambiarDepartamento(nombre);
      }
    });

}

// Configura los event listeners
export function setupDepartamentoHandlers() {
  document.querySelectorAll(".dropdown-item").forEach((item) => {
    item.addEventListener("click", (event) => {
      if (
        event.target.closest("#menuDepartamento") &&
        !event.target.classList.contains("no-cambiar-departamento")
      ) {
        event.preventDefault();
        cambiarDepartamento(event.target.textContent.trim());
      }
    });
  });
}
