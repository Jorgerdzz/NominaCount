export function generarNominaPDF() {
  const botonPDF = document.getElementById("btn-descargar-pdf");

  botonPDF.addEventListener("click", () => {

    const contenido = document.getElementById("pdf-nomina");

    const nombre = botonPDF.dataset.nombre;
    const apellidos = botonPDF.dataset.apellidos;
    const fechaInicio = botonPDF.dataset.inicio;
    const fechaFin = botonPDF.dataset.fin

    const nombreLimpio = `${nombre}_${apellidos}`.replace(/\s+/g, "_");
    const fechaLimpia = `${fechaInicio}_a_${fechaFin}`.replaceAll("-", "");

    const nombreArchivo = `nomina_${nombreLimpio}_${fechaLimpia}.pdf`;

    html2canvas(contenido, { scale: 2 }).then((canvas) => {
      const imgData = canvas.toDataURL("image/png");
      const pdf = new jspdf.jsPDF("p", "mm", "a4");
      const imgWidth = 210;
      const imgHeight = (canvas.height * imgWidth) / canvas.width;
      pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);
      pdf.save(nombreArchivo);
    });
  });
}
