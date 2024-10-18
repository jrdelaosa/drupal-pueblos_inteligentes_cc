document.getElementById('select-observatorio').addEventListener('change', function() {
    var selectedValue = this.value;    
    var urls = {
        "General": "http://localhost/dip_cc/web/pruebaobservatoriohorizontal",
        "Piramide población": "http://localhost/dip_cc/web/piramidepoblacion",
        "Tasa envejecimiento": "http://localhost/dip_cc/web/tasaenvejecimiento",
        "Tasa infancia": "http://localhost/dip_cc/web/tasainfancia",
        "Tasa juventud": "http://localhost/dip_cc/web/tasajuventud",
        "Tasa sobre_envejecimiento": "http://localhost/dip_cc/web/tasasobreenvejecimiento"
    };
    // Redireccionar a la URL correspondiente
    if(urls[selectedValue]) {
        window.location.href = urls[selectedValue];
    }
});