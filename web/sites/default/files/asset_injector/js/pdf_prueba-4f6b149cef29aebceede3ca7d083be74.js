function generarEncabezado(doc) {
    html2canvas(document.getElementById('block-tara-branding')).then(function (canvas) {
        var imageData = canvas.toDataURL('image/png');
        doc.addImage(imageData, 'PNG', 10, 5, 52.61, 20.77);

    });
    /*html2canvas(document.getElementsByClassName('field field--name-field-titulo-pagina field--type-text-long field--label-above')[0]).then(function (canvas) {
        var tituloElement = document.getElementsByClassName('field field--name-field-titulo-pagina field--type-text-long field--label-above')[0];
        var alto = tituloElement.offsetHeight;  // Alto en píxeles     
        if (alto > 73) {
            var imageData = canvas.toDataURL('image/png');
            doc.addImage(imageData, 'PNG', 75, 15, 293.39 * 0.8, 31.18 * 0.8);
        }
        else {
            var imageData = canvas.toDataURL('image/png');
            doc.addImage(imageData, 'PNG', 75, 15, 74.31 * 3.5, 4.23 * 3.5);
        }
    });*/

}
function generarPie(doc) {
    const fecha = new Date();
    const dia = fecha.getDate();
    const mes = fecha.getMonth() + 1; // Sumamos 1 porque los meses comienzan en 0 (enero) en JavaScript
    const año = fecha.getFullYear();
    const fechActual = `${dia}/${mes}/${año}`;
    doc.setFontSize(8);
    doc.text('Generado el ' + fechActual, 20, 295);
    doc.line(10, 290, 195, 290, 'S');
    var totalPages = doc.internal.getNumberOfPages();
    doc.setFontSize(8);
    doc.text('página:  ' + totalPages, 170, 295);
}
function generarImagenes(doc) {
    try {
        var iframe = document.getElementById('iframe_prueba');
        var iframeContent = iframe.contentWindow.document.body;

        html2canvas(iframeContent).then(function (canvas) {
            var imageData = canvas.toDataURL('image/png');

            // Agrega la imagen al PDF
            doc.addImage(imageData, 'PNG', 5, 30, 1179*0.15,759*0.15);  // Ajusta las coordenadas y dimensiones si es necesario

            var fechaActual = new Date();
            var nombreArchivo = fechaActual.getFullYear() + '-' + (fechaActual.getMonth() + 1) + '-' + fechaActual.getDate() + '.pdf';

            // Abre el PDF en una nueva ventana o lo descarga
            //doc.save(nombreArchivo);  // Guarda el archivo PDF           
             var pdfOutput = doc.output('bloburl');
             window.open(pdfOutput, '_blank');
        }).catch(function (error) {
            console.log("Error al generar el canvas")
        });
    }
    catch (error) {
        console.log("Error general en la ejecución")
    }
}

document.getElementById("exportarPDF").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    generarEncabezado(doc);
    generarPie(doc);
    generarImagenes(doc);
});