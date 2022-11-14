<?php
require_once "../app/Config/constantes.php";
// if (isset($data)) {
//     var_dump($data);
// }
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href="<?php echo DIRFCT; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo DIRFCT; ?>/assets/js/test.js"></script>
    <title>Companies view</title>
</head>

<body>
    <?php require_once 'header.php'; ?>

    <h2>Modal Example</h2>
    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Open Modal</button>

</body>
<!-- Modal Company Created -->
<div class="modal" tabindex="-1" role="dialog" id="modal_create_company">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Empresa</h5>
                <button type="text" class="btn btn-secondary text-lg border-rounded" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-ligth" id="span_modal_exit">X</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Has creado una nueva empresa.</p>
            </div>
            <div class="modal-footer">
                <button id="btn_modal_reload" name="btn_modal_reload" type="button" class="btn btn-primary">Crear otra</button>
                <button id="btn_modal_exit" name="btn_modal_close" type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

</html>