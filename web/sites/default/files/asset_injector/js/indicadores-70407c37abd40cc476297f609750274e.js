//var contIframe = document.getElementById('contIframe');
//document.getElementById('submenu-ods').style.display = 'none';
//document.getElementById('submenu-esferas').style.display = 'none';
var contIndicadores = document.getElementById('block-tara-views-block-vista-indicadores-block-1')
document.querySelector('[rel="submenu-todos"]').addEventListener('click', function () {
    document.getElementById('block-tara-views-block-vista-indicadores-block-1').style.display = 'block'
    document.getElementById('submenu-ods').style.display = 'none';
    document.getElementById('submenu-esferas').style.display = 'none';
    document.getElementById('submenu-extrategicos').style.display = 'none';
    ocultarTodosLosIframes()
    //contIframe.style.display = 'none'

});

document.querySelector('[rel="submenu-oe"]').addEventListener('click', function () {
    document.getElementById('submenu-extrategicos').style.display = 'grid';
    document.getElementById('block-tara-views-block-vista-indicadores-block-1').style.display = 'none'
    document.getElementById('submenu-ods').style.display = 'none';
    document.getElementById('submenu-esferas').style.display = 'none';
    //contIframe.style.display = 'none'
    ocultarTodosLosIframes()
});

document.querySelector('[rel="submenu-ods"]').addEventListener('click', function () {
    document.getElementById('submenu-ods').style.display = 'block';
    document.getElementById('block-tara-views-block-vista-indicadores-block-1').style.display = 'none'
    document.getElementById('submenu-extrategicos').style.display = 'none';
    document.getElementById('submenu-esferas').style.display = 'none';
    //contIframe.style.display = 'none'
    ocultarTodosLosIframes()
});

document.querySelector('[rel="submenu-esferas"]').addEventListener('click', function () {
    document.getElementById('submenu-esferas').style.display = 'flex';
    document.getElementById('block-tara-views-block-vista-indicadores-block-1').style.display = 'none'
    document.getElementById('submenu-ods').style.display = 'none';
    document.getElementById('submenu-extrategicos').style.display = 'none';
    //contIframe.style.display = 'none'
    ocultarTodosLosIframes()
});

document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('table.cols-0 tbody tr');
    rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var cell = row.querySelector('.views-field-field-nombre-del-indicador');
            if (cell) {
                var cellText = cell.textContent.trim();
                console.log("Texto de la celda:", cellText);
                mostrarIframePorTexto(cellText);
            }
        });
    });

    // Manejar cambio en el selector de municipios
    var selectMunicipios = document.getElementById('select-municipios');
    console.log("Municipio: "+selectMunicipios)
    selectMunicipios.addEventListener('change', function () {
        var selectedOption = selectMunicipios.options[selectMunicipios.selectedIndex];        
        var selectedScope = selectedOption.getAttribute('data-scope');
        console.log("scope: "+selectedScope)

        // Actualizar el scope de todos los iframes
        var iframes = document.querySelectorAll('#contIframe iframe');
        iframes.forEach(function (iframe) {
            var currentSrc = iframe.src;
            var newSrc = currentSrc.replace(/scope=[^&]+/, 'scope=' + selectedScope);
            iframe.src = newSrc;
        });
    });
});

function ocultarTodosLosIframes() {
    var iframes = document.querySelectorAll('#contIframe iframe');
    iframes.forEach(function (iframe) {
        iframe.classList.add('hidden');
    });
    document.getElementById('close-button').style.display = 'none';
}

function mostrarIframe(index) {
    ocultarTodosLosIframes();        
    console.log("Index: "+index)
    var iframe = document.getElementById('iframe_block_'+index);  
    console.log("Este es el iframe: "+iframe)  
    if (iframe) {
        contIndicadores.style.display = 'none';
        iframe.classList.remove('hidden');
        document.getElementById('close-button').style.display = 'block';
    } else {
        ocultarTodosLosIframes();
        alert('Gráficos de indicador no disponible');
    }
}

function mostrarIframePorTexto(texto) {
    var textoIframeMap = {
       /* "Evolución anual del número de habitantes por territorio": 0,
        "Tasa de Infancia": 1,
        "Evolución de la Población por Sexo": 2,
        "Tabla de Evolución de la Población": 3,
        "Número de Municipios por Tamaño": 8,
        "Población por Rangos de Edad": 5,
        "Distribución del Consumo de Agua": 6,
        "Volumen Medio Histórico de los Embalses Cacereños": 7,*/
        "Evolución del Nivel Medio de los Embalses": 4,
        "Tramitaciones Electrónicas": 9
    };
    var index = textoIframeMap[texto];    
    if (index !== undefined) {
        mostrarIframe(index);
    } else {
        console.log("Texto no reconocido:", texto);
    }
}

function closeIframe() {
    ocultarTodosLosIframes();
    contIndicadores.style.display = 'block';
}



const iframe = document.querySelector("iframe");
const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
iframeDocument.body.style.backgroundColor = "#f0f0f0";
