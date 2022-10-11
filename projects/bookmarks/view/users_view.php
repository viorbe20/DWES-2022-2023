<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/users_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";
if ($_SESSION['user']['profile'] == "admin") {
?>
    <div class="table_container">

        <h2>Usuarios bloqueados</h2>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Email</th>
                <th>Desbloquear</th>
            </tr>


            <?php
            if (!empty($data[0])) {
                echo "<form action=\"\" method=\"post\">";
                foreach ($data[0] as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value["nombre"] . '</td>';
                    echo '<td>' . $value["user"] . '</td>';
                    echo '<td>' . $value["psw"] . '</td>';
                    echo '<td>' . $value["email"] . '</td>';
                    //Desmarca todos los checkbox
                    isset($_POST['btn_uncheckAll']) ? $checked = "": $checked = "checked";
                    echo '<td><input type="checkbox" id="' . $value["id"] . '" name="selected[]" value="' . $value["id"] . '"'. $checked .'></td>';
                    echo '</tr>';
                }
            }

            ?>
        </table>
        <div id="buttons_admin">
            <button type="submit" name="btn_unlock" id="btn_unlock">Desbloquear</button>
            <button type="submit" name="btn_uncheckAll">Desmarcar todos</button>
        </div>
    </div>
    </form>
<?php
}
?>