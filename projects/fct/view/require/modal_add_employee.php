<!-- Modal Add Call -->
<!--Requires on calls.php but hidden by default on calls.js-->
<div class="modal" tabindex="-1" role="dialog" id="modal_add_employee">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo empleado</h5>
                <button id="btn_modal_exit_employee" type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-ligth">X</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" id='form_add_employee' name='for_add_employee'>
                    <div class="form-group d-flex flex-column my-2 p-4">

                        <div class="form-group w-100 mx-2">
                            <label class="form-label" for="employee name">Nombre</label>
                            <input type="text" id="e_name" name="e_name[]" class="form-control" value='' />
                        </div>

                        <!--Nif and job-->
                        <div class="d-flex w-100 mx-2 my-2">
                            <!-- Nif input -->
                            <div class="form-outline w-50 mx-1">
                                <label class="form-label" for="employee nif">Nif</label>
                                <input type="text" id="e_nif" name="e_nif[]" class="form-control" value="" />
                            </div>

                            <div class="form-outline w-50 mx-1">
                                <label class="form-label" for="employee job">Puesto</label>
                                <input type="text" id="e_job" name="e_job[]" class="form-control" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <!--submit button-->
                        <input id="btn_modal_confirm_employee" name="btn_modal_confirm_employee" type="submit" class="btn btn-primary" value='Crear'></button>
                        <button id="btn_modal_cancel_employee" name="btn_modal_cancel_employee" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>