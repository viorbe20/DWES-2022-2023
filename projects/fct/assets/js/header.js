$(document).ready(function() {
    // Seleccionar todos los elementos <li> dentro de la lista
    $('ul.navbar-nav li').hover(function() {
        // Agregar un gradiente sutil al fondo del elemento <li> al hacer hover
        $(this).css('background', 'linear-gradient(90deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0.1) 100%)');
    }, function() {
        // Remover el gradiente al salir del hover y restaurar el fondo original
        $(this).css('background', 'none');
    });
});
