export function existeEmail() {
  const form = document.getElementById("formularioComprobarCorreo");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById("comprobarEmail").value;

    try {
      const response = await fetch("/comprobar-correo", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: email,
        }),
      });

      const data = await response.json();

      if (data.existe) {
        const modal = new bootstrap.Modal(document.getElementById('establecer-contra'));
        modal.show();
      } else {
        Swal.fire({
          title: "Error",
          text: "Dirección de correo electrónico no registrada",
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
        })
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el correo electrónico",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}

export function establecerContra(){
  const form = document.getElementById("formularioEstablecerContra");

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    const nuevaContra = document.getElementById("nueva-contra").value;

    try {
      const response = await fetch("/nueva-contra", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          contra: nuevaContra,
        }),
      });

      const data = await response.json();

      if (data.existe) {
        const modal = new bootstrap.Modal(document.getElementById('establecer-contra'));
        modal.show();
      } else {
        Swal.fire({
          title: "Error",
          text: "Dirección de correo electrónico no registrada",
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
        })
      }
    } catch (error) {
      console.error("Error:", error);
      Swal.fire({
        title: "Error",
        text: "Ocurrió un error al verificar el correo electrónico",
        icon: "error",
        background: "#825abd",
        color: "#FFFFFF",
      });
    }
  });
}
