<?php

?>
<div id="user_info">
    <div id="user_avatar">
        <span class="material-symbols-outlined">account_circle</span>
    </div>

    <div id="user_data">
        <p>Hola <span id="user_name"><?php echo $_SESSION['user']['name']; ?></span></p>
        <p>Hoy es <span id="date"><?php echo date('d/m/Y') ?></span></p>
    </div>

    <div id="user_logout">
        <a href="<?php echo DIRBASEURL . '/home/companies/logout' ?>">
        <label>
            <span class="material-symbols-outlined">
                    logout
                </span>
                Salir
        </label>
        </a>
    </div>
</div>