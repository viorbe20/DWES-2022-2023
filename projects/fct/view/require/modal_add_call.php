<!-- Modal Add Call -->
<div class="modal" tabindex="-1" role="dialog" id="modal_add_call">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva convocatoria</h5>
                <button id="btn_modal_exit_call" type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-ligth">X</span>
                </button>
            </div>

            <div class="modal-body">
                <!--Form for call and term selection -->
                <form action="" method="post" id='form_add_call' name='for_add_call' class=''>
                    <div class="form-group d-flex my-2 p-4">
                        <div class="form-group w-50 mx-2">
                            <label for="ayear">Curso académico</label>
                            <select class="form-control" id="ayear_select" name="ayear_select">
                                <?php
                                foreach ($data['ayear_list'] as $value) {
                                    if ($value == $data['current_ayear']) {
                                        echo "<option selected>$value</option>";
                                    } else {
                                        echo "<option>$value</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group w-50 mx-2">
                            <label for="term">Período</label>
                            <select class="form-control" id="term_select" name="term_select">
                                <?php
                                foreach ($data['term_list'] as $value) {
                                    if ($value == $data['current_term']) {
                                        echo "<option selected>$value</option>";
                                    } else {
                                        echo "<option>$value</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <!--submit button-->
                        <input id="btn_modal_confirm_call" name="btn_modal_confirm_call" type="submit" class="btn btn-primary"></button>
                        <button id="btn_modal_cancel_call" name="btn_modal_cancel_call" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>