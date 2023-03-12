<section class='d-flex flex-row justify-content-center w-75'>

    <form method="post" class="d-flex flex-row w-75 align-items-center justify-content-center">
        <div class="d-flex flex-column w-50 my-2 w-100">
            <input name="search_employee" id='employee_bar' class="form-control" type="text" placeholder="Buscar empleado">
            <ul id='dropdown_employees' class="form-control" style='display: none'></ul>
        </div>

        <a href='<?php echo DIRBASEURL ?>/companies/edit_company/<?php echo $data['company']['id'] ?>'>
            <span class="material-symbols-outlined mx-2" style='font-size: 2rem'>
                Edit
            </span>
            <a href='<?php echo DIRBASEURL ?>/companies/add_employee/<?php echo $data['company']['id'] ?>'>
                <span class="material-symbols-outlined " style='font-size: 2rem'>
                    person_add
                </span></a>
    </form>

</section>