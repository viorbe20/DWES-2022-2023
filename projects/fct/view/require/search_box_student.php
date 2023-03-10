<?php
?>
<section class="w-75 my-2 d-flex flex-row justify-content-center">

    <form method="post" class="d-flex flex-row w-75 align-items-center justify-content-end">

        <!--Search students input-->
        <div class="d-flex flex-column w-50 my-2 w-100">
            <input name="search_student" id='student_bar' class="form-control" type="text" placeholder="Buscar alumno">
            <ul id='dropdown_students' class="form-control" style='display: none'></ul>
        </div>

        <!--Search students button-->
        <a href='<?php echo DIRBASEURL?>/students/upload_students' class='mx-3'>
            <span class="material-symbols-outlined " style='font-size: 2rem'>
                person_add
            </span></a>
    </form>

</section>