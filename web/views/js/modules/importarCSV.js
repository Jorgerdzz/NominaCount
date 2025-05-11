export function importarCSV(){
    document.getElementById("btnImportarCSV")?.addEventListener("click", () => {
        document.getElementById("csv_empleados").click();
    });

    document.getElementById("csv_empleados")?.addEventListener("change", function () {
        if (this.files.length > 0) {
            document.getElementById("formImportCSV").submit();
        }
    });
}