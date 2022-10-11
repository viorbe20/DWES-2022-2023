<?php

/**
 * $data [datosUsuario, array(tantos bookmarks como tenga)]
 */

require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/bookmarks_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";

?>
<h2>Mis Bookmarks</h2>
<form action="" method='get'>

    <section>
        <input class="myInput" type="text" name="inputWord" id="inputWord">
        <input class="myButton" type="submit" name="search" value="Buscar">
    </section>
</form>
<div class="table_container">
    <table>
        <tr>
            <th>Descripción</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>


        <?php
        if (!empty($data[1])) {
            echo "<form action=\"\" method=\"post\">";
            foreach ($data[1] as $key => $value) {
                echo '<tr>';
                //echo '<td>' . $value["descripcion"] . '</td>';
                echo '<td><a id="description" target="_blank" href=" '. $value['bm_url'] .'">'. $value["descripcion"] .'</a></td>';
                echo '<td><a href="' . DIRBASEURL . '/home/bookmarks/edit/' . $value['id'] . '">Editar</a></td>';
                echo '<td><a href="' . DIRBASEURL . '/home/bookmarks/delete/' . $value['id'] . '">Eliminar</a></td>';
                echo '</tr>';
            }
        }

        ?>
    </table>

    <a href="<?php echo DIRBASEURL ?>/home/bookmarks/add">Añadir un Bookmark</a>

</div>
</form>