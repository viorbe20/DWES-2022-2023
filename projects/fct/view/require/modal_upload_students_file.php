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
                <!--Form for add students file and group info -->
                <form enctype="multipart/form-data" method="post" id='form_upload_students_file' name='form_upload_students_file'>

                    <!--Button to upload csv file-->
                    <div class="form-group d-flex my-2 p-4">
                        <div class="d-flex justify-content-center my-2" class='bg-black'>
                            <input type="file" id="file-input" name="file">
                        </div>
                    </div>

                    <!--Select group, academic year and period-->
                    <div class="form-group d-flex my-2 p-4">

                        <div class="form-group w-50 mx-2">
                            <label for="group">Grupo</label>
                            <select class="form-control" id="group_select" name="group_id_select">
                                <?php
                                foreach ($_SESSION['group_list'] as $value) {
                                    echo "<option value=" . $value['g_id'] . ">" . $value['g_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group w-50 mx-2">
                            <label for="ayear">Curso académico</label>
                            <select class="form-control" id="ayear_select" name="ayear_id_select">
                                <?php
                                foreach ($_SESSION['ayear_list'] as $value) {
                                    if ($value['ayear_date'] == $_SESSION['currentAcademicYear']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = "";
                                    }
                                    echo "<option ". $selected ." value=" . $value['ayear_id'] . ">" . $value['ayear_date'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group w-50 mx-2">
                            <label for="term">Período</label>
                            <select class="form-control" id="term_select" name="term_id_select">
                                <?php
                                foreach ($_SESSION['term_list'] as $value) {
                                    if($value['term_name'] == $_SESSION['currentTerm'])
                                        $selected = "selected";
                                    else
                                        $selected = "";
                                    echo "<option  ". $selected ." value=" . $value['term_id'] . ">" . $value['term_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!--submit button-->
                        <!-- <input id='btn_upload_students_file' name='save_file' type="submit" value="Cargar"> -->
                        <input id="btn_modal_confirm_students_file" name="save_file" type="submit" class="btn btn-primary"></button>
                        <button id="btn_modal_cancel_students_file" name="btn_modal_cancel_call" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>