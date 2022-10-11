<?php
require('../view/require/header_view.php');

$css1 = file_get_contents('../view/css/add_bm_style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;

echo "<style>. $css .</style>";
?>
<div id="addBmForm">

    <form action="" method="post">
        <div class="container">
            <h2>Nuevo Bookmark</h2>
            <hr>

            <label for="url"><b>Url</b></label>
            <input type="url" value="" name="url" placeholder="Escribe una url" required>

            <label for="description"><b>Descripción</b></label>
            <textarea type="text" name="description" placeholder="Escribe una descripción del marcador" required></textarea>

            <div class="clearfix">
                <a href="<?php echo DIRBASEURL . '/home/bookmarks'?>"><input type="button" name="btn_cancel" class="btn_cancel" value="Cancelar"></a>
                <button type="submit" name="btn_signup" class="btn_signup">Agregar</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>
