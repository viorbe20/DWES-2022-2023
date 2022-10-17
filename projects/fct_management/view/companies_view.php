<?php
require('../view/require/header_view.html');
require('../view/require/profile_view.html');
require('../view/require/nav_view.html');
require('../view/require/footer_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

//Data array content
if (isset($data['lastCompanies'])) {
    $lastCompanies = $data['lastCompanies'];
} else {
    $lastCompanies = array();
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/style.css'>
    <title>Companies View</title>
</head>

<body>
    <main>
        <section class="search-box" id="form-search-company">
            <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Buscar...">
                <button type="submit" name="submit-search">
                    <span class="material-symbols-outlined">
                        add_circle
                    </span>
                    Añadir empresa</button>
            </form>
        </section>

        <table class="table" id="table-companies">
            <tr>
                <th>Logo</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            <tr>
                <?php
                foreach ($lastCompanies as $key => $value) {
                    echo "<td>". $value['c_logo'] . "</td>";
                    echo "<td>". $value['c_name'] . "</td>";
                    echo "<td>". $value['c_phone'] . "</td>";
                    ?>
                    <td><a href=""><span class="material-symbols-outlined">
                        delete
                    </span></a></td>
                    <td><a href=""><span class="material-symbols-outlined">
                        edit
                    </span></a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </main>
</body>

</html>