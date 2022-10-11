<?php
/**
 * $data [datosUsuario, array(tantos bookmarks como tenga)]
 */

require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/edit_bm_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";

?>   
<div id="editForm">
    <?php
    ?>
    <form action="" method="post">
        <div class="container">
        <h2>Edita el marcador</h2>
            <hr>
            <?php
    foreach ($data[0] as $key => $value) {
        ?>
        <label><b>Url</b></label>
        <input type="url" name="url" value="<?php echo urldecode($value['bm_url'])?>" required>
        <label><b>Descripción</b></label>
        <textarea type="text" name="description" required><?php echo urldecode($value['descripcion'])?></textarea>
        <?php
    }
    ?>

            <div class="clearfix">
                <a href="<?php echo DIRBASEURL . '/home/bookmarks' ?>"><input type="button" name="btn_cancel" class="btn_cancel" value="Cancelar"></a>
                <button type="submit" name="btn_edit" class="btn_signup">Editar</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>     
