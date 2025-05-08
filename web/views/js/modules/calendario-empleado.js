export function crearCalendarioEmpleado() {
  const calendarEl = document.getElementById("calendario");

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    selectable: true,
    selectMirror: true,
    selectOverlap: false,

    // 1. Selección de rango y solicitud con SweetAlert2
    select: function (info) {
      const fechaInicio = info.startStr;
      const fechaFinObj = new Date(info.end);
      fechaFinObj.setDate(fechaFinObj.getDate() - 1);
      const fechaFinStr = fechaFinObj.toISOString().split("T")[0];

      Swal.fire({
        title: `¿Solicitar vacaciones del ${fechaInicio} al ${fechaFinStr}?`,
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
          // Se envía la solicitud al backend
          fetch("/solicitar-dias-vacaciones", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              fecha_inicio: fechaInicio,
              fecha_fin: fechaFinStr,
            }),
          })
            .then((response) => response.json())
            .then((data) => {
              Swal.fire({
                title: "Solicitud enviada",
                text: data.mensaje,
                icon: "success",
                background: "#825abd",
                color: "#FFFFFF",
                confirmButtonText: "OK",
                customClass: {
                  confirmButton: "btn-primary",
                },
              });

              // Refrescar eventos para mostrar el nuevo en estado "pendiente"
              calendar.refetchEvents();
            })
            .catch((error) => {
              console.error("Error:", error);
              Swal.fire({
                title: "Error",
                text: "Ocurrió un error al enviar la solicitud.",
                icon: "error",
                background: "#825abd",
                color: "#FFFFFF",
                confirmButtonText: "OK",
                customClass: {
                  confirmButton: "btn-primary",
                },
              });
            });
        }
      });
    },

    // 2. Cargar eventos desde la base de datos
    events: "/calendario-empleado-eventos", // este será el endpoint PHP que debes crear o adaptar

    // 3. Pintar el color según el estado
    eventDidMount: function (info) {
      const estado = info.event.extendedProps.estado;
      if (estado === "aprobado") {
        info.el.style.backgroundColor = "green";
      } else if (estado === "rechazado") {
        info.el.style.backgroundColor = "red";
      } else if (estado === "pendiente") {
        info.el.style.backgroundColor = "orange";
      }
    },
  });

  calendar.render();
}

// dayCellDidMount: function (info) {
//         //     const day = info.date.getDay();
//         //     if (day === 6 || day === 0) {
//         //         info.el.style.backgroundColor = '#e0e0e0'; // gris claro
//         //         info.el.style.pointerEvents = 'none';
//         //     }
//         // }