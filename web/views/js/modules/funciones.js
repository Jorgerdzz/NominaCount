export function cambiarDepartamento(nombre) {
  window.location.href = `/departamento?departamento=${encodeURIComponent(nombre)}`;
}

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
