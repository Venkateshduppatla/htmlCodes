var workbook, excelIO;
window.onload = function () {
workbook = new GC.Spread.Sheets.Workbook(document.getElementById("ss"));
excelIO = new GC.Spread.Excel.IO();
    }

    function ImportFile() {
        var excelFile = document.getElementById("excelFile").files[0];
        excelIO.open(excelFile, function (json) {
            var workbookObj = json;
           workbook.fromJSON(workbookObj);
        }, function (e) {
            console.log(e);
        });
    }

    function ExportFile() {
        var fileName = document.getElementById("exportFileName").value;
        if (fileName.substr(-5, 5) !== '.xlsx') {
            fileName += '.xlsx';
        }
        var json = JSON.stringify(workbook.toJSON());
        excelIO.save(json, function (blob) {
            saveAs(blob, fileName);
        }, function (e) {
            console.log(e);
        });
    }