export function generarNominaPDF() {
  const botones = document.querySelectorAll(".btn-descargar-pdf");

  botones.forEach((botonPDF) => {
    botonPDF.addEventListener("click", () => {
    
      const contenido = botonPDF.closest(".pdf-nomina");

      const nombre = botonPDF.dataset.nombre || "Empleado";
      const apellidos = botonPDF.dataset.apellidos || "";
      const fechaInicio = botonPDF.dataset.inicio || "";
      const fechaFin = botonPDF.dataset.fin || "";

      const nombreLimpio = `${nombre}_${apellidos}`.replace(/\s+/g, "_");
      const fechaLimpia = `${fechaInicio}_a_${fechaFin}`.replaceAll("-", "");
      const nombreArchivo = `nomina_${nombreLimpio}_${fechaLimpia}.pdf`;

      html2canvas(contenido, {
        scale: 2,
        useCORS: true,
        scrollY: -window.scrollY
      }).then((canvas) => {
        const imgData = canvas.toDataURL("image/png");
        const pdf = new jspdf.jsPDF("p", "mm", "a4");
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const imgProps = pdf.getImageProperties(imgData);
        const imgWidth = pageWidth;
        const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

        let heightLeft = imgHeight;
        let position = 0;

        pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
        heightLeft -= pageHeight;

        while (heightLeft > 0) {
          position = heightLeft - imgHeight;
          pdf.addPage();
          pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
          heightLeft -= pageHeight;
        }

        pdf.save(nombreArchivo);
      });
    });
  });
}
