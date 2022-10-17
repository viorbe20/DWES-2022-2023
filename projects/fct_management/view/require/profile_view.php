<?php

?>
<div id="user-info">
    <div id="user_avatar">
        <span class="material-symbols-outlined">account_circle</span>
    </div>
    <div id="user_data">
        <p>Usuario: <span id="user_name"><?php echo $_SESSION['user']['name']; ?></span></p>
        <p>Fecha: <span id="date"><?php echo date('d-m-Y') ?></span></p>
        <!-- <a href="http://">Salir</a> -->
        <div>
            <a href="<?php echo DIRBASEURL . '/home/companies/logout' ?>"><label>Salir</label></a>
        </div>
    </div>
</div>