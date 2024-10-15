// Selecciona el enlace de Turismo
const turismoLink = document.querySelector('.menu-item-has-children > a');

// Añade un evento de clic al enlace
turismoLink.addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace navegue

    // Selecciona el elemento padre (li) que contiene el submenú
    const parentItem = this.parentElement;

    // Alterna la clase 'active' para mostrar/ocultar el submenú
    parentItem.classList.toggle('active');
});

document.querySelector('.panel-topbar').style.display = 'none'
