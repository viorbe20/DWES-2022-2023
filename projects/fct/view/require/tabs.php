<div class="container d-flex">
    <ul class="navbar-nav p-2 d-flex flex-row">
        <?php
        if ($_SESSION['user']['status'] == 'login') { ?>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/companies">Empresas</a>
            </li>
            <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/students">Convocatorias</a>
            </li>
            <?php if ($_SESSION['user']['profile'] == 'admin') {?>
                <li class="nav-item px-2 mx-2">
                <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/users">Usuarios</a>
            </li>
            <?php
        } ?>
        <?php
        } ?>
    </ul>
</div>