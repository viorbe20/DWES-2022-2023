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
    <script src="<?php echo DIRFCT; ?>/assets/js/companies.js"></script>
    <title>Companies view</title>
</head>

<body>
    <?php require_once 'header.php'; ?>

    <main class="container">
        <h1 class="text-center">Lista de Empresas</h1>
        <a href="crear.php" class="btn btn-success">Crear Empresa</a>

        <table id="table-companies" class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Empleados</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_companies">
                <?php
                foreach ($data['companiesList'] as $key => $item) {
                    foreach ($item as $key => $info) {
                        echo "<tr>
                        <td><img src='" . DIRFCT . "/assets/img/logos/" . $info['c_logo'] . "' alt='Logo de la empresa' width='50px'></td>
                        <td>". $info['c_name'] ."</td>
                        <td>". $info['c_phone'] ."</td>
                        <td><span class='material-symbols-outlined'>
                            group
                            </span></td>
                        <td><span class='material-symbols-outlined'>
                                delete
                            </span>
                            <span class='material-symbols-outlined'>
                                edit
                            </span></button>
                        </td>
                    </tr>";
                    }
                }
                ?>

            </tbody>
        </table>
    </main>
</body>