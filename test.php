<?php
$procesaFormulario = false;
$selectedOption = "";
$selected = "";

if (isset($_POST['submit'])) {
    $procesaFormulario = true;
}

if ($procesaFormulario) {
    $selectedOption = $_POST['selectedOption'];
}

?>


<form action="" method="post">

    <select name="selectedOption">
        <?php
        for ($i = 1; $i < 10; $i++) {
            //Mantenemos la opción seleccionada en la lista desplegable
            if ($i == $selectedOption) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            echo "<option $selected>$i</option>";
        }
        ?>
        <input type="submit" value="Enviar" name="submit">
    </select>
</form>

<?php
if ($procesaFormulario) {
    echo $selectedOption;
}
?>