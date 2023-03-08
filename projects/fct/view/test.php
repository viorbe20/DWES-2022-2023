<?php
use App\Models\Company;
use App\Models\Employee;

$c = Company::getInstancia();
$employee = Employee::getInstancia();

?>
<section class='w-75 my-2 d-flex flex-row justify-content-center'>

    <form method="post" class="d-flex flex-column w-50 align-items-center justify-content-center">
        <div class='d-flex w-50 my-2 w-100'>
            <input name="input_search_student" class="form-control" type="text" placeholder="Buscar alumno">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Resultados de la búsqueda
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown-students">
                    <!-- Aquí se agregarán los resultados de la búsqueda -->
                </div>
            </div>
        </div>
    </form>

    <div class='d-flex justify-content-center mx-2'>
        <a  href='<?php echo DIRBASEURL?>/students/add_students/<?php ?>' class='btn btn-primary rounded-pill my-1'><span class="material-symbols-outlined">
person_add
</span></a>
    </div>

</section>

<script>
$(document).ready(function() {
    // Selector del input de búsqueda
    var $inputSearch = $('input[name="input_search_student"]');

    // Selector del menú desplegable de resultados
    var $dropdownMenu = $('.dropdown-menu');

    // Evento de entrada del teclado para el input de búsqueda
    $inputSearch.keyup(function() {
        // Obtener el valor del input y convertirlo en minúsculas
        var query = $(this).val().toLowerCase();

        // Realizar una solicitud AJAX al servidor para obtener los resultados de búsqueda
        $.ajax({
            url: 'http://localhost/fct/public/index.php/search_students', // Ruta de la acción del controlador que procesa la solicitud de búsqueda
            method: 'POST',
            data: { query: query }, // Enviar la consulta de búsqueda al servidor
            dataType: 'json',
            success: function(response) {
                // Limpiar el menú desplegable de resultados
                $dropdownMenu.empty();

                // Agregar los resultados de la búsqueda al menú desplegable
                $.each(response, function(index, value) {
                    $dropdownMenu.append('<a class="dropdown-item" href="#">' + value.name + '</a>');
                });

                // Mostrar el menú desplegable si hay resultados de la búsqueda
                if (response.length > 0) {
                    $dropdownMenu.show();
                } else {
                    $dropdownMenu.hide();
                }
            }
        });
    });
});
</script>

