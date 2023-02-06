<!-- Modal upload students file-->
<!--Requires on students.php but hidden by default on students.js-->
<div class="modal" tabindex="-1" role="dialog" id="modal_upload_students_file">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo grupo</h5>
                <button id="btn_modal_exit_upload_students_file" type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-ligth">X</span>
                </button>
            </div>

            <div class="modal-body">

                <!--Button to upload csv file-->
                <div class="d-flex justify-content-center my-2" class='bg-black'>
                    <input type="file" id="file-input" name="file">
                    <input id='save_file' name='save_file' type="submit" value="Cargar">
                </div>


                <!--Form for academic year and group -->
                <form action="" method="post" id='form_add_call' name='for_add_call' class=''>
                    <div class="form-group d-flex my-2 p-4">

                    <div class="form-group w-50 mx-2">
                            <label for="group">Grupo</label>
                            <select class="form-control" id="group_select" name="group_select">
                                <?php
                                foreach ($_SESSION['group_list'] as $value) {
                                    echo "<option selected>$value</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group w-50 mx-2">
                            <label for="ayear">Curso académico</label>
                            <select class="form-control" id="ayear_select" name="ayear_select">
                                <?php
                                foreach ($_SESSION['ayear_list'] as $value) {
                                    echo "<option selected>$value</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group w-50 mx-2">
                            <label for="term">Período</label>
                            <select class="form-control" id="term_select" name="term_select">
                                <?php
                                foreach ($_SESSION['term_list'] as $value) {
                                    echo "<option selected>$value</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!--submit button-->
                        <input id="btn_modal_confirm_students_file" name="btn_modal_confirm_students_file" type="submit" class="btn btn-primary"></button>
                        <button id="btn_modal_cancel_students_file" name="btn_modal_cancel_call" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>