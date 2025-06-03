import { registroCEO } from "./registro-ceo.js";

export function existeEmpresa() {
  const form = document.getElementById("formularioRegistro");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch("/existe-empresa", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.existe) {
        Swal.fire({
          title: "Registro erróneo",
          text: "La empresa ya existe",
          icon: "error",
          background: "#825abd",
          color: "#FFFFFF",
          confirmButtonText: "OK",
          customClass: {
            confirmButton: "btn-primary",
          },
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          window.location.href = "/";
        });
      } else {
        Swal.fire({
          title: "Registro exitoso",
          text: "La empresa se ha registrado correctamente",
          icon: "success",
          background: "#825abd",
          color: "#FFFFFF",
          showConfirmButton: true,
          confirmButtonText: "OK",
          customClass: {
            title: "h3",
            confirmButton: "btn-primary",
          },
          position: "center",
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          const formRegistroCEO = document.getElementById(
            "formularioRegistroCEO"
          );
          formRegistroCEO.dataset.cif = data.cif;

          const modalEmpresa = bootstrap.Modal.getInstance(
            document.getElementById("registrarse")
          );
          modalEmpresa.hide();

          const modal = new bootstrap.Modal(
            document.getElementById("datos-personales")
          );
          modal.show();
          registroCEO();
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar la empresa",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function inicioSesion() {
  const form = document.getElementById("formularioInicioSesion");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById("emailInicioSesion").value;
    const contra = document.getElementById("contraInicioSesion").value;

    try {
      const response = await fetch("/inicio-sesion", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email,
          contra: contra,
        }),
      });

      const data = await response.json();

      if (data.exito) {
        window.location.href = data.ruta;
      } else {
        Swal.fire({
          title: "Error",
          text: "Usuario y contraseña incorrectos",
          icon: "error",
          background: "#825abd",
          color: "#FFFFFF",
          confirmButtonText: "OK",
          customClass: {
            confirmButton: "btn-primary",
          },
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          window.location.href = "/";
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar la empresa",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function crearDepartamento() {

  const formulario = document.getElementById("form-nuevo-departamento");

  if (!formulario) return;

  formulario.addEventListener("submit", async function (e) {
    e.preventDefault();

    const nombre_departamento = document.getElementById(
      "nombre_departamento"
    ).value;
    const jefe_departamento =
      document.getElementById("jefe_departamento").value;

    try {
      const response = await fetch("/crear-departamento", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          nombre_departamento: nombre_departamento,
          jefe_departamento: jefe_departamento,
        }),
      });

      const data = await response.json();
      console.log(data);

      if (data.creado) {
        Swal.fire({
          title: "Departamento creado correctamente",
          icon: "success",
          background: "#825abd",
          color: "#FFFFFF",
          confirmButtonText: "OK",
          customClass: {
            confirmButton: "btn-primary",
          },
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          window.location.href = '/departamentos';
        });
      } else {
        Swal.fire({
          title: "Error al crear el departamento",
          text: "El departamento ya existe",
          icon: "error",
          background: "#825abd",
          color: "#FFFFFF",
          confirmButtonText: "OK",
          customClass: {
            confirmButton: "btn-primary",
          },
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          formulario.reset();
          const modal = bootstrap.Modal.getInstance(
            document.getElementById("nuevo_departamento")
          );
          modal.hide();
        });
      }
    } catch (error) {
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el departamento",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function eliminarDepartamento() {
  const botonEliminar = document.getElementById("eliminar-departamento");
  const id_departamentoInput = document.getElementById("id_departamento");
  let id_departamento = id_departamentoInput.value;

  botonEliminar.addEventListener("click", () => {
    Swal.fire({
      title: "¿Desea eliminar definitivamente el departamento?",
      icon: "question",
      background: "#825abd",
      color: "#FFFFFF",
      showConfirmButton: true,
      confirmButtonText: "OK",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      customClass: {
        title: "h3",
        confirmButton: "btn-primary",
        cancelButton: "btn-primary",
      },
      position: "center",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("/eliminar-departamento", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({ id_departamento: id_departamento }),
        })
          .then((response) => {
            if (!response.ok) {
              throw new Error("Error en la respuesta del servidor");
            }
            Swal.fire({
              title: "El departamento se ha eliminado correctamente",
              icon: "success",
              background: "#825abd",
              color: "#FFFFFF",
              showConfirmButton: true,
              confirmButtonText: "OK",
              customClass: {
                title: "h3",
                confirmButton: "btn-primary",
              },
              position: "center",
              timer: 3000,
              timerProgressBar: true,
            }).then(() => {
              window.location.href = "/departamentos";
            });
          })
          .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
              title: "Error al eliminar el departamento",
              text: error.message,
              icon: "error",
              background: "#825abd",
              color: "#FFFFFF",
            });
          });
      }
    });
  });
}

export function existeEmpleado() {
  const form = document.querySelector("#anadir-empleado form");
  const btnRegistro = document.getElementById("registroEmpleado");

  if (!form || !btnRegistro) return;

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const dni = document.getElementById("dni_empleado").value;
    const numSeguridadSocial = document.getElementById(
      "num_seguridad_social"
    ).value;
    const email = document.getElementById("email_empleado").value;

    try {
      const response = await fetch("/existe-empleado", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          dni: dni,
          num_seguridad_social: numSeguridadSocial,
          email: email,
        }),
      });

      const data = await response.json();

      if (data.existe) {
        Swal.fire({
          title: "Error al registrar empleado",
          text: "El empleado ya existe",
          icon: "error",
          background: "#825abd",
          color: "#FFFFFF",
          confirmButtonText: "OK",
          customClass: {
            confirmButton: "btn-primary",
          },
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          const urlParams = new URLSearchParams(window.location.search);
          const idDepartamento = urlParams.get("id");
          window.location.href = `/departamento?id=${encodeURIComponent(
            idDepartamento
          )}`;
        });
      } else {
        Swal.fire({
          title: "El empleado se ha registrado correctamente",
          icon: "success",
          background: "#825abd",
          color: "#FFFFFF",
          showConfirmButton: true,
          confirmButtonText: "OK",
          customClass: {
            title: "h3",
            confirmButton: "btn-primary",
          },
          position: "center",
          timer: 3000,
          timerProgressBar: true,
        }).then(() => {
          form.submit();
        });
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el empleado",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function eliminarEmpleado() {
  const botonEliminar = document.getElementById("baja_empleado");

  if (!botonEliminar) return;

  botonEliminar.addEventListener("click", () => {
    const id_empleadoInput = document.getElementById("id_empleado");
    const id_departamentoInput = document.getElementById("departamento_empleado");
    const email_empleadoInput = document.getElementById("email_empleado");

    const id_empleado = id_empleadoInput?.value;
    const id_departamento = id_departamentoInput?.value;
    const email_empleado = email_empleadoInput?.value;

    if (!id_empleado || !email_empleado) {
      Swal.fire({
        title: "Error",
        text: "No se encontró el ID del empleado",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
      return;
    }

    Swal.fire({
      title: "¿Desea eliminar definitivamente el empleado?",
      icon: "question",
      background: "#825abd",
      color: "#FFFFFF",
      showConfirmButton: true,
      confirmButtonText: "OK",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      customClass: {
        title: "h3",
        confirmButton: "btn-primary",
        cancelButton: "btn-primary",
      },
      position: "center",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch("/eliminar-empleado", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id_empleado: id_empleado,
            email: email_empleado,
          }),
        })
          .then(async (response) => {
            const data = await response.json();

            if (!response.ok || data.error) {
              throw new Error(
                data.error || "Error en la respuesta del servidor"
              );
            }

            Swal.fire({
              title: "Empleado eliminado correctamente",
              icon: "success",
              background: "#825abd",
              color: "#FFFFFF",
              showConfirmButton: true,
              confirmButtonText: "OK",
              customClass: {
                title: "h3",
                confirmButton: "btn-primary",
              },
              position: "center",
              timer: 3000,
              timerProgressBar: true,
            }).then(() => {
              window.location.href = `/departamento?id=${encodeURIComponent(
                id_departamento
              )}`;
            });
          })
          .catch((error) => {
            console.error("Error:", error);
            Swal.fire({
              title: "Error al eliminar empleado",
              text: error.message,
              icon: "error",
              background: "#825abd",
              color: "#FFFFFF",
            });
          });
      }
    });
  });
}
