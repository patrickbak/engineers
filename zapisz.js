<!-- Plik umożliwia zapis konfiguracji. -->

function zapisz() {
    var report = new Stimulsoft.Report.StiReport();
    report.loadFile("reports/Report.mrt");

    report.renderAsync(function () {
        var data = report.exportDocument(Stimulsoft.Report.StiExportFormat.Pdf);
        Object.saveAs(data, "Konfiguracja.pdf", "application/pdf");
    })
}