<?php
?>
<section class="d-flex flex-row justify-content-center w-75 my-2">

    <form method="post" class="d-flex flex-row w-75 align-items-center justify-content-end">

        <!--Search students input-->
        <div class="d-flex flex-column w-50 my-2 w-100">
            <input name="search_user" id='user_bar' class="form-control" type="text" placeholder="Buscar usuario">
            <ul id='dropdown_users' class="form-control" style='display: none'></ul>
        </div>

        <!--Search students button-->
        <a href='<?php echo DIRBASEURL?>/users/add_user' class='mx-3'>
            <span class="material-symbols-outlined " style='font-size: 2rem'>
                person_add
            </span></a>
    </form>

</section>