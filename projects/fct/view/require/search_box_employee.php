<section class='card w-75 my-2 p-2 d-flex flex-row bg-light'>

    <form method="post" class="d-flex flex-column w-50 align-items-center justify-content-center">
        <div class='d-flex w-50 my-2 w-100'>
            <input name="input_search_employee" id="input_search_employee" class="form-control" type="text" placeholder="Buscar empleado">
        </div>
    </form>

    <div class='d-flex w-50 justify-content-center'>
        <a href='<?php echo DIRBASEURL?>/companies/edit_company/<?php echo $data['company_id']?>' class='btn btn-secondary rounded-pill px-4 my-1 mx-2'>Editar Empresa</a>
        <a  href='<?php echo DIRBASEURL?>/companies/add_employee/<?php echo $data['company_id']?>' class='btn btn-secondary rounded-pill px-4 my-1 mx-2'>Añadir empleado</a>
    </div>

</section>