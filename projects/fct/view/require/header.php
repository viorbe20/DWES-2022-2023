<header class="d-flex text-white bg-secondary justify-content-between">
    
<section class='d-flex align-items-center'>
        <div class='d-flex' style='width: 25rem'>
            <a class="navbar-brand mx-3" href="">
                <img src=<?php echo DIRBASE . "/assets/img/logos/logo_ies_gc.jpg" ?> width="50" height="50" alt="Logo IES Gran Capitán">
            </a>
            <a class="nav-link active" aria-current="page" style="font-size: larger; font-weight: bold;" href="<?php echo DIRBASEURL; ?>/home">Práctica FCT</a>
        </div>
        <?php require_once 'tabs.php'; ?>

    </section>

    <section class='d-flex align-items-center'>
        <?php
        if ($_SESSION['user']['status'] == 'logout') {
            require_once 'form_login.php';
        } else if ($_SESSION['user']['status'] == 'login') {
            require_once 'user_info.php';
        }
        ?>
    </section>

</header>