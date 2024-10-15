/*function closeIframepanel() {
    // Redirigir a la página que desees
    window.location.href = '/dip_cc/web/paneles';
}

document.addEventListener('DOMContentLoaded', function () {

    // Manejar cambio en el selector de municipios
    var selectMunicipios = document.getElementById('select-municipios-panel');
    console.log("Municipio: "+selectMunicipios)
    selectMunicipios.addEventListener('change', function () {
        var selectedOption = selectMunicipios.options[selectMunicipios.selectedIndex];        
        var selectedScope = selectedOption.getAttribute('data-scope');
        console.log("scope: "+selectedScope)

        // Actualizar el scope de todos los iframes
        var iframes = document.querySelectorAll('#contIframepanel iframe');
        iframes.forEach(function (iframe) {
            var currentSrc = iframe.src;
            var newSrc = currentSrc.replace(/scope=[^&]+/, 'scope=' + selectedScope);
            iframe.src = newSrc;
        });
    });
});*/

document.querySelectorAll('.menu-item a').forEach(link => {
    link.addEventListener('click', function() {
        console.log("Dentro de la seleccion")
        // Remover la clase is-active de todos los enlaces
        document.querySelectorAll('.menu-item a').forEach(item => item.classList.remove('is-active'));

        // Agregar la clase is-active al enlace que se clickeó
        this.classList.add('is-active');
    });
});