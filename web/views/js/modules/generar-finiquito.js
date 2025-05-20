
export function generarFiniquitoPDF(){

    const botonPDF = document.querySelector(".btn-descargar-finiquitopdf");

    botonPDF.addEventListener("click", () => {
        const contenido = document.querySelector(".pdf-finiquito");
        const nombre = botonPDF.dataset.nombre || "Empleado";
        const nombreArchivo = `Finiquito ${nombre}.pdf`;

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
}