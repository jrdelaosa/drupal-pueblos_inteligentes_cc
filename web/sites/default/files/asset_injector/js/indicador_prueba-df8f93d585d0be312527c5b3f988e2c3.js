document.addEventListener("DOMContentLoaded", function() {
    // Seleccionar todas las celdas de la tabla con la clase específica
    const cells = document.querySelectorAll('.views-field.views-field-field-obj-extrategico');

    // Recorrer todas las celdas y cambiar el contenido según el valor
    cells.forEach(cell => {
        let value = cell.textContent.trim();

        // Crear una variable para la imagen
        let img;

        // Usar un switch para manejar múltiples casos
        switch (value) {
            case '16':
                img = document.createElement('img');
                img.src = '/dip_cc/sites/default/files/inline-images/objetivos estrategicos/icon-oe-01.png'; // Cambia esta ruta a la de tu imagen para el valor 20               
                break;
            case '17':
                img = document.createElement('img');
                img.src = '/dip_cc/sites/default/files/inline-images/objetivos estrategicos/icon-oe-02.png'; // Cambia esta ruta a la de tu imagen para el valor 17              
                break;
            case '23':
                img = document.createElement('img');
                img.src = '/dip_cc/sites/default/files/inline-images/objetivos estrategicos/icon-oe-03.png'; // Cambia esta ruta a la de tu imagen para el valor 23              
                break;
            default:
                // Si no coincide con ningún caso, no hacer nada
                img = null;
        }
        // Si se ha creado una imagen, reemplazar el contenido de la celda
        if (img) {
            cell.textContent = '';
            cell.appendChild(img);
        }
    });
});